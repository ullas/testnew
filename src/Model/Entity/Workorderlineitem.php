<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Workorderlineitem Entity
 *
 * @property int $id
 * @property string $name
 * @property int $workorder_id
 * @property float $labour
 * @property float $parts
 * @property int $numitems
 * @property int $servicetask_id
 * @property int $workordertype_id
 * @property int $issue_id
 * @property int $customer_id
 * @property int $taxtype
 * @property float $tax
 *
 * @property \App\Model\Entity\Workorder $workorder
 * @property \App\Model\Entity\Servicetask $servicetask
 * @property \App\Model\Entity\Workordertype $workordertype
 * @property \App\Model\Entity\Issue $issue
 * @property \App\Model\Entity\Workorderlabourlineitem[] $workorderlabourlineitems
 */
class Workorderlineitem extends Entity
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
