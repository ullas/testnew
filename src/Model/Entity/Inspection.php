<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Inspection Entity
 *
 * @property int $id
 * @property string $name
 * @property string $descriptions
 * @property int $inspectionfom_id
 * @property int $customer_id
 * @property \Cake\I18n\Time $date
 * @property int $inspectionstatus_id
 * @property int $vehicle_id
 *
 * @property \App\Model\Entity\Inspectionfom $inspectionfom
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Inspectionstatus $inspectionstatus
 */
class Inspection extends Entity
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
