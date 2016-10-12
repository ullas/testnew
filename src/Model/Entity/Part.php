<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Part Entity
 *
 * @property int $id
 * @property string $partno
 * @property int $partcategory_id
 * @property string $manufacturerpartno
 * @property string $description
 * @property int $measurementunit_id
 * @property float $upc
 * @property float $cost
 * @property int $station_id
 * @property int $manufacturer_id
 * @property int $customer_id
 *
 * @property \App\Model\Entity\Partcategory $partcategory
 * @property \App\Model\Entity\Manufacturer $manufacturer
 * @property \App\Model\Entity\Measurementunit $measurementunit
 * @property \App\Model\Entity\Station $station
 */
class Part extends Entity
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
