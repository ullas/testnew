<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VehicleenginesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VehicleenginesTable Test Case
 */
class VehicleenginesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VehicleenginesTable
     */
    public $Vehicleengines;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.vehicleengines',
        'app.vehicles',
        'app.vehicletypes',
        'app.vehiclestatuses',
        'app.customers',
        'app.departments',
        'app.drivers',
        'app.addresses',
        'app.distributionlists',
        'app.distributionlists_addresses',
        'app.ibuttons',
        'app.rfids',
        'app.passengers',
        'app.ibottons',
        'app.gpsdata',
        'app.ownerships',
        'app.purposes',
        'app.stations',
        'app.symbols',
        'app.trackingobjects',
        'app.assettypes',
        'app.fuelentries',
        'app.vendors',
        'app.vehiclepurchases',
        'app.currencies',
        'app.fueldouments',
        'app.fuelphotos',
        'app.issues',
        'app.reportedby',
        'app.assignedtos',
        'app.issuedocuments',
        'app.servicesentries',
        'app.servicecompleted',
        'app.servicedocuments',
        'app.vehiclefluids',
        'app.vehiclespecifications',
        'app.vehiclewheelstyres',
        'app.workorders',
        'app.workorderstatuses',
        'app.issuedbies',
        'app.assignedbies',
        'app.assigntos',
        'app.worklorderlineitems',
        'app.workorderdocuments'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Vehicleengines') ? [] : ['className' => 'App\Model\Table\VehicleenginesTable'];
        $this->Vehicleengines = TableRegistry::get('Vehicleengines', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Vehicleengines);

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
