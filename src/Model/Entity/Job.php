<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Job Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $jobdate
 * @property int $trackingobject_id
 * @property string $assigned_by
 * @property string $title
 * @property string $description
 * @property \Cake\I18n\Time $jobtime
 * @property string $comments
 * @property int $customer_id
 * @property int $timepolicy_id
 * @property int $template_id
 * @property string $endcustomername
 * @property string $endcustomermailid
 * @property string $endcustomerphone
 * @property int $location_id
 * @property int $status
 * @property int $distance
 *
 * @property \App\Model\Entity\Trackingobject $trackingobject
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Timepolicy $timepolicy
 * @property \App\Model\Entity\Template $template
 * @property \App\Model\Entity\Location $location
 */
class Job extends Entity
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
