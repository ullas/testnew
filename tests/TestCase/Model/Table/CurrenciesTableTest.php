<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CurrenciesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CurrenciesTable Test Case
 */
class CurrenciesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CurrenciesTable
     */
    public $Currencies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.currencies',
        'app.vehiclepurchases',
        'app.vendors',
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
        $config = TableRegistry::exists('Currencies') ? [] : ['className' => 'App\Model\Table\CurrenciesTable'];
        $this->Currencies = TableRegistry::get('Currencies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Currencies);

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
}
