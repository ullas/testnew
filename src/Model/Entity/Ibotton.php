<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ibotton Entity
 *
 * @property int $id
 * @property string $code
 * @property string $description
 * @property int $customer_id
 * @property int $driver_id
 * @property bool $privatekey
 * @property \Cake\I18n\Time $dateofpurchase
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Driver $driver
 */
class Ibotton extends Entity
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
