<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InspectionsInspectionitem Entity
 *
 * @property int $id
 * @property int $inspection_id
 * @property int $inspectionitem_id
 * @property int $inspectionitemtype_id
 * @property string $name
 * @property bool $passfailvalue
 * @property string $meterentryvalue
 * @property string $textvalue
 *
 * @property \App\Model\Entity\Inspection $inspection
 * @property \App\Model\Entity\Inspectionitem $inspectionitem
 * @property \App\Model\Entity\Inspectionitemtype $inspectionitemtype
 */
class InspectionsInspectionitem extends Entity
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
