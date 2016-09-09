<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vehiclespecification Entity
 *
 * @property int $id
 * @property float $width
 * @property float $height
 * @property float $length
 * @property float $interiorvolume
 * @property float $passengervolume
 * @property float $cargovolume
 * @property float $groudclearance
 * @property float $bedlength
 * @property float $curbweight
 * @property float $grossweight
 * @property float $towingcapacity
 * @property float $epacity
 * @property float $epahighway
 * @property float $epacombined
 * @property int $vehicle_id
 * @property int $maxpayload
 *
 * @property \App\Model\Entity\Vehicle $vehicle
 */
class Vehiclespecification extends Entity
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
