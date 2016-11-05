<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DevicesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DevicesTable Test Case
 */
class DevicesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DevicesTable
     */
    public $Devices;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.devices',
        'app.customers',
        'app.mapregions',
        'app.customertypes',
        'app.addresses',
        'app.drivers',
        'app.ibuttons',
        'app.vehicles',
        'app.vehicletypes',
        'app.vehiclestatuses',
        'app.ownerships',
        'app.symbols',
        'app.driverdetectionmodes',
        'app.stations',
        'app.departments',
        'app.purposes',
        'app.transporters',
        'app.vehiclepurchases',
        'app.vendors',
        'app.currencies',
        'app.activedrivers',
        'app.vehicles_drivers',
        'app.contractors',
        'app.shifts',
        'app.alerts',
        'app.trackingobjects',
        'app.assettypes',
        'app.assets',
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
        'app.fuelentries',
        'app.fueldouments',
        'app.fuelphotos',
        'app.inspections',
        'app.inspectionfoms',
        'app.inspectionstatuses',
        'app.issues',
        'app.reportedbies',
        'app.distributionlists',
        'app.distributionlists_addresses',
        'app.workorders',
        'app.workorderstatuses',
        'app.issuedbies',
        'app.assignedbies',
        'app.assigntos',
        'app.workorderdocuments',
        'app.workorderlabourlineitems',
        'app.workorderlineitems',
        'app.servicetasks',
        'app.servicereminders',
        'app.workordertypes',
        'app.workorderpartslineitems',
        'app.parts',
        'app.partcategories',
        'app.measurementunits',
        'app.manufacturers',
        'app.servicesentries',
        'app.servicecompleted',
        'app.servicedocuments',
        'app.issuestatuses',
        'app.issuedocuments',
        'app.issues_addresses',
        'app.vehicleengines',
        'app.vehiclefluids',
        'app.vehicleleases',
        'app.vehiclepermits',
        'app.vehiclespecifications',
        'app.vehiclewheelstyres',
        'app.templates',
        'app.templatetypes',
        'app.alertcategories',
        'app.zonetypes',
        'app.gpsdata',
        'app.eventtypes',
        'app.people',
        'app.tracking',
        'app.passengergroups',
        'app.passengergroups_passengers',
        'app.providers',
        'app.renewalreminders',
        'app.renewalstypes',
        'app.worklorderlineitems',
        'app.devicemodels',
        'app.simcards',
        'app.simproviders'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Devices') ? [] : ['className' => 'App\Model\Table\DevicesTable'];
        $this->Devices = TableRegistry::get('Devices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Devices);

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
