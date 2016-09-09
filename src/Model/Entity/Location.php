<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Location Entity
 *
 * @property int $id
 * @property string $pointdata
 * @property string $name
 * @property int $user_id
 * @property int $customer_id
 * @property int $accesslevel
 * @property int $group_id
 * @property string $reg_name
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Vehiclegroup $vehiclegroup
 * @property \App\Model\Entity\Assetgroup $assetgroup
 * @property \App\Model\Entity\Peoplegroup $peoplegroup
 * @property \App\Model\Entity\Subscription[] $subscriptions
 */
class Location extends Entity
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
