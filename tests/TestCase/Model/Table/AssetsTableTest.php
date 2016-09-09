<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AssetsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AssetsTable Test Case
 */
class AssetsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AssetsTable
     */
    public $Assets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.assets',
        'app.trackingobjects',
        'app.assettypes',
        'app.customers',
        'app.departments',
        'app.vehicles',
        'app.vehicletypes',
        'app.drivers',
        'app.addresses',
        'app.distributionlists',
        'app.distributionlists_addresses',
        'app.ibuttons',
        'app.rfids',
        'app.passengers',
        'app.ibottons',
        'app.ownerships',
        'app.symbols',
        'app.stations',
        'app.purposes',
        'app.fences',
        'app.users',
        'app.groups',
        'app.trackingobjects_groups',
        'app.zonetypes',
        'app.fuelentries',
        'app.vendors',
        'app.vehiclepurchases',
        'app.currencies',
        'app.fueldouments',
        'app.fuelphotos',
        'app.issues',
        'app.reportedby',
        'app.assignedtos',
        'app.issuedocuments',
        'app.routes',
        'app.schedules',
        'app.startlocs',
        'app.jobs',
        'app.timepolicies',
        'app.trips',
        'app.startpoints',
        'app.subscriptions',
        'app.locations',
        'app.notifications',
        'app.endpoints',
        'app.passengergroups',
        'app.passengergroups_passengers',
        'app.tripstatuses',
        'app.vehiclecategories',
        'app.templates',
        'app.templatetypes',
        'app.alertcategories',
        'app.endlocs',
        'app.default_drivers',
        'app.default_vehs',
        'app.servicesentries',
        'app.servicecompleted',
        'app.servicedocuments',
        'app.vehicleengines',
        'app.vehiclefluids',
        'app.vehiclespecifications',
        'app.vehiclewheelstyres',
        'app.workorders',
        'app.gpsdata'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Assets') ? [] : ['className' => 'App\Model\Table\AssetsTable'];
        $this->Assets = TableRegistry::get('Assets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Assets);

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
