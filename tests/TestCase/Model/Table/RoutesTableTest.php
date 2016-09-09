<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RoutesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RoutesTable Test Case
 */
class RoutesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RoutesTable
     */
    public $Routes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.routes',
        'app.vehicles',
        'app.vehicleengines',
        'app.vehicletypes',
        'app.drivers',
        'app.addresses',
        'app.customers',
        'app.departments',
        'app.gpsdata',
        'app.ownerships',
        'app.purposes',
        'app.stations',
        'app.symbols',
        'app.trackingobjects',
        'app.assettypes',
        'app.distributionlists',
        'app.distributionlists_addresses',
        'app.ibuttons',
        'app.rfids',
        'app.passengers',
        'app.ibottons',
        'app.fuelentries',
        'app.vendors',
        'app.vehiclepurchases',
        'app.currencies',
        'app.fueldouments',
        'app.fuelphotos',
        'app.vehiclefluids',
        'app.vehiclespecifications',
        'app.vehiclewheelstyres',
        'app.assetgroups',
        'app.defaultassets',
        'app.users',
        'app.groups',
        'app.trackingobjects_groups',
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
        'app.default_vehs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Routes') ? [] : ['className' => 'App\Model\Table\RoutesTable'];
        $this->Routes = TableRegistry::get('Routes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Routes);

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
