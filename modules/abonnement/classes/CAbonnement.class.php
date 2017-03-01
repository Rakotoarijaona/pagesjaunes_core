<?php
/**
 * @package     pagesjaunes_core
 * @subpackage  abonnement
 * @author      YSTA
 * @contributor YSTA
 */

jClasses::inc("entreprise~CEntreprise");

class CAbonnement
{
        public $abonnement_id;
        public $abonnement_entrepriseid;
        public $abonnement_nomoffre;
        public $abonnement_datedebut;
        public $abonnement_datefin;
        public $abonnement_dureeval;
        public $abonnement_dureetype;
        public $abonnement_montant;
        public $abonnement_removalstatus;
        public $entreprise;

    // constructor
    public function __construct()
    {
        $this->abonnement_id = null;
        $this->abonnement_entrepriseid = null;
        $this->abonnement_nomoffre = null;
        $this->abonnement_datedebut = null;
        $this->abonnement_datefin = null;
        $this->abonnement_dureeval = null;
        $this->abonnement_dureetype = null;
        $this->abonnement_montant = null;
        $this->abonnement_removalstatus = null;
        $this->entreprise = new CEntreprise();
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchFromRecord($record = null)
    {
        if (!empty($record)) {
            $this->abonnement_id = $record->abonnement_id;
            $this->abonnement_entrepriseid = $record->abonnement_entrepriseid;
            if (!empty($this->abonnement_entrepriseid)) {
                $this->entreprise = CEntreprise::getById($this->abonnement_entrepriseid);
            }
            $this->abonnement_nomoffre = $record->abonnement_nomoffre;
            $this->abonnement_datedebut = $record->abonnement_datedebut;
            $this->abonnement_datefin = $record->abonnement_datefin;
            $this->abonnement_dureeval = $record->abonnement_dureeval;
            $this->abonnement_dureetype = $record->abonnement_dureetype;
            $this->abonnement_montant = $record->abonnement_montant;
            $this->abonnement_removalstatus = $record->abonnement_removalstatus;
        }
    }

    // Récupération des données à partir d'un objet vers un record dao
    public function fetchIntoRecord(&$record)
    {
        $record->abonnement_id = $this->abonnement_id;
        if (isset($this->abonnement_entrepriseid)) {
            $record->abonnement_entrepriseid = (!empty($this->abonnement_entrepriseid)) ? $this->abonnement_entrepriseid : null;
        }
        if (isset($this->abonnement_nomoffre)) {
            $record->abonnement_nomoffre = (!empty($this->abonnement_nomoffre)) ? $this->abonnement_nomoffre : null;
        }
        if (isset($this->abonnement_datedebut)) {
            $record->abonnement_datedebut = (!empty($this->abonnement_datedebut)) ? $this->abonnement_datedebut : null;
        }
        if (isset($this->abonnement_datefin)) {
            $record->abonnement_datefin = (!empty($this->abonnement_datefin)) ? $this->abonnement_datefin : null;
        }
        if (isset($this->abonnement_dureeval)) {
            $record->abonnement_dureeval = (!empty($this->abonnement_dureeval)) ? $this->abonnement_dureeval : null;
        }
        if (isset($this->abonnement_dureetype)) {
            $record->abonnement_dureetype = (!empty($this->abonnement_dureetype)) ? $this->abonnement_dureetype : null;
        }
        if (isset($this->abonnement_montant)) {
            $record->abonnement_montant = (!empty($this->abonnement_montant)) ? $this->abonnement_montant : null;
        }
        if (isset($this->abonnement_removalstatus)) {
            $record->abonnement_removalstatus = (!empty($this->abonnement_removalstatus)) ? $this->abonnement_removalstatus : null;
        }
    }

    // create
    public function create()
    {
        if (empty($this->abonnement_id)) {
            $daoAbonnement = jDao::get('abonnement~abonnement');
            $recAbonnement = jDao::createRecord('abonnement~abonnement');
            $this->fetchIntoRecord($recAbonnement);
            CCommonTools::decodeDaoRecUtf8($recAbonnement);
            $daoAbonnement->insert($recAbonnement);
            $this->abonnement_id = $recAbonnement->abonnement_id;
        }
    }

    // read
    public static function read($andFilters = array(), $oneRecord = true, $hasPagination = false, $orFilters = array(), &$nbRecs = 0, $currentPage = 1, $sortField = "abonnement_id", $sortSens = "DESC", $numValPerPage = NB_DATA_PER_PAGE)
    {
        $results = array();
        $cnx = jDb::getConnection();

        $query =    "
                        SELECT SQL_CALC_FOUND_ROWS * 
                        FROM " . $cnx->prefixTable("abonnement") . " 
                        INNER JOIN " . $cnx->prefixTable("entreprise") . " 
                        ON abonnement_entrepriseid = id 
                        WHERE 1
                    ";

        // and filters
        if (!empty($andFilters)) {
            $query .= " AND ";
            $query .= (sizeof($andFilters) > 1) ? implode(" AND ", $andFilters) : $andFilters[0];
        }

        // or filters
        if (!empty($orFilters)) {
            $query .= " AND ";
            $query .= (sizeof($orFilters) > 1) ? "(" . implode(" OR ", $orFilters) . ")" : $orFilters[0];
        }

        // tri
        if (!empty($sortField) && !empty($sortSens)) {
            $query .= " ORDER BY " . $sortField . " " . $sortSens;
        }

        // pagination
        if ($hasPagination) {
            $query .= " LIMIT " . ($currentPage - 1) * $numValPerPage . ", " . $numValPerPage;
        }

        $res = $cnx->query($query);

        if (!is_null($nbRecs)) {
            // --- nombre des lignes pour la pagination
            $queryDataCount = "SELECT FOUND_ROWS() AS numRows";
            $rsCount = $cnx->query($queryDataCount);
            $resCount = $rsCount->fetch();
            $nbRecs = $resCount->numRows;
        }

        foreach ($res as $row) {
            $abonnement = new CAbonnement();
            $abonnement->fetchFromRecord($row);
            CCommonTools::encodeDaoRecUtf8($abonnement);
            $results[] = $abonnement;
        }

        if ($oneRecord) {
            return (isset($results[0])) ? $results[0] : new CAbonnement();
        } else {
            return $results;
        }
    }

    // update
    public function update()
    {
        if (!empty ($this->abonnement_id)) {
            $daoAbonnement = jDao::get('abonnement~abonnement');
            $recAbonnement = $daoAbonnement->get($this->abonnement_id);
            $this->fetchIntoRecord($recAbonnement);
            CCommonTools::decodeDaoRecUtf8($recAbonnement);
            $daoAbonnement->update($recAbonnement);
        }
    }

    // delete
    public static function delete($abonnement_id = 0)
    {
        $success = false;
        if (!empty($abonnement_id)) {
            $daoAbonnement = jDao::get('abonnement~abonnement');
            $daoAbonnement->delete($abonnement_id);
            $success = true;
        }
        return $success;
    }

    // count
    public static function count($andFilters = array(), $orFilters = array())
    {
        $results = array();
        $cnx = jDb::getConnection();

       $query = "
                    SELECT SQL_CALC_FOUND_ROWS * 
                    FROM " . $cnx->prefixTable("abonnement") . " 
                    INNER JOIN " . $cnx->prefixTable("entreprise") . " 
                    ON abonnement_entrepriseid = id 
                    WHERE 1
                ";

        // and filters
        if (!empty($andFilters)) {
            $query .= " AND ";
            $query .= (sizeof($andFilters) > 1) ? implode(" AND ", $andFilters) : $andFilters[0];
        }

        // or filters
        if (!empty($orFilters)) {
            $query .= " AND ";
            $query .= (sizeof($orFilters) > 1) ? "(" . implode(" OR ", $orFilters) . ")" : $orFilters[0];
        }

        $res = $cnx->query($query);

        // --- nombre des lignes pour la pagination
        $queryDataCount = "SELECT FOUND_ROWS() AS numRows";
        $rsCount = $cnx->query($queryDataCount);
        $resCount = $rsCount->fetch();

        return (isset($resCount->numRows)) ? $resCount->numRows: 0;
    }
}