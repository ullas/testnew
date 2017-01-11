<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Journey Entity
 *
 * @property \Cake\I18n\Time $start_time
 * @property \Cake\I18n\Time $end_time
 * @property int $id
 * @property float $maxspeed
 * @property float $idletime
 * @property int $trackingobject_id
 * @property string $start_loc
 * @property string $end_loc
 * @property float $averagespeed
 * @property float $distance
 *
 * @property \App\Model\Entity\Trackingobject $trackingobject
 */
class Journey extends Entity
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
