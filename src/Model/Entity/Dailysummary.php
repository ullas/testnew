<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Dailysummary Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $mdate
 * @property float $odometerstart
 * @property float $odometerend
 * @property float $distance
 * @property float $fuel
 * @property int $trackingobject_id
 * @property int $customer_id
 * @property int $runningtime
 * @property int $stoppedtime
 * @property int $parkedtime
 * @property int $idletime
 * @property int $businesstime
 *
 * @property \App\Model\Entity\Trackingobject $trackingobject
 * @property \App\Model\Entity\Customer $customer
 */
class Dailysummary extends Entity
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
