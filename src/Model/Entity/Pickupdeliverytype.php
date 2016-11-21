<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pickupdeliverytype Entity
 *
 * @property int $id
 * @property string $name
 * @property int $customer_id
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Deiveryorder[] $deiveryorders
 * @property \App\Model\Entity\Pickupdeiveryorder[] $pickupdeiveryorders
 * @property \App\Model\Entity\Pickuporder[] $pickuporders
 */class Pickupdeliverytype extends Entity
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
