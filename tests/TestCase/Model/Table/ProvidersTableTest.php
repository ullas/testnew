<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProvidersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProvidersTable Test Case
 */
class ProvidersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProvidersTable
     */
    public $Providers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.providers',
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
        'app.devices'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Providers') ? [] : ['className' => 'App\Model\Table\ProvidersTable'];
        $this->Providers = TableRegistry::get('Providers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Providers);

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
