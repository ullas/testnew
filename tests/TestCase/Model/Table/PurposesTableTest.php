<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PurposesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PurposesTable Test Case
 */
class PurposesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PurposesTable
     */
    public $Purposes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.purposes',
        'app.customers',
        'app.vehicles',
        'app.vehicletypes',
        'app.drivers',
        'app.contacts',
        'app.ibuttons',
        'app.rfids',
        'app.ownerships',
        'app.symbols',
        'app.stations',
        'app.departments',
        'app.trackingobjects',
        'app.assettypes',
        'app.gpsdata',
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
        $config = TableRegistry::exists('Purposes') ? [] : ['className' => 'App\Model\Table\PurposesTable'];
        $this->Purposes = TableRegistry::get('Purposes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Purposes);

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
