<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InspectionformsInspectionitem Entity
 *
 * @property int $id
 * @property int $inspectionform_id
 * @property int $inspectionitem_id
 * @property int $customer_id
 * @property int $vehicle_id
 *
 * @property \App\Model\Entity\Inspectionform $inspectionform
 * @property \App\Model\Entity\Inspectionitem $inspectionitem
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Vehicle $vehicle
 */
class InspectionformsInspectionitem extends Entity
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
