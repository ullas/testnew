<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WorkorderlineitemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WorkorderlineitemsTable Test Case
 */
class WorkorderlineitemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WorkorderlineitemsTable
     */
    public $Workorderlineitems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.workorderlineitems',
        'app.workorders',
        'app.workorderstatuses',
        'app.customers',
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
        'app.currencies',
        'app.vehiclepurchases',
        'app.vendors',
        'app.fuelentries',
        'app.fueldouments',
        'app.fuelphotos',
        'app.servicesentries',
        'app.servicecompleted',
        'app.servicedocuments',
        'app.servicetasks',
        'app.servicereminders',
        'app.distributionlists',
        'app.distributionlists_addresses',
        'app.groups',
        'app.fences',
        'app.users',
        'app.locations',
        'app.jobs',
        'app.trackingobjects',
        'app.assettypes',
        'app.alerts',
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
        'app.templates',
        'app.templatetypes',
        'app.assets',
        'app.people',
        'app.routes',
        'app.schedules',
        'app.startlocs',
        'app.subscriptions',
        'app.notifications',
        'app.timepolicies',
        'app.trips',
        'app.startpoints',
        'app.endpoints',
        'app.tripstatuses',
        'app.vehiclecategories',
        'app.triptypes',
        'app.locations_trips',
        'app.endlocs',
        'app.default_drivers',
        'app.vehicles_drivers',
        'app.contractors',
        'app.shifts',
        'app.rfids',
        'app.passengers',
        'app.drivergroups',
        'app.defaultdrivers',
        'app.drivers_drivergroups',
        'app.languages',
        'app.drivers_languages',
        'app.default_vehs',
        'app.transporters',
        'app.vehicleleases',
        'app.activedrivers',
        'app.inspections',
        'app.inspectionforms',
        'app.inspectionstatuses',
        'app.issues',
        'app.reportedbies',
        'app.issuestatuses',
        'app.issuedocuments',
        'app.issues_addresses',
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
        'app.renewalreminders',
        'app.renewalstypes',
        'app.servicetasks_servicesentries',
        'app.issues_servicesentries',
        'app.manufacturers',
        'app.parts',
        'app.partcategories',
        'app.measurementunits',
        'app.worklorderlineitems',
        'app.workordertypes',
        'app.workorderdocuments',
        'app.issuedbies',
        'app.assignedbies',
        'app.assigntos',
        'app.workorderlabourlineitems',
        'app.workorderpartslineitems'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Workorderlineitems') ? [] : ['className' => 'App\Model\Table\WorkorderlineitemsTable'];
        $this->Workorderlineitems = TableRegistry::get('Workorderlineitems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Workorderlineitems);

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

    /**
     * Test deleteLineItems method
     *
     * @return void
     */
    public function testDeleteLineItems()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test deleteLineItemsFromIndex method
     *
     * @return void
     */
    public function testDeleteLineItemsFromIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
