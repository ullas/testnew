<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vehicle Entity
 *
 * @property int $id
 * @property string $code
 * @property string $plateno
 * @property int $vehicletype_id
 * @property int $year
 * @property string $make
 * @property string $model
 * @property string $trim
 * @property string $registationloc
 * @property int $vehiclestatus_id
 * @property int $ownership_id
 * @property int $symbol_id
 * @property int $driverdetectionmode_id
 * @property int $station_id
 * @property int $department_id
 * @property float $odometer
 * @property int $trackingobject_id
 * @property string $description
 * @property string $regstate
 * @property string $color
 * @property string $bodytype
 * @property string $bodysubtype
 * @property string $msrp
 * @property string $photo
 * @property int $purpose_id
 * @property string $name
 * @property int $transporter_id
 * @property int $activedriver_id
 * @property int $customer_id
 *
 * @property \App\Model\Entity\Vehicletype $vehicletype
 * @property \App\Model\Entity\Vehiclestatus $vehiclestatus
 * @property \App\Model\Entity\Ownership $ownership
 * @property \App\Model\Entity\Symbol $symbol
 * @property \App\Model\Entity\Station $station
 * @property \App\Model\Entity\Department $department
 * @property \App\Model\Entity\Trackingobject $trackingobject
 * @property \App\Model\Entity\Purpose $purpose
 * @property \App\Model\Entity\Vendor $transporter
 * @property \App\Model\Entity\Driver $activedriver
 * @property \App\Model\Entity\Driver[] $drivers
 * @property \App\Model\Entity\Fuelentry[] $fuelentries
 * @property \App\Model\Entity\Issue[] $issues
 * @property \App\Model\Entity\Servicesentry[] $servicesentries
 * @property \App\Model\Entity\Trip[] $trips
 * @property \App\Model\Entity\Vehicleengine[] $vehicleengines
 * @property \App\Model\Entity\Vehiclefluid[] $vehiclefluids
 * @property \App\Model\Entity\Vehiclepermit[] $vehiclepermits
 * @property \App\Model\Entity\Vehiclepurchase[] $vehiclepurchases
 * @property \App\Model\Entity\Vehiclespecification[] $vehiclespecifications
 * @property \App\Model\Entity\Vehiclewheelstyre[] $vehiclewheelstyres
 * @property \App\Model\Entity\Workorder[] $workorders
 * @property \App\Model\Entity\Customer $customer
 */
class Vehicle extends Entity
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
