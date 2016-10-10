<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ServicesentriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ServicesentriesTable Test Case
 */
class ServicesentriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ServicesentriesTable
     */
    public $Servicesentries;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.servicesentries',
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
        'app.vehiclepurchases',
        'app.vendors',
        'app.currencies',
        'app.activedrivers',
        'app.fuelentries',
        'app.fueldouments',
        'app.fuelphotos',
        'app.issues',
        'app.reportedby',
        'app.distributionlists',
        'app.distributionlists_addresses',
        'app.assignedtos',
        'app.issuedocuments',
        'app.vehicleengines',
        'app.vehiclefluids',
        'app.vehiclepermits',
        'app.vehiclespecifications',
        'app.vehiclewheelstyres',
        'app.workorders',
        'app.workorderstatuses',
        'app.issuedbies',
        'app.assignedbies',
        'app.assigntos',
        'app.worklorderlineitems',
        'app.workorderdocuments',
        'app.templates',
        'app.templatetypes',
        'app.alertcategories',
        'app.zonetypes',
        'app.gpsdata',
        'app.devices',
        'app.providers',
        'app.eventtypes',
        'app.people',
        'app.tracking',
        'app.inspections',
        'app.inspectionfoms',
        'app.manufacturers',
        'app.parts',
        'app.partcategories',
        'app.measurementunits',
        'app.passengergroups',
        'app.passengergroups_passengers',
        'app.renewalreminders',
        'app.renewalstypes',
        'app.servicereminders',
        'app.servicetasks',
        'app.servicecompleted',
        'app.servicedocuments'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Servicesentries') ? [] : ['className' => 'App\Model\Table\ServicesentriesTable'];
        $this->Servicesentries = TableRegistry::get('Servicesentries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Servicesentries);

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
