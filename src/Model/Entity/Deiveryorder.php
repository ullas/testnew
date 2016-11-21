<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Deiveryorder Entity
 *
 * @property int $id
 * @property string $orderno
 * @property string $awbumber
 * @property int $shipmenttype_id
 * @property int $orderstate_id
 * @property \Cake\I18n\Time $shipmentorderdate
 * @property int $distributioncenter_id
 * @property float $packageweight
 * @property float $packagevolume
 * @property float $packagevalue
 * @property int $paymenttype_id
 * @property int $pickupdeliverytype_id
 * @property bool $partialdeliveryallowed
 * @property bool $returnallowed
 * @property bool $cancellationallowed
 * @property int $pickupdeliverybranch_id
 * @property int $deliveryservicetime
 * @property \Cake\I18n\Time $deliverystarttimewindow
 * @property \Cake\I18n\Time $deliverydtimewindow
 * @property int $pdlocationtype_id
 * @property int $pdaacount_id
 * @property int $retutrnbranch_id
 * @property int $customer_id
 *
 * @property \App\Model\Entity\Shipmenttype $shipmenttype
 * @property \App\Model\Entity\Orderstate $orderstate
 * @property \App\Model\Entity\Distributioncenter $distributioncenter
 * @property \App\Model\Entity\Paymenttype $paymenttype
 * @property \App\Model\Entity\Pickupdeliverytype $pickupdeliverytype
 * @property \App\Model\Entity\Pickupdeliverybranch $pickupdeliverybranch
 * @property \App\Model\Entity\Pdlocationtype $pdlocationtype
 * @property \App\Model\Entity\Pdaacount $pdaacount
 * @property \App\Model\Entity\Retutrnbranch $retutrnbranch
 * @property \App\Model\Entity\Customer $customer
 */class Deiveryorder extends Entity
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
