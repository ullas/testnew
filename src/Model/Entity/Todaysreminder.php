<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Todaysreminder Entity
 *
 * @property int $id
 * @property int $servicereminder_id
 * @property \Cake\I18n\Time $date
 * @property int $status
 * @property int $customer_id
 * @property int $servicetask_id
 *
 * @property \App\Model\Entity\Servicereminder $servicereminder
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Servicetask $servicetask
 */
class Todaysreminder extends Entity
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
