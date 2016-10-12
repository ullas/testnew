<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fuelentry Entity
 *
 * @property int $id
 * @property int $vehicle_id
 * @property \Cake\I18n\Time $date
 * @property float $odo
 * @property float $priceperusnit
 * @property string $fueltype
 * @property int $vendor_id
 * @property string $ref
 * @property bool $partialfill
 * @property string $markaspersonal
 * @property int $customer_id
 * @property string $name
 *
 * @property \App\Model\Entity\Vehicle $vehicle
 * @property \App\Model\Entity\Vendor $vendor
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Fueldoument[] $fueldouments
 * @property \App\Model\Entity\Fuelphoto[] $fuelphotos
 */
class Fuelentry extends Entity
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
