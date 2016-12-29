<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LocationsTrip Entity
 *
 * @property int $id
 * @property int $trip_id
 * @property int $location_id
 * @property int $orderid
 * @property \Cake\I18n\Time $SAT
 * @property \Cake\I18n\Time $SDT
 * @property int $day_start_s
 * @property int $day_end_s
 * @property \Cake\I18n\Time $AAT
 * @property \Cake\I18n\Time $ADT
 * @property \Cake\I18n\Time $EDT
 * @property \Cake\I18n\Time $EAT
 *
 * @property \App\Model\Entity\Trip $trip
 * @property \App\Model\Entity\Location $location
 */class LocationsTrip extends Entity
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
