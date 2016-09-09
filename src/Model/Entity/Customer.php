<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity
 *
 * @property int $id
 * @property string $name
 *
 * @property \App\Model\Entity\Department[] $departments
 * @property \App\Model\Entity\Driver[] $drivers
 * @property \App\Model\Entity\Gpsdata[] $gpsdata
 * @property \App\Model\Entity\Ownership[] $ownerships
 * @property \App\Model\Entity\Purpose[] $purposes
 * @property \App\Model\Entity\Station[] $stations
 * @property \App\Model\Entity\Symbol[] $symbols
 * @property \App\Model\Entity\Trackingobject[] $trackingobjects
 */
class Customer extends Entity
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
