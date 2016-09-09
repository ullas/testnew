<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Renewalreminder Entity
 *
 * @property int $id
 * @property int $renewalstype_id
 * @property int $duedate
 * @property int $timethreashold
 * @property bool $notificationrequired
 * @property int $distributionlist_id
 * @property int $group_id
 * @property int $customer_id
 *
 * @property \App\Model\Entity\Renewalstype $renewalstype
 * @property \App\Model\Entity\Distributionlist $distributionlist
 * @property \App\Model\Entity\Group $group
 * @property \App\Model\Entity\Customer $customer
 */
class Renewalreminder extends Entity
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
