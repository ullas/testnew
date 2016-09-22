<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property \Cake\I18n\Time $srv_exp_date
 * @property string $contact_first_name
 * @property string $tech_cont_first_name
 * @property string $alert_email
 * @property \Cake\I18n\Time $srv_str_date
 * @property int $no_of_lic
 * @property string $contact_phone
 * @property string $tech_cont_phone
 * @property string $address
 * @property string $contact_last_name
 * @property string $tech_cont_last_name
 * @property string $contact_email
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $zip
 * @property string $designation
 * @property int $parent_customer
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $fax
 * @property int $timezone
 * @property int $language
 * @property bool $smsenabled
 * @property int $mapregion_id
 * @property int $customertype_id
 * @property float $initlat
 * @property float $initlong
 * @property int $updategroup
 * @property int $weekly_off1
 * @property int $weekly_off2
 *
 * @property \App\Model\Entity\Department[] $departments
 * @property \App\Model\Entity\Driver[] $drivers
 * @property \App\Model\Entity\Gpsdata[] $gpsdata
 * @property \App\Model\Entity\Ownership[] $ownerships
 * @property \App\Model\Entity\Purpose[] $purposes
 * @property \App\Model\Entity\Station[] $stations
 * @property \App\Model\Entity\Symbol[] $symbols
 * @property \App\Model\Entity\Trackingobject[] $trackingobjects
 */
class Customer extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
