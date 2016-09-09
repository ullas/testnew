<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Person Entity
 *
 * @property int $id
 * @property int $trackingobject_id
 * @property int $age
 * @property string $designation
 * @property string $address
 * @property string $addressline1
 * @property string $city
 * @property string $country
 * @property string $email
 * @property string $phone
 * @property int $department_id
 * @property int $station_id
 * @property string $name
 *
 * @property \App\Model\Entity\Trackingobject $trackingobject
 * @property \App\Model\Entity\Department $department
 * @property \App\Model\Entity\Station $station
 */
class Person extends Entity
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
