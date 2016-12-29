<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ragscore Entity
 *
 * @property int $id
 * @property int $customer_id
 * @property float $distance
 * @property string $driver_code
 * @property \Cake\I18n\Time $idate
 * @property int $ose
 * @property int $oste
 * @property int $hbe
 * @property int $eae
 * @property int $pbe
 * @property int $nde
 * @property int $ede
 * @property int $dte
 * @property int $maxspeed
 * @property int $duration
 *
 * @property \App\Model\Entity\Customer $customer
 */
class Ragscore extends Entity
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
