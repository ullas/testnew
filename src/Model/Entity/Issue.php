<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Issue Entity
 *
 * @property int $id
 * @property int $vehicle_id
 * @property \Cake\I18n\Time $reportedon
 * @property string $summary
 * @property string $description
 * @property float $odometer
 * @property int $reportedby_id
 * @property int $assignedto_id
 * @property string $tags
 *
 * @property \App\Model\Entity\Vehicle $vehicle
 * @property \App\Model\Entity\Reportedby $reportedby
 * @property \App\Model\Entity\Assignedto $assignedto
 * @property \App\Model\Entity\Issuedocument[] $issuedocuments
 */
class Issue extends Entity
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
