<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VehiclepurchasesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VehiclepurchasesTable Test Case
 */
class VehiclepurchasesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VehiclepurchasesTable
     */
    public $Vehiclepurchases;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.vehiclepurchases',
        'app.vendors',
        'app.currencies',
        'app.vehicles',
        'app.vehicletypes',
        'app.drivers',
        'app.contacts',
        'app.ibuttons',
        'app.rfids',
        'app.customers',
        'app.ownerships',
        'app.symbols',
        'app.stations',
        'app.departments',
        'app.trackingobjects',
        'app.assettypes',
        'app.gpsdata',
        'app.purposes',
        'app.fluids',
        'app.fuelentries',
        'app.vehicleengines',
        'app.vehiclespecifications',
        'app.vehiclewheelstyres'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Vehiclepurchases') ? [] : ['className' => 'App\Model\Table\VehiclepurchasesTable'];
        $this->Vehiclepurchases = TableRegistry::get('Vehiclepurchases', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Vehiclepurchases);

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
