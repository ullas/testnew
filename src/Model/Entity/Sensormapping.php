<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sensormapping Entity
 *
 * @property int $id
 * @property int $device_id
 * @property int $AI0
 * @property int $AI1
 * @property int $AI2
 * @property int $AI3
 * @property int $AI4
 * @property int $AI5
 * @property int $AI6
 * @property int $AI7
 * @property int $DI0
 * @property int $DI1
 * @property int $DI2
 * @property int $DI3
 * @property int $DI4
 * @property int $DI5
 * @property int $DI6
 * @property int $DI7
 * @property int $AO0
 * @property int $AO1
 * @property int $AO2
 * @property int $AO3
 * @property int $AO4
 * @property int $AO5
 * @property int $AO6
 * @property int $AO7
 * @property int $DO0
 * @property int $DO1
 * @property int $DO2
 * @property int $DO3
 * @property int $DO4
 * @property int $DO5
 * @property int $DO6
 * @property int $DO7
 * @property float $AI0_VAL1
 * @property float $AI1_VAL1
 * @property float $AI2_VAL1
 * @property float $AI3_VAL1
 * @property float $AI4_VAL1
 * @property float $AI5_VAL1
 * @property float $AI6_VAL1
 * @property float $AI7_VAL1
 * @property float $AI0_VAL2
 * @property float $AI1_VAL2
 * @property float $AI2_VAL2
 * @property float $AI3_VAL2
 * @property float $AI4_VAL2
 * @property float $AI5_VAL2
 * @property float $AI6_VAL2
 * @property float $AI7_VAL2
 * @property int $AI0_TYPE
 * @property int $AI1_TYPE
 * @property int $AI2_TYPE
 * @property int $AI3_TYPE
 * @property int $AI4_TYPE
 * @property int $AI5_TYPE
 * @property int $AI6_TYPE
 * @property int $AI7_TYPE
 * @property int $DI0_TYPE
 * @property int $DI1_TYPE
 * @property int $DI2_TYPE
 * @property int $DI3_TYPE
 * @property int $DI4_TYPE
 * @property int $DI5_TYPE
 * @property int $DI6_TYPE
 * @property int $DI7_TYPE
 * @property float $AI0_REF
 * @property float $AI1_REF
 * @property float $AI2_REF
 * @property float $AI3_REF
 * @property float $AI4_REF
 * @property float $AI5_REF
 * @property float $AI6_REF
 * @property float $AI7_REF
 * @property int $customer_id
 *
 * @property \App\Model\Entity\Device $device
 * @property \App\Model\Entity\Customer $customer
 */class Sensormapping extends Entity
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
