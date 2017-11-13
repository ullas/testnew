<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Inspectionitem Entity
 *
 * @property int $id
 * @property int $inspectionitemtype_id
 * @property string $name
 * @property string $description
 * @property int $customer_id
 * @property bool $required
 * @property int $inspectionform_id
 *
 * @property \App\Model\Entity\Inspectionitemtype $inspectionitemtype
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Inspectionform[] $inspectionforms
 */
class Inspectionitem extends Entity
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
