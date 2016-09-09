<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Timepolicy Entity
 *
 * @property string $name
 * @property bool $sunday
 * @property bool $monday
 * @property bool $tuesday
 * @property bool $wednesday
 * @property bool $thursday
 * @property bool $friday
 * @property bool $saturday
 * @property \Cake\I18n\Time $sun_start_time
 * @property \Cake\I18n\Time $sun_end_time
 * @property \Cake\I18n\Time $mon_start_time
 * @property \Cake\I18n\Time $mon_end_time
 * @property \Cake\I18n\Time $tue_start_time
 * @property \Cake\I18n\Time $tue_end_time
 * @property \Cake\I18n\Time $wed_start_time
 * @property \Cake\I18n\Time $wed_end_time
 * @property \Cake\I18n\Time $thu_start_time
 * @property \Cake\I18n\Time $thu_end_time
 * @property \Cake\I18n\Time $fri_start_time
 * @property \Cake\I18n\Time $fri_end_time
 * @property \Cake\I18n\Time $sat_start_time
 * @property \Cake\I18n\Time $sat_end_time
 * @property bool $ev
 * @property int $id
 * @property int $customer_id
 * @property bool $system
 * @property bool $enabled
 * @property string $description
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Schedule[] $schedules
 * @property \App\Model\Entity\Trip[] $trips
 */
class Timepolicy extends Entity
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
