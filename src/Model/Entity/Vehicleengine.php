<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vehicleengine Entity
 *
 * @property int $id
 * @property string $enginesummary
 * @property string $brand
 * @property string $aspiration
 * @property string $blocktype
 * @property string $bore
 * @property string $camtype
 * @property int $vehicle_id
 * @property float $compression
 * @property int $cylinders
 * @property float $displacement
 * @property string $fuel_induction
 * @property string $fuel_quality
 * @property string $max_hp
 * @property string $max_torque
 * @property string $redline_rpm
 * @property string $stroke
 * @property int $valves
 * @property string $transmission_summary
 * @property string $trasmission_brand
 * @property string $transmission_type
 * @property string $traasmission_gears
 *
 * @property \App\Model\Entity\Vehicle $vehicle
 */
class Vehicleengine extends Entity
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
