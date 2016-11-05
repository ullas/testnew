<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vehiclelease Entity
 *
 * @property int $id
 * @property float $maonthypayment
 * @property \Cake\I18n\Time $startdate
 * @property \Cake\I18n\Time $enddate
 * @property float $amountfinanced
 * @property float $interestrate
 * @property float $residualvalue
 * @property int $vendor_id
 * @property float $accountnumber
 * @property string $ifsccode
 * @property string $swiftcode
 * @property string $notes
 * @property int $customer_id
 * @property int $vehicle_id
 *
 * @property \App\Model\Entity\Vendor $vendor
 */
class Vehiclelease extends Entity
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
