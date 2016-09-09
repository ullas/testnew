<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Template Entity
 *
 * @property int $id
 * @property int $customer_id
 * @property string $name
 * @property string $description
 * @property int $templatetype_id
 * @property int $alertcategory_id
 * @property string $template
 * @property string $subject
 * @property string $templatecat
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Templatetype $templatetype
 * @property \App\Model\Entity\Alertcategory $alertcategory
 * @property \App\Model\Entity\Job[] $jobs
 */
class Template extends Entity
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
