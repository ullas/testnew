<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SensormappingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SensormappingsTable Test Case
 */
class SensormappingsTableTest extends TestCase
{

    /**
     * Test subject     *
     * @var \App\Model\Table\SensormappingsTable     */
    public $Sensormappings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sensormappings',
        'app.devices',
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
        'app.templates',
        'app.templatetypes',
        'app.jobs',
        'app.timepolicies',
        'app.schedules',
        'app.startlocs',
        'app.users',
        'app.fences',
        'app.zonetypes',
        'app.locations',
        'app.subscriptions',
        'app.notifications',
        'app.routes',
        'app.trips',
        'app.startpoints',
        'app.endpoints',
        'app.tripstatuses',
        'app.vehiclecategories',
        'app.triptypes',
        'app.endlocs',
        'app.passengergroups',
        'app.passengers',
        'app.passengergroups_passengers',
        'app.default_drivers',
        'app.vehicles_drivers',
        'app.contractors',
        'app.shifts',
        'app.rfids',
        'app.drivergroups',
        'app.defaultdrivers',
        'app.drivers_drivergroups',
        'app.languages',
        'app.drivers_languages',
        'app.default_vehs',
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
        'app.assets',
        'app.gpsdata',
        'app.eventtypes',
        'app.people',
        'app.tracking',
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
        'app.renewalreminders',
        'app.renewalstypes',
        'app.worklorderlineitems',
        'app.devicemodels',
        'app.simcards',
        'app.simproviders',
        'app.distancetypes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Sensormappings') ? [] : ['className' => 'App\Model\Table\SensormappingsTable'];        $this->Sensormappings = TableRegistry::get('Sensormappings', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sensormappings);

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
