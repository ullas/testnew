<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TriptypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TriptypesTable Test Case
 */
class TriptypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TriptypesTable
     */
    public $Triptypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.triptypes',
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
        'app.trackingobjects',
        'app.assettypes',
        'app.alerts',
        'app.alertcategories',
        'app.assets',
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
        'app.servicesentries',
        'app.servicecompleted',
        'app.servicedocuments',
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
        'app.servicetasks'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Triptypes') ? [] : ['className' => 'App\Model\Table\TriptypesTable'];
        $this->Triptypes = TableRegistry::get('Triptypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Triptypes);

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
