<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Driver Entity
 *
 * @property int $id
 * @property string $name
 * @property \Cake\I18n\Time $dob
 * @property int $sex
 * @property string $nationality
 * @property string $idcardno
 * @property string $licenceno
 * @property string $licenceexpdate
 * @property int $address_id
 * @property string $nextofkin
 * @property string $comments
 * @property string $photo
 * @property int $ibutton_id
 * @property string $drivingpassportno
 * @property \Cake\I18n\Time $drivingpassportexp
 * @property int $customer_id
 * @property int $vehicle_id
 * @property string $drivinglicenseclass
 * @property int $contractor_id
 * @property int $station_id
 * @property \Cake\I18n\Time $reporingtime
 * @property int $offday1
 * @property int $offday2
 * @property int $supervisor_id
 * @property bool $isasupervisor
 * @property float $ragscore
 * @property string $ragsummary
 * @property float $salary
 * @property int $maritalstatus
 * @property float $experience
 * @property string $licenseissuedby
 * @property string $previouscompanyname
 * @property int $shift_id
 * @property bool $ismarker
 *
 * @property \App\Model\Entity\Address $address
 * @property \App\Model\Entity\Ibutton[] $ibuttons
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Vehicle[] $vehicles
 * @property \App\Model\Entity\Contractor $contractor
 * @property \App\Model\Entity\Station $station
 * @property \App\Model\Entity\Driver $supervisor
 * @property \App\Model\Entity\Shift $shift
 * @property \App\Model\Entity\Alert[] $alerts
 * @property \App\Model\Entity\Rfid[] $rfids
 * @property \App\Model\Entity\Drivergroup[] $drivergroups
 * @property \App\Model\Entity\Language[] $languages
 */
class Driver extends Entity
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
