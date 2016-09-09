<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AssettypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AssettypesTable Test Case
 */
class AssettypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AssettypesTable
     */
    public $Assettypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.assettypes',
        'app.trackingobjects',
        'app.customers',
        'app.gpsdata',
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
        $config = TableRegistry::exists('Assettypes') ? [] : ['className' => 'App\Model\Table\AssettypesTable'];
        $this->Assettypes = TableRegistry::get('Assettypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Assettypes);

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
