<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ManufacturersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ManufacturersTable Test Case
 */
class ManufacturersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ManufacturersTable
     */
    public $Manufacturers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.manufacturers',
        'app.customers',
        'app.departments',
        'app.vehicles',
        'app.vehicletypes',
        'app.drivers',
        'app.addresses',
        'app.ibuttons',
        'app.rfids',
        'app.passengers',
        'app.ibottons',
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
        'app.vehicleengines',
        'app.vehiclefluids',
        'app.vehiclespecifications',
        'app.vehiclewheelstyres',
        'app.gpsdata',
        'app.trackingobjects',
        'app.assettypes',
        'app.parts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Manufacturers') ? [] : ['className' => 'App\Model\Table\ManufacturersTable'];
        $this->Manufacturers = TableRegistry::get('Manufacturers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Manufacturers);

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
