<?php
/**
 * @package pagesjaunes_core
 * @subpackage ads
 * @author R
 * @contributor RYsta
 */

class CAdsConfig
{
    public $id;
    public $website_name;
    public $contact_mail;
    public $payment_methods;
    public $edit_ads;
    public $payment_after_moderate;
    public $new_window;
    public $upload_image;
    public $security_question;

    // constructor
    public function __construct($id = null, $website_name = null, $contact_mail = null,
                                $payment_methods = null, $edit_ads = null, 
                                $payment_after_moderate = null, 
                                $new_window = null, $upload_image = null, 
                                $security_question = null)
    {
        $this->id                       = $id;
        $this->website_name             = $website_name;
        $this->contact_mail             = $contact_mail;
        $this->payment_methods          = $payment_methods;
        $this->edit_ads                 = $edit_ads;
        $this->payment_after_moderate   = $payment_after_moderate;
        $this->new_window               = $new_window;
        $this->upload_image             = $upload_image;
        $this->security_question        = $security_question;
    }

    // Récupération des données à partir de record vers un object (mapping)
    public function fetchFromRecord($record = null)
    {
        if (!empty($record)) {
            $this->id                       = $record->id;
            $this->website_name             = $record->website_name;
            $this->contact_mail             = $record->contact_mail;
            $this->payment_methods          = $record->payment_methods;
            $this->edit_ads                 = $record->edit_ads;
            $this->payment_after_moderate   = $record->payment_after_moderate;
            $this->new_window               = $record->new_window;
            $this->upload_image             = $record->upload_image;
            $this->security_question        = $record->security_question;
        }
    }

    // Récupération des données à partir d'un objet vers un record dao
    public function fetchIntoRecord(&$record)
    {
        $record->id                       = $this->id;
        $record->website_name             = $this->website_name;
        $record->contact_mail             = $this->contact_mail;
        $record->payment_methods          = $this->payment_methods;
        $record->edit_ads                 = $this->edit_ads;
        $record->payment_after_moderate   = $this->payment_after_moderate;
        $record->new_window               = $this->new_window;
        $record->upload_image             = $this->upload_image;
        $record->security_question        = $this->security_question;
    }

    // Récupération de la configuration
    public static function getConfig()
    {
        $factory    = jDao::get('ads~ads_config');
        $res        = $factory->get(1);
        $oAdsConfig = new CAdsConfig();
        if ($res) {
            $oAdsConfig->fetchFromRecord($res);
        } else {
            $oAdsConfig = new CAdsConfig(null, '', '', CASH, 0, 0, 0, 0, 0);
            $oAdsConfig->insert();
        }
        return $oAdsConfig;
    }

    // Insertion
    public function insert()
    {
        $factory    = jDao::get('ads~ads_config');
        $record     = jDao::createRecord('ads~ads_config');
        $this->fetchIntoRecord($record);
        $factory->insert($record);
    }

    // Update
    public function update()
    {
        $factory    = jDao::get('ads~ads_config');
        $record     = $factory->get(1);
        if ($record) {
            $this->id = 1;
            $this->fetchIntoRecord($record);
            $factory->update($record);
        }
    }
}
