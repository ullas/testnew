<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InspectionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InspectionsTable Test Case
 */
class InspectionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InspectionsTable
     */
    public $Inspections;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.inspections',
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
        'app.workordertypes',
        'app.workorderlabourlineitems',
        'app.issues_addresses',
        'app.workorderdocuments',
        'app.workorderpartslineitems',
        'app.parts',
        'app.partcategories',
        'app.measurementunits',
        'app.manufacturers',
        'app.activedrivers',
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
        'app.worklorderlineitems',
        'app.inspectionstatuses',
        'app.inspectionforms',
        'app.inspectionitems',
        'app.inspectionitemtypes',
        'app.inspectionforms_inspectionitems'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Inspections') ? [] : ['className' => 'App\Model\Table\InspectionsTable'];
        $this->Inspections = TableRegistry::get('Inspections', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Inspections);

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
