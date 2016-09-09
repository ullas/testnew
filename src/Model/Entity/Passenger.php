<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Passenger Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property bool $active
 * @property string $sex
 * @property int $age
 * @property string $address
 * @property string $phone
 * @property string $mobile
 * @property string $comments
 * @property int $customer_id
 *
 * @property \App\Model\Entity\Customer $customer
 */
class Passenger extends Entity
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
