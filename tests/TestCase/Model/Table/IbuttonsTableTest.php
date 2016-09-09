<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IbuttonsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IbuttonsTable Test Case
 */
class IbuttonsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\IbuttonsTable
     */
    public $Ibuttons;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ibuttons',
        'app.customers',
        'app.departments',
        'app.vehicles',
        'app.vehicleengines',
        'app.vehicletypes',
        'app.drivers',
        'app.addresses',
        'app.distributionlists',
        'app.distributionlists_addresses',
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
        $config = TableRegistry::exists('Ibuttons') ? [] : ['className' => 'App\Model\Table\IbuttonsTable'];
        $this->Ibuttons = TableRegistry::get('Ibuttons', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ibuttons);

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
