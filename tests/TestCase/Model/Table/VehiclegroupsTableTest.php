<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VehiclegroupsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VehiclegroupsTable Test Case
 */
class VehiclegroupsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VehiclegroupsTable
     */
    public $Vehiclegroups;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.vehiclegroups',
        'app.defaultvehicles',
        'app.vehicletypes',
        'app.vehicles',
        'app.drivers',
        'app.contacts',
        'app.ibuttons',
        'app.rfids',
        'app.customers',
        'app.departments',
        'app.gpsdata',
        'app.ownerships',
        'app.purposes',
        'app.stations',
        'app.symbols',
        'app.trackingobjects',
        'app.assettypes',
        'app.passengers',
        'app.fuelentries',
        'app.vehicleengines',
        'app.vehiclefluids',
        'app.vehiclepurchases',
        'app.vendors',
        'app.currencies',
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
        $config = TableRegistry::exists('Vehiclegroups') ? [] : ['className' => 'App\Model\Table\VehiclegroupsTable'];
        $this->Vehiclegroups = TableRegistry::get('Vehiclegroups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Vehiclegroups);

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
