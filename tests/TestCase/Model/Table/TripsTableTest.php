<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TripsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TripsTable Test Case
 */
class TripsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TripsTable
     */
    public $Trips;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.trips',
        'app.customers',
        'app.departments',
        'app.vehicles',
        'app.vehicletypes',
        'app.drivers',
        'app.contacts',
        'app.ibuttons',
        'app.rfids',
        'app.ownerships',
        'app.symbols',
        'app.stations',
        'app.purposes',
        'app.fuelentries',
        'app.vehicleengines',
        'app.vehiclefluids',
        'app.vehiclepurchases',
        'app.vendors',
        'app.currencies',
        'app.vehiclespecifications',
        'app.vehiclewheelstyres',
        'app.gpsdata',
        'app.trackingobjects',
        'app.assettypes',
        'app.timepolicies',
        'app.schedules',
        'app.startlocs',
        'app.users',
        'app.groups',
        'app.endlocs',
        'app.routes',
        'app.fleets',
        'app.default_drivers',
        'app.default_vehs',
        'app.startpoints',
        'app.endpoints',
        'app.paxgroups',
        'app.tripstatuses',
        'app.vehiclecategories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Trips') ? [] : ['className' => 'App\Model\Table\TripsTable'];
        $this->Trips = TableRegistry::get('Trips', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Trips);

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
