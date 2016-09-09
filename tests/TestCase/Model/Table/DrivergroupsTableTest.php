<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DrivergroupsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DrivergroupsTable Test Case
 */
class DrivergroupsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DrivergroupsTable
     */
    public $Drivergroups;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.drivergroups',
        'app.defaultdrivers',
        'app.addresses',
        'app.customers',
        'app.departments',
        'app.vehicles',
        'app.vehicleengines',
        'app.vehicletypes',
        'app.drivers',
        'app.ibuttons',
        'app.rfids',
        'app.passengers',
        'app.ibottons',
        'app.trackingobjects',
        'app.assettypes',
        'app.gpsdata',
        'app.ownerships',
        'app.symbols',
        'app.stations',
        'app.purposes',
        'app.fuelentries',
        'app.vendors',
        'app.vehiclepurchases',
        'app.currencies',
        'app.fueldouments',
        'app.fuelphotos',
        'app.vehiclefluids',
        'app.vehiclespecifications',
        'app.vehiclewheelstyres',
        'app.distributionlists',
        'app.distributionlists_addresses',
        'app.drivers_drivergroups'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Drivergroups') ? [] : ['className' => 'App\Model\Table\DrivergroupsTable'];
        $this->Drivergroups = TableRegistry::get('Drivergroups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Drivergroups);

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
