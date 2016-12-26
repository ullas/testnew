<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SchedulesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SchedulesTable Test Case
 */
class SchedulesTableTest extends TestCase
{

    /**
     * Test subject     *
     * @var \App\Model\Table\SchedulesTable     */
    public $Schedules;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.schedules',
        'app.startlocs',
        'app.users',
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
        'app.vehicleleases',
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
        'app.groups',
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
        'app.jobs',
        'app.timepolicies',
        'app.trips',
        'app.routes',
        'app.startpoints',
        'app.subscriptions',
        'app.locations',
        'app.notifications',
        'app.endpoints',
        'app.tripstatuses',
        'app.vehiclecategories',
        'app.triptypes',
        'app.assets',
        'app.fences',
        'app.zonetypes',
        'app.people',
        'app.trackingobjects_groups',
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
        'app.inspections',
        'app.inspectionforms',
        'app.inspectionstatuses',
        'app.vehicleengines',
        'app.vehiclefluids',
        'app.vehiclepermits',
        'app.vehiclespecifications',
        'app.vehiclewheelstyres',
        'app.passengergroups',
        'app.passengergroups_passengers',
        'app.renewalreminders',
        'app.renewalstypes',
        'app.worklorderlineitems',
        'app.endlocs',
        'app.default_drivers',
        'app.default_vehs',
        'app.locations_schedules'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Schedules') ? [] : ['className' => 'App\Model\Table\SchedulesTable'];        $this->Schedules = TableRegistry::get('Schedules', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Schedules);

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
