<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vehiclepurchase Entity
 *
 * @property int $id
 * @property int $vendor_id
 * @property int $price
 * @property int $currency_id
 * @property \Cake\I18n\Time $purchasedate
 * @property float $purchasepodometer
 * @property \Cake\I18n\Time $warrantyexpdate
 * @property int $warrentyexpmeter
 * @property string $comments
 * @property int $vehicle_id
 *
 * @property \App\Model\Entity\Vendor $vendor
 * @property \App\Model\Entity\Currency $currency
 * @property \App\Model\Entity\Vehicle $vehicle
 */
class Vehiclepurchase extends Entity
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
