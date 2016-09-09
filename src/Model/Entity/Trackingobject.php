<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Trackingobject Entity
 *
 * @property int $id
 * @property string $name
 * @property int $assettype_id
 * @property \Cake\I18n\Time $created_date
 * @property \Cake\I18n\Time $modifield_date
 * @property bool $public_asset
 * @property bool $is_active
 * @property int $customer_id
 *
 * @property \App\Model\Entity\Assettype $assettype
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Gpsdata[] $gpsdata
 * @property \App\Model\Entity\Vehicle[] $vehicles
 */
class Trackingobject extends Entity
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
        'id' => true
    ];
}
