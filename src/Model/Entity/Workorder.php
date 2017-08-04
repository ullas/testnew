<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Workorder Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $issuedate
 * @property int $workorderstatus_id
 * @property int $vehicle_id
 * @property \Cake\I18n\Time $startdate
 * @property string $lables
 * @property float $odometer
 * @property bool $void
 * @property int $vendor_id
 * @property \Cake\I18n\Time $completiondate
 * @property float $labour
 * @property float $parts
 * @property float $dicount
 * @property float $tax
 * @property int $issuedby_id
 * @property int $assignedby_id
 * @property int $assignto_id
 * @property string $invoicenumber
 * @property string $description
 * @property string $phonenumber
 * @property int $customer_id
 * @property int $taxtype
 *
 * @property \App\Model\Entity\Workorderstatus $workorderstatus
 * @property \App\Model\Entity\Vehicle $vehicle
 * @property \App\Model\Entity\Vendor $vendor
 * @property \App\Model\Entity\Address $issuedby
 * @property \App\Model\Entity\Address $assignedby
 * @property \App\Model\Entity\Address $assignto
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Issue[] $issues
 * @property \App\Model\Entity\Workorderdocument[] $workorderdocuments
 * @property \App\Model\Entity\Workorderlabourlineitem[] $workorderlabourlineitems
 * @property \App\Model\Entity\Workorderpartslineitem[] $workorderpartslineitems
 */
class Workorder extends Entity
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
