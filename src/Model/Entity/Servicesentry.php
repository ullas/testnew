<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Servicesentry Entity
 *
 * @property int $id
 * @property int $vehicle_id
 * @property float $odometer
 * @property string $refer
 * @property float $labour
 * @property string $parts
 * @property float $tax
 * @property bool $markasvoid
 * @property int $vendor_id
 * @property string $comments
 *
 * @property \App\Model\Entity\Vehicle $vehicle
 * @property \App\Model\Entity\Vendor $vendor
 * @property \App\Model\Entity\Servicecompleted[] $servicecompleted
 * @property \App\Model\Entity\Servicedocument[] $servicedocuments
 */
class Servicesentry extends Entity
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
