<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IssuesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IssuesTable Test Case
 */
class IssuesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\IssuesTable
     */
    public $Issues;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.issues',
        'app.vehicles',
        'app.vehicletypes',
        'app.drivers',
        'app.addresses',
        'app.customers',
        'app.departments',
        'app.gpsdata',
        'app.ownerships',
        'app.purposes',
        'app.stations',
        'app.symbols',
        'app.trackingobjects',
        'app.assettypes',
        'app.ibuttons',
        'app.rfids',
        'app.passengers',
        'app.ibottons',
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
        'app.reportedbies',
        'app.assignedtos',
        'app.issuedocuments'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Issues') ? [] : ['className' => 'App\Model\Table\IssuesTable'];
        $this->Issues = TableRegistry::get('Issues', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Issues);

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
