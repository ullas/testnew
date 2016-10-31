<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Device Entity
 *
 * @property int $id
 * @property string $code
 * @property int $customer_id
 * @property \Cake\I18n\Time $install_date
 * @property string $installed_by
 * @property string $certified_by
 * @property string $comments
 * @property int $provider_id
 * @property int $distance_type
 * @property bool $odometersupport
 * @property int $initodometer
 * @property int $devicemodel_id
 * @property int $simcard_id
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Provider $provider
 * @property \App\Model\Entity\Devicemodel $devicemodel
 * @property \App\Model\Entity\Simcard $simcard
 * @property \App\Model\Entity\Gpsdata[] $gpsdata
 * @property \App\Model\Entity\Tracking[] $tracking
 */
class Device extends Entity
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
