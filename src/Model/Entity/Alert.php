<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Alert Entity
 *
 * @property int $id
 * @property string $alert_message
 * @property int $trackingobject_id
 * @property float $latitude
 * @property float $longitude
 * @property int $alert_type
 * @property int $priority
 * @property int $send_option
 * @property int $alertcategories_id
 * @property bool $ack
 * @property string $ack_by
 * @property \Cake\I18n\Time $alert_dtime
 * @property string $location
 * @property int $customer_id
 * @property int $velocity
 * @property \Cake\I18n\Time $ack_dtime
 * @property int $notification_send
 * @property int $odometer
 * @property string $extinfo
 * @property int $frid
 * @property int $driver_id
 * @property string $driver_key
 * @property \Cake\I18n\Time $endtime
 * @property int $duration
 *
 * @property \App\Model\Entity\Trackingobject $trackingobject
 * @property \App\Model\Entity\Alertcategory $alertcategory
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Driver $driver
 */
class Alert extends Entity
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
