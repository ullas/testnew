<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Schedule Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $validfrom
 * @property \Cake\I18n\Time $validtill
 * @property int $startloc_id
 * @property int $endloc_id
 * @property int $route_id
 * @property \Cake\I18n\Time $start_time
 * @property \Cake\I18n\Time $end_time
 * @property int $customer_id
 * @property int $timepolicy_id
 * @property int $default_driver_id
 * @property int $default_veh_id
 * @property string $name
 * @property int $nodays
 * @property int $brktime_bfr_nxt_trip
 * @property int $default_paxgrpid
 *
 * @property \App\Model\Entity\Location $startloc
 * @property \App\Model\Entity\Location $endloc
 * @property \App\Model\Entity\Route $route
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Timepolicy $timepolicy
 * @property \App\Model\Entity\DefaultDriver $default_driver
 * @property \App\Model\Entity\DefaultVeh $default_veh
 */
class Schedule extends Entity
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
