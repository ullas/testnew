<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EventtypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EventtypesTable Test Case
 */
class EventtypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EventtypesTable
     */
    public $Eventtypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.eventtypes',
        'app.gpsdata',
        'app.trackingobjects',
        'app.assettypes',
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
        'app.stations',
        'app.departments',
        'app.purposes',
        'app.fuelentries',
        'app.vendors',
        'app.vehiclepurchases',
        'app.currencies',
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
        'app.vehiclespecifications',
        'app.vehiclewheelstyres',
        'app.workorders',
        'app.workorderstatuses',
        'app.issuedbies',
        'app.assignedbies',
        'app.assigntos',
        'app.worklorderlineitems',
        'app.workorderdocuments',
        'app.contractors',
        'app.rfids',
        'app.passengers',
        'app.drivergroups',
        'app.defaultdrivers',
        'app.drivers_drivergroups',
        'app.devices',
        'app.providers',
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
        'app.passengergroups',
        'app.passengergroups_passengers',
        'app.tripstatuses',
        'app.vehiclecategories',
        'app.default_drivers',
        'app.default_vehs',
        'app.templates',
        'app.templatetypes',
        'app.alertcategories',
        'app.zonetypes',
        'app.inspections',
        'app.inspectionfoms',
        'app.manufacturers',
        'app.parts',
        'app.partcategories',
        'app.measurementunits',
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
        $config = TableRegistry::exists('Eventtypes') ? [] : ['className' => 'App\Model\Table\EventtypesTable'];
        $this->Eventtypes = TableRegistry::get('Eventtypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Eventtypes);

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
}
