<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vehiclewheelstyre Entity
 *
 * @property int $id
 * @property int $vehicle_id
 * @property string $drivetype
 * @property string $breaksystem
 * @property float $fronttrackwidth
 * @property float $reartrackwidth
 * @property float $wheelbase
 * @property float $frontwheeldia
 * @property float $rearwheeldia
 * @property float $rearaxil
 * @property string $fronttyretype
 * @property float $fronttyrepsi
 * @property string $reartyretype
 * @property float $reartyrepsi
 *
 * @property \App\Model\Entity\Vehicle $vehicle
 */
class Vehiclewheelstyre extends Entity
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
