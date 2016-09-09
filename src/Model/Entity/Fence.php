<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fence Entity
 *
 * @property int $id
 * @property string $name
 * @property int $user_id
 * @property string $fencedata
 * @property int $group_id
 * @property int $vehicle_id
 * @property bool $show_on_map
 * @property bool $alerts_on
 * @property bool $enter_alert
 * @property bool $enter_in
 * @property bool $leave_alert
 * @property bool $leave_out
 * @property int $customer_id
 * @property int $leave_out_time
 * @property int $enter_in_time
 * @property int $zonetype_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Group $group
 * @property \App\Model\Entity\Vehicle $vehicle
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Zonetype $zonetype
 */
class Fence extends Entity
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
