<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TrackingobjectsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TrackingobjectsTable Test Case
 */
class TrackingobjectsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TrackingobjectsTable
     */
    public $Trackingobjects;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.trackingobjects',
        'app.assettypes',
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
        $config = TableRegistry::exists('Trackingobjects') ? [] : ['className' => 'App\Model\Table\TrackingobjectsTable'];
        $this->Trackingobjects = TableRegistry::get('Trackingobjects', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Trackingobjects);

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
