<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VehiclepermitsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VehiclepermitsTable Test Case
 */
class VehiclepermitsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VehiclepermitsTable
     */
    public $Vehiclepermits;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.vehiclepermits',
        'app.vehicles',
        'app.vehicletypes',
        'app.vehiclestatuses',
        'app.customers',
        'app.mapregions',
        'app.customertypes',
        'app.addresses',
        'app.drivers',
        'app.ibuttons',
        'app.vehicles_drivers',
        'app.contractors',
        'app.stations',
        'app.shifts',
        'app.alerts',
        'app.trackingobjects',
        'app.assettypes',
        'app.assets',
        'app.symbols',
        'app.departments',
        'app.purposes',
        'app.fences',
        'app.users',
        'app.locations',
        'app.groups',
        'app.trackingobjects_groups',
        'app.jobs',
        'app.timepolicies',
        'app.schedules',
        'app.startlocs',
        'app.subscriptions',
        'app.notifications',
        'app.endlocs',
        'app.routes',
        'app.trips',
        'app.startpoints',
        'app.endpoints',
        'app.tripstatuses',
        'app.vehiclecategories',
        'app.triptypes',
        'app.default_drivers',
        'app.rfids',
        'app.passengers',
        'app.drivergroups',
        'app.defaultdrivers',
        'app.drivers_drivergroups',
        'app.languages',
        'app.drivers_languages',
        'app.default_vehs',
        'app.ownerships',
        'app.driverdetectionmodes',
        'app.transporters',
        'app.fuelentries',
        'app.vendors',
        'app.servicesentries',
        'app.servicecompleted',
        'app.servicedocuments',
        'app.vehicleleases',
        'app.vehiclepurchases',
        'app.currencies',
        'app.workorders',
        'app.workorderstatuses',
        'app.issuedbies',
        'app.distributionlists',
        'app.distributionlists_addresses',
        'app.assignedbies',
        'app.assigntos',
        'app.issues',
        'app.reportedbies',
        'app.issuestatuses',
        'app.issuedocuments',
        'app.workorderlineitems',
        'app.servicetasks',
        'app.servicereminders',
        'app.workordertypes',
        'app.workorderlabourlineitems',
        'app.issues_addresses',
        'app.workorderdocuments',
        'app.workorderpartslineitems',
        'app.parts',
        'app.partcategories',
        'app.measurementunits',
        'app.manufacturers',
        'app.fueldouments',
        'app.fuelphotos',
        'app.activedrivers',
        'app.inspections',
        'app.inspectionforms',
        'app.inspectionstatuses',
        'app.vehicleengines',
        'app.vehiclefluids',
        'app.vehiclespecifications',
        'app.vehiclewheelstyres',
        'app.templates',
        'app.templatetypes',
        'app.alertcategories',
        'app.providers',
        'app.devices',
        'app.devicemodels',
        'app.simcards',
        'app.simproviders',
        'app.gpsdata',
        'app.eventtypes',
        'app.tracking',
        'app.zonetypes',
        'app.people',
        'app.passengergroups',
        'app.passengergroups_passengers',
        'app.renewalreminders',
        'app.renewalstypes',
        'app.worklorderlineitems'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Vehiclepermits') ? [] : ['className' => 'App\Model\Table\VehiclepermitsTable'];
        $this->Vehiclepermits = TableRegistry::get('Vehiclepermits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Vehiclepermits);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
