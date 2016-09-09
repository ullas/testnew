<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DistributionlistsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DistributionlistsTable Test Case
 */
class DistributionlistsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DistributionlistsTable
     */
    public $Distributionlists;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.distributionlists',
        'app.customers',
        'app.departments',
        'app.vehicles',
        'app.vehicleengines',
        'app.vehicletypes',
        'app.drivers',
        'app.addresses',
        'app.distributionlists_addresses',
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
        $config = TableRegistry::exists('Distributionlists') ? [] : ['className' => 'App\Model\Table\DistributionlistsTable'];
        $this->Distributionlists = TableRegistry::get('Distributionlists', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Distributionlists);

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
