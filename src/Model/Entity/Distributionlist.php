<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Distributionlist Entity
 *
 * @property string $name
 * @property string $description
 * @property int $customer_id
 * @property int $id
 * @property bool $system
 * @property bool $enabled
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Address[] $addresses
 */
class Distributionlist extends Entity
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
