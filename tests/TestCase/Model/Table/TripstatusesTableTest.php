<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TripstatusesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TripstatusesTable Test Case
 */
class TripstatusesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TripstatusesTable
     */
    public $Tripstatuses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tripstatuses',
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
        'app.passengergroup',
        'app.vehiclecats'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Tripstatuses') ? [] : ['className' => 'App\Model\Table\TripstatusesTable'];
        $this->Tripstatuses = TableRegistry::get('Tripstatuses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tripstatuses);

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
