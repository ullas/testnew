<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pdaccount Entity
 *
 * @property int $id
 * @property string $name
 * @property int $code
 * @property string $email
 * @property string $phone
 * @property string $aprtment
 * @property string $street
 * @property string $landmark
 * @property string $locality
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $pincode
 * @property int $customer_id
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Deiveryorder[] $deiveryorders
 */class Pdaccount extends Entity
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
