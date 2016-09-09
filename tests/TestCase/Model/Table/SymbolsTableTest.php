<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SymbolsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SymbolsTable Test Case
 */
class SymbolsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SymbolsTable
     */
    public $Symbols;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.symbols',
        'app.customers',
        'app.vehicles',
        'app.vehicletypes',
        'app.drivers',
        'app.contacts',
        'app.ibuttons',
        'app.rfids',
        'app.ownerships',
        'app.stations',
        'app.departments',
        'app.trackingobjects',
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
        $config = TableRegistry::exists('Symbols') ? [] : ['className' => 'App\Model\Table\SymbolsTable'];
        $this->Symbols = TableRegistry::get('Symbols', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Symbols);

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
