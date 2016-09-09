<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Trip Entity
 *
 * @property int $id
 * @property string $name
 * @property \Cake\I18n\Time $start_date
 * @property \Cake\I18n\Time $end_date
 * @property int $customer_id
 * @property int $vehicle_id
 * @property \Cake\I18n\Time $start_time
 * @property \Cake\I18n\Time $end_time
 * @property int $timepolicy_id
 * @property int $route_id
 * @property int $startpoint_id
 * @property int $endpoint_id
 * @property int $schedule_id
 * @property int $passengergroup_id
 * @property bool $autogen
 * @property int $tripstatus_id
 * @property string $last_location
 * @property bool $canceled
 * @property bool $active
 * @property bool $fromitinerary
 * @property int $trackingcode
 * @property \Cake\I18n\Time $adt
 * @property \Cake\I18n\Time $aat
 * @property \Cake\I18n\Time $edt
 * @property \Cake\I18n\Time $eat
 * @property int $vehiclecategory_id
 * @property int $platform
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Vehicle $vehicle
 * @property \App\Model\Entity\Timepolicy $timepolicy
 * @property \App\Model\Entity\Route $route
 * @property \App\Model\Entity\Location $startpoint
 * @property \App\Model\Entity\Location $endpoint
 * @property \App\Model\Entity\Schedule $schedule
 * @property \App\Model\Entity\Paxgroup $paxgroup
 * @property \App\Model\Entity\Tripstatus $tripstatus
 * @property \App\Model\Entity\Vehiclecategory $vehiclecategory
 */
class Trip extends Entity
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
