<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DistributionlistsAddress Entity
 *
 * @property int $address_id
 * @property int $distributionlist_id
 * @property int $id
 * @property int $customer_id
 *
 * @property \App\Model\Entity\Address $address
 * @property \App\Model\Entity\Distributionlist $distributionlist
 * @property \App\Model\Entity\Customer $customer
 */
class DistributionlistsAddress extends Entity
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
