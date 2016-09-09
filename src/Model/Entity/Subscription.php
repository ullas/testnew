<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Subscription Entity
 *
 * @property int $id
 * @property int $schedule_id
 * @property int $customer_id
 * @property string $name
 * @property bool $active
 * @property \Cake\I18n\Time $validfrom
 * @property \Cake\I18n\Time $validtill
 * @property int $location_id
 * @property int $notification_id
 * @property string $loctype
 *
 * @property \App\Model\Entity\Schedule $schedule
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\Notification $notification
 */
class Subscription extends Entity
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
