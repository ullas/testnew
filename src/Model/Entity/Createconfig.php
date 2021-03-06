<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Createconfig Entity
 *
 * @property int $id
 * @property string $table_name
 * @property string $field_name
 * @property string $datatype
 * @property int $customer_id
 * @property string $title
 * @property string $helpmessage
 * @property int $order
 * @property bool $isselect
 *
 * @property \App\Model\Entity\Customer $customer
 */
class Createconfig extends Entity
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
