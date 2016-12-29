<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Message Entity
 *
 * @property string $message
 * @property int $device_id
 * @property \Cake\I18n\Time $msg_dtime
 * @property string $ip
 * @property float $longitude
 * @property float $latitude
 * @property int $type
 * @property int $priority
 * @property \Cake\I18n\Time $activate_at
 * @property bool $ack
 * @property string $ack_by
 * @property \Cake\I18n\Time $ack_dtime
 * @property string $location
 * @property string $send_option
 * @property int $messagecategory_id
 * @property int $customer_id
 * @property bool $direction
 * @property int $trackingobject_id
 * @property int $id
 * @property int $driver_id
 * @property int $status
 *
 * @property \App\Model\Entity\Device $device
 * @property \App\Model\Entity\Messagecategory $messagecategory
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Trackingobject $trackingobject
 * @property \App\Model\Entity\Driver $driver
 */
class Message extends Entity
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
