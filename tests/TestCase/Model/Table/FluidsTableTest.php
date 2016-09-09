<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FluidsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FluidsTable Test Case
 */
class FluidsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FluidsTable
     */
    public $Fluids;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.fluids',
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
        $config = TableRegistry::exists('Fluids') ? [] : ['className' => 'App\Model\Table\FluidsTable'];
        $this->Fluids = TableRegistry::get('Fluids', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Fluids);

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
