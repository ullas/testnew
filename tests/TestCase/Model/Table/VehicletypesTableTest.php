<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VehicletypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VehicletypesTable Test Case
 */
class VehicletypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VehicletypesTable
     */
    public $Vehicletypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.vehicletypes',
        'app.vehicles',
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
        $config = TableRegistry::exists('Vehicletypes') ? [] : ['className' => 'App\Model\Table\VehicletypesTable'];
        $this->Vehicletypes = TableRegistry::get('Vehicletypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Vehicletypes);

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
