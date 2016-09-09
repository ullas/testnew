<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vendor Entity
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $website
 * @property string $address
 * @property string $addressline2
 * @property string $city
 * @property string $state
 * @property string $zippostal
 * @property string $country
 * @property string $contactname
 * @property string $email
 * @property string $contactphone
 *
 * @property \App\Model\Entity\Vehiclepurchase[] $vehiclepurchases
 */
class Vendor extends Entity
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
