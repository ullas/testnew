<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Gpsdata Entity
 *
 * @property int $id
 * @property string $imei
 * @property \Cake\I18n\Time $gpstime
 * @property \Cake\I18n\Time $msgdtime
 * @property float $latitude
 * @property float $longitude
 * @property float $speed
 * @property string $heading
 * @property float $altitude
 * @property float $distance
 * @property string $status
 * @property float $odometer
 * @property int $digitalvalues
 * @property string $analogvalues
 * @property float $acceleration
 * @property float $deceleration
 * @property int $extstatus
 * @property int $trackingobject_id
 * @property int $customer_id
 * @property int $device_id
 * @property string $location
 * @property int $eventtype_id
 * @property string $humidity
 * @property string $temperature
 * @property string $ibuttoncode
 * @property int $supporttype
 * @property int $servacc
 * @property float $fuellevel
 * @property float $batteryvoltage
 * @property float $batterycurrent
 * @property float $gsmsignal
 * @property int $noofsatellite
 * @property float $pcbtemp
 * @property float $powersupply
 * @property float $gpspwer
 * @property float $fuelcounter
 * @property string $canmessage
 * @property string $extramessage
 * @property int $tripstatus
 * @property float $tripdistance
 * @property string $activesimid
 * @property int $additionalstat
 *
 * @property \App\Model\Entity\Trackingobject $trackingobject
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Device $device
 * @property \App\Model\Entity\Eventtype $eventtype
 */
class Gpsdata extends Entity
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
