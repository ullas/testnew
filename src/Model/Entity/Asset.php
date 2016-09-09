<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Asset Entity
 *
 * @property int $id
 * @property int $trackingobject_id
 * @property int $assettype_id
 * @property string $location
 * @property bool $isstationary
 * @property int $symbol_id
 * @property int $department_id
 * @property int $station_id
 * @property int $purpose_id
 * @property string $name
 *
 * @property \App\Model\Entity\Trackingobject $trackingobject
 * @property \App\Model\Entity\Assettype $assettype
 * @property \App\Model\Entity\Symbol $symbol
 * @property \App\Model\Entity\Department $department
 * @property \App\Model\Entity\Station $station
 * @property \App\Model\Entity\Purpose $purpose
 */
class Asset extends Entity
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
