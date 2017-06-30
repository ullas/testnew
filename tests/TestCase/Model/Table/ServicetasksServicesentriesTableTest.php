<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ServicetasksServicesentriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ServicetasksServicesentriesTable Test Case
 */
class ServicetasksServicesentriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ServicetasksServicesentriesTable
     */
    public $ServicetasksServicesentries;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.servicetasks_servicesentries',
        'app.servicesentries',
        'app.vehicles',
        'app.vehicletypes',
        'app.customers',
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
        'app.renewalreminders',
        'app.renewalstypes',
        'app.distributionlists',
        'app.distributionlists_addresses',
        'app.routes',
        'app.schedules',
        'app.startlocs',
        'app.jobs',
        'app.timepolicies',
        'app.trips',
        'app.startpoints',
        'app.subscriptions',
        'app.notifications',
        'app.endpoints',
        'app.tripstatuses',
        'app.vehiclecategories',
        'app.triptypes',
        'app.locations_trips',
        'app.templates',
        'app.templatetypes',
        'app.alertcategories',
        'app.providers',
        'app.devices',
        'app.devicemodels',
        'app.simcards',
        'app.simproviders',
        'app.distancetypes',
        'app.sensormappings',
        'app.gpsdata',
        'app.eventtypes',
        'app.tracking',
        'app.endlocs',
        'app.default_drivers',
        'app.rfids',
        'app.passengers',
        'app.drivergroups',
        'app.defaultdrivers',
        'app.drivers_drivergroups',
        'app.languages',
        'app.drivers_languages',
        'app.default_vehs',
        'app.vehiclestatuses',
        'app.ownerships',
        'app.driverdetectionmodes',
        'app.currencies',
        'app.vehiclepurchases',
        'app.vendors',
        'app.fuelentries',
        'app.fueldouments',
        'app.fuelphotos',
        'app.vehicleleases',
        'app.workorders',
        'app.workorderstatuses',
        'app.issuedbies',
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
        'app.transporters',
        'app.activedrivers',
        'app.inspections',
        'app.inspectionforms',
        'app.inspectionstatuses',
        'app.vehicleengines',
        'app.vehiclefluids',
        'app.vehiclepermits',
        'app.vehiclespecifications',
        'app.vehiclewheelstyres',
        'app.locations_schedules',
        'app.drivers_schedules',
        'app.passengergroups',
        'app.passengergroups_passengers',
        'app.trackingobjects_groups',
        'app.zonetypes',
        'app.people',
        'app.worklorderlineitems',
        'app.servicecompleted',
        'app.servicedocuments',
        'app.servicesentries_servicetasks'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ServicetasksServicesentries') ? [] : ['className' => 'App\Model\Table\ServicetasksServicesentriesTable'];
        $this->ServicetasksServicesentries = TableRegistry::get('ServicetasksServicesentries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ServicetasksServicesentries);

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
