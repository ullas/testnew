<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Workorderlabourlineitem Entity
 *
 * @property int $id
 * @property string $name
 * @property int $workorder_id
 * @property float $labour
 * @property int $customer_id
 * @property float $hours
 * @property int $address_id
 * @property int $workorderlineitem_id
 *
 * @property \App\Model\Entity\Workorder $workorder
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Address $address
 * @property \App\Model\Entity\Servicetask $servicetask
 */
class Workorderlabourlineitem extends Entity
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
