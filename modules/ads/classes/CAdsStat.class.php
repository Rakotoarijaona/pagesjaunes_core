<?php
/**
 * @package pagesjaunes_core
 * @subpackage ads
 * @author R
 * @contributor RYsta
 */

jClasses::inc("common~CCommonTools");
jClasses::inc("ads~CAdsZoneDefault");
jClasses::inc("ads~CAdsPurchase");
jClasses::inc("ads~CAdsTracker");

class CAdsStat
{
    public $pid;
    public $dateFrom;
    public $dateTo;

    public function __construct($pid = 0, $dateFrom = '', $dateTo = '')
    {
        $this->pid                = $pid;
        $this->dateFrom           = $dateFrom;
        $this->dateTo             = $dateTo;
    }

    public function getStatOverview()
    {
        $cnx            = jDb::getConnection();
        $purchase_id    = 0;
        $sql_purchase   = "";
        $and1           = "";
        $order_by       = "";
        $date_day1      = 0;
        $date_month1    = 0;
        $date_year1     = 0;
        $res_rows       = 0;
        $toStat         = array(); 

        //current date
        $date_now       = date('Y-m-d', time());

        //date from
        if ($this->dateFrom != '')
        {
            $dateFrom       = date_parse_from_format('dd/mm/yyyy', $this->dateFrom);
            $date_day1      = $dateFrom['day'];
            $date_month1    = $dateFrom['month'];
            $date_year1     = $dateFrom['year'];
        }
        else
        {
            $date1 = date('Y-m-d', (time() - (86400 * 30)));
            $exp = explode("-", $date1);
            $date_day1 = intval($exp[2]);
            $date_month1 = intval($exp[1]);
            $date_year1 = intval($exp[0]);
        }
        
        //date to
        if ($this->dateTo != '')
        {
            $dateTo         = date_parse_from_format('dd/mm/yyyy', $this->dateTo);
            $date_day2      = $dateTo['day'];
            $date_month2    = $dateTo['month'];
            // $date_year2     = $dateTo['year'];
        }
        else
        {
            $dateTo         = date_parse_from_format('Y-m-d', $date_now);
            $date_day2      = $dateTo['day'];
            $date_month2    = $dateTo['month'];
        }

        //process archive request
        if(!empty($this->pid))
        {
            //timeframe
            $time_frame     = "Custom";

            //purchase ID
            $purchase_id    = $this->pid;
        } 

        //calculate stats
        if($date_day1 > 0 && $date_month1 > 0 && $date_year1 > 0)
        {
            $type       = "Purchase";
            // liste champ
            $select     = "a.ads_id as id, a.total_clicks as tc, a.total_visits as tv";

            $my_date    = $date_year1."-".$date_month1."-".$date_day1;

            if ($date_day2 > 0 && $date_month2 > 0 && $date_year2 > 0)
            {
                $sql_date = "a.date >= '".$date_year1."-".$date_month1."-".$date_day1."' AND a.date <= '".$date_year2."-".$date_month2."-".$date_day2."'";
            } 
            else 
            {
                $sql_date = "a.date='".$date_year1."-".$date_month1."-".$date_day1."'";
            }

            if($purchase_id > 0) 
            {
                $type           = "Date";
                $select         = "a.date as id, a.total_clicks as tc, a.total_visits as tv, p.publication_day, p.price, p.currency";
                $sql_purchase   = "a.pid='".$purchase_id."'";
                $and1           = " AND ";
                $group_by       = "GROUP BY a.date";
            } 
            elseif($date_day2 > 0 && $date_month2 > 0 && $date_year2 > 0)
            {
                $type           = "Date";
                $select         = "a.date as id, SUM(a.total_clicks) as tc, SUM(a.total_visits) as tv, p.publication_day, p.price, p.currency";
                $group_by       = "GROUP BY a.date";
            }
            else
            {
                $select         .= ", p.publication_day, p.price, p.currency ";
                $sql_date       .= " AND p.status = '2' AND p.payment_status = '1' ";
                $order_by       = " ORDER BY a.ads_id";
            }
        } 
        elseif ($purchase_id > 0) 
        {
            $type           = "Date";
            $select         = "a.date as id, a.total_clicks as tc, a.total_visits as tv, p.publication_day, p.price, p.currency";
            $sql_purchase   = "a.pid='".$purchase_id."'";
            $order_by       = "ORDER BY a.date";
        }

        // exec query
        $res_rows = 0;
        if(!empty($select)) 
        {
            $sql    = "
                        SELECT $select FROM ". $cnx->prefixTable ('ads_tracker_archive') . " a 
                        INNER JOIN " . $cnx->prefixTable ('ads_purchase') . " p 
                        ON a.ads_id = p.id 
                        WHERE a.is_default = 0 AND $sql_purchase $and1 $sql_date $group_by $order_by";

            $query  = ($cnx->query($sql));
            $archive_res = $query->fetchAll;

            $res_rows = sizeof($archive_res);
        }

        if ($res_rows > 0)
        {
            $daily_visits   = array();

            $sql_date       = str_replace("a.", "", $sql_date);

            $query  = $cnx->exec("  SELECT date,total_visits 
                                    FROM " . $cnx->prefixTable ('ads_tracker_archive') . " 
                                    WHERE " . $sql_date . " AND ads_id='0' GROUP BY date");
            $daily = $query->fetchAll();

            if(!empty($daily))
            {
                foreach($daily as $d)
                {
                    $daily_visits[$d->date] = intval($d->total_visits);
                }
            }

            $clicks = 0;
            $visits = 0;
            $toStat['item'] = array();
            $toStat['total'] = array();
            foreach($archive_res as $r)
            {
                // CTR
                if($r->tv > 0) 
                {
                    $ctr = ($r->tc / $r->tv) * 100;
                }
                else
                {
                    $ctr = 0;
                }

                //eCPM
                if($r->publication_day > 0 && $r->tv > 0)
                {
                    $cpm = ($r->price / $r->publication_day) / ($r->tv / 1000);
                } 
                else
                {
                    $cpm = 0;
                }

                // eCPC
                if($r->item_duration > 0 && $r->tc > 0)
                {
                    $cpc = ($r->payment_amount / $r->item_duration) / $r->tc;
                }
                else
                {
                    $cpc = 0;
                }

                /*if($r->id > 0 && strpos($r->id, "-") === false) {
                    $array = oiopub_adtype_info($r);
                    $my_id = $array['type'] . "<br /><a href=\"" . $array['url'] . "\" target=\"_blank\">" . $array['url'] . "</a>";
                } else {
                    $my_id = "";
                }*/

                $toStat['item'][$r->id] = array();

                $toStat['item'][$r->id]['tc']   = $r->tc;
                $toStat['item'][$r->id]['tv']   = $r->tv;
                $toStat['item'][$r->id]['ctr']  = $ctr;
                $toStat['item'][$r->id]['cpm']  = $cpm;
                $toStat['item'][$r->id]['cpc']  = $cpc;

                $clicks += intval($r->tc);
                $visits += intval($r->tv);

                if($bgcolor == "#FFFFFF") {
                    $bgcolor = "#E6E8FA";
                } else {
                    $bgcolor = "#FFFFFF";
                }
            }

            $toStat['total']['tc']  = $clicks;
            $toStat['total']['tv']  = $visits;

            //calculate totals
            if($visits > 0)
            {
                $toStat['total']['ctr'] = ($clicks / $visits) * 100;
            }
            else
            {
                $toStat['total']['ctr'] = 0;
            }
        }
        return $toStat;
    }
}
/*
    foreach($archive_res as $r) {
        if($r->tv > 0) {
            $ctr = ($r->tc / $r->tv) * 100;
        } else {
            $ctr = 0;
        }
        if($r->item_duration > 0 && $r->tv > 0) {
            $cpm = ($r->payment_amount / $r->item_duration) / ($r->tv / 1000);
        } else {
            $cpm = 0;
        }
        if($r->item_duration > 0 && $r->tc > 0) {
            $cpc = ($r->payment_amount / $r->item_duration) / $r->tc;
        } else {
            $cpc = 0;
        }
        if($r->id > 0 && strpos($r->id, "-") === false) {
            $array = oiopub_adtype_info($r);
            $my_id = $array['type'] . "<br /><a href=\"" . $array['url'] . "\" target=\"_blank\">" . $array['url'] . "</a>";
        } else {
            $my_id = "";
        }
        echo "<tr style=\"background:$bgcolor;\"><td>" . $r->id . "</td><td>" . $r->tc . "</td><td><a style='text-decoration:none;' href='javascript://' title='Ad impressions recorded over " . intval($daily_visits[$r->id]) . " separate page loads'>" . $r->tv . "</a></td><td>" . number_format($ctr, 2) . "%</td><td>" . number_format($cpm, 2) . "</td><td>" . number_format($cpc, 2) . "</td></tr>\n";
        $clicks += intval($r->tc);
        $visits += intval($r->tv);
        if($bgcolor == "#FFFFFF") {
            $bgcolor = "#E6E8FA";
        } else {
            $bgcolor = "#FFFFFF";
        }
    }
    //calculate totals
    if($visits > 0) {
        $ctr = ($clicks / $visits) * 100;
    } else {
        $ctr = 0;
    }
    */