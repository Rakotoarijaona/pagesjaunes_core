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
    public $date;
    public $ads_id;
    public $totalClic;
    public $totalImpression;
    public $CTR;
    public $eCPM;
    public $eCPC;

    public function __construct()
    {
        $date               = null;
        $ads_id             = null;
        $totalClic          = null;
        $totalImpression    = null;
        $CTR                = null;
        $eCPM               = null;
        $eCPC               = null;
    }

    // filtre par intervalle de date
    public static function getListByDateInterval($date1, $date2, $adsId = null)
    {
        $results = array();
        $cnx = jDb::getConnection();

        $query =   "
                        SELECT * FROM " . $cnx->prefixTable("ads_tracker") . " 
                        WHERE 1
                    ";

        $date1 = CCommonTools::RDateLANGtoSQL($date1);
        $date2 = CCommonTools::RDateLANGtoSQL($date2);
        $filters = array();
        $filters[] = "date >= '".$date1."' AND date <= '".$date2."'";
        if ($adsId != null)
        {            
            $filters[] = "ads_id = ".$adsId;
        }

        // build filter query
        $query .= " AND ";
        $query .= "(" . implode(" AND ", $filters) . ")";

        $res = $cnx->query($query);

        foreach ($res as $row) {
            if (!empty($row))
            {
                $oAdsTracker = new CAdsTracker();
                $oAdsTracker->fetchFromRecord($row);
                $results[] = $oAdsTracker;
            }
        }
        print_r($results);
        die;

        return $results;
    }

    // Récupération de tous les dates entre deux intervalles
    public static function getDateListByInterval($date1, $date2, $adsId = null)
    {
        $results = array();
        $cnx = jDb::getConnection();

        $query =   "
                        SELECT DISTINCT date FROM " . $cnx->prefixTable("ads_tracker") . " 
                        WHERE 1
                    ";

        $date1 = CCommonTools::RDateOnlyLANGtoSQL($date1);
        $date2 = CCommonTools::RDateOnlyLANGtoSQL($date2);
        $filters = array();
        $filters[] = "date >= '".$date1."' AND date <= '".$date2."'";
        if ($adsId != null)
        {
            $filters[] = "ads_id = ".$adsId;
        }

        // build filter query
        $query .= " AND ";
        $query .= "(" . implode(" AND ", $filters) . ")";
        $query .= " GROUP BY date";
        $res = $cnx->query($query);

        foreach ($res as $row) {
            if (!empty($row))
            {
                $results[] = $row->date;
            }
        }

        return $results;
    }

    // Compte le nombre de clic entre deux date
    public static function getTotalClic($date1, $date2, $adsId = null)
    {
        $results = array();
        $toDate = CAdsStat::getDateListByInterval($date1, $date2);
        foreach ($toDate as $date) {
            $cnx = jDb::getConnection();

            $query =   "
                            SELECT COUNT(id) as nb FROM " . $cnx->prefixTable("ads_tracker") . " 
                            WHERE 1
                        ";
            $date1 = CCommonTools::RDateLANGtoSQL($date1);
            $date2 = CCommonTools::RDateLANGtoSQL($date2);
            $filters = array();
            $filters[] = "date = '".$date."'";
            $filters[] = "type = 1";
            if ($adsId != null)
            {            
                $filters[] = "ads_id = ".$adsId;
            }

            // build filter query
            $query .= " AND ";
            $query .= "(" . implode(" AND ", $filters) . ")";

            $res = $cnx->query($query);

            foreach ($res as $row) {
                $nbTotal = $row->nb;
            }
        }
        return $nbTotal;
    }

    // Compte le nombre d'impréssion entre deux date
    public static function getTotalImpression($date1, $date2, $adsId = null)
    {
        $results = array();
        $toDate = CAdsStat::getDateListByInterval($date1, $date2);
        foreach ($toDate as $date) {
            $cnx = jDb::getConnection();

            $query =   "
                            SELECT COUNT(id) as nb FROM " . $cnx->prefixTable("ads_tracker") . " 
                            WHERE 1
                        ";
            $date1 = CCommonTools::RDateLANGtoSQL($date1);
            $date2 = CCommonTools::RDateLANGtoSQL($date2);
            $filters = array();
            $filters[] = "date = '".$date."'";
            $filters[] = "type = 3";
            if ($adsId != null)
            {            
                $filters[] = "ads_id = ".$adsId;
            }

            // build filter query
            $query .= " AND ";
            $query .= "(" . implode(" AND ", $filters) . ")";

            $res = $cnx->query($query);

            foreach ($res as $row) {
                $nbTotal = $row->nb;
            }
        }

        return $nbTotal;
    }
}
/*foreach($data as $r) {
				$payment_currency = $r->payment_currency;
				if($r->item_channel != 1 && $r->item_channel != 4) {
					if($r->total_visits > 0) {
						$ctr = number_format(($r->total_clicks / $r->total_visits) * 100, 2) . "%";
					} else {
						$ctr = "0.000%";
					}
					if($r->item_duration > 0 && $r->total_visits > 0) {
						$cpm = number_format(($r->payment_amount / $r->item_duration) / ($r->total_visits / 1000), 2);
						$cpm = oiopub_amount($cpm, $r->payment_currency);
					} else {
						$cpm = "N/A";
					}
					if($r->item_duration > 0 && $r->total_clicks > 0) {
						$cpc = number_format(($r->payment_amount / $r->item_duration) / $r->total_clicks, 2);
						$cpc = oiopub_amount($cpc, $r->payment_currency);
					} else {
						$cpc = "N/A";
					}
					$output .= "<tr style=\"background:$bgcolor;\"><td>" . $r->date . "</td><td>" . $r->total_clicks . "</td><td>" . $r->total_visits . "</td><td>" . $ctr . "</td><td>" . $cpm . "</td><td>" . $cpc . "</td></tr>\n";
					$clicks += intval($r->total_clicks);
					$visits += intval($r->total_visits);
					if($bgcolor == "#FFFFFF") {
						$bgcolor = "#E6E8FA";
					} else {
						$bgcolor = "#FFFFFF";
					}
				} else {
					$nostats = true;
				}
				if($r->item_channel == 3 && $r->item_type == 1) {
					$videoad = true;
				}
			}*/