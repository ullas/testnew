<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ServicesentriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ServicesentriesTable Test Case
 */
class ServicesentriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ServicesentriesTable
     */
    public $Servicesentries;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.servicesentries',
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
        'app.servicecompleted',
        'app.servicedocuments'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Servicesentries') ? [] : ['className' => 'App\Model\Table\ServicesentriesTable'];
        $this->Servicesentries = TableRegistry::get('Servicesentries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Servicesentries);

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
