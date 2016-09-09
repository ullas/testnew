<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OwnershipsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OwnershipsTable Test Case
 */
class OwnershipsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OwnershipsTable
     */
    public $Ownerships;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ownerships',
        'app.customers',
        'app.vehicles',
        'app.vehicletypes',
        'app.drivers',
        'app.contacts',
        'app.ibuttons',
        'app.rfids',
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
        $config = TableRegistry::exists('Ownerships') ? [] : ['className' => 'App\Model\Table\OwnershipsTable'];
        $this->Ownerships = TableRegistry::get('Ownerships', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ownerships);

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
