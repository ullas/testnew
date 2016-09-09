<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Route Entity
 *
 * @property int $id
 * @property string $start_point
 * @property string $end_point
 * @property string $the_geom
 * @property int $vehicle_id
 * @property int $customer_id
 * @property int $user_id
 * @property int $buffer_size
 * @property string $name
 * @property int $group_id
 *
 * @property \App\Model\Entity\Vehicle $vehicle
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Assetgroup $assetgroup
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Group $group
 * @property \App\Model\Entity\Schedule[] $schedules
 * @property \App\Model\Entity\Trip[] $trips
 */
class Route extends Entity
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
