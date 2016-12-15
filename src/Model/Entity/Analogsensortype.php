<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Analogsensortype Entity
 *
 * @property string $name
 * @property string $description
 * @property string $icon
 * @property string $unit
 * @property int $id
 * @property string $atmessage
 * @property string $btmessage
 * @property string $irmessage
 * @property string $ormessage
 */class Analogsensortype extends Entity
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
