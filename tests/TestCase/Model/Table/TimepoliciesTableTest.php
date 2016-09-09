<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TimepoliciesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TimepoliciesTable Test Case
 */
class TimepoliciesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TimepoliciesTable
     */
    public $Timepolicies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.timepolicies',
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
        'app.schedules',
        'app.startlocs',
        'app.users',
        'app.groups',
        'app.endlocs',
        'app.routes',
        'app.fleets',
        'app.default_drivers',
        'app.default_vehs',
        'app.trips',
        'app.startpoints',
        'app.endpoints',
        'app.passengergroup',
        'app.tripstatuses',
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
        $config = TableRegistry::exists('Timepolicies') ? [] : ['className' => 'App\Model\Table\TimepoliciesTable'];
        $this->Timepolicies = TableRegistry::get('Timepolicies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Timepolicies);

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
