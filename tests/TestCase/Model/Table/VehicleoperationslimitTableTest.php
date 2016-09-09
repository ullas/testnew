<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VehicleoperationslimitTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VehicleoperationslimitTable Test Case
 */
class VehicleoperationslimitTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VehicleoperationslimitTable
     */
    public $Vehicleoperationslimit;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.vehicleoperationslimit',
        'app.vehices',
        'app.i_buttons',
        'app.customers',
        'app.departments',
        'app.vehicles',
        'app.vehicletypes',
        'app.vehiclestatuses',
        'app.drivers',
        'app.addresses',
        'app.distributionlists',
        'app.distributionlists_addresses',
        'app.ibuttons',
        'app.rfids',
        'app.passengers',
        'app.ibottons',
        'app.ownerships',
        'app.symbols',
        'app.stations',
        'app.trackingobjects',
        'app.assettypes',
        'app.gpsdata',
        'app.purposes',
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
        'app.vehicleengines',
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
        $config = TableRegistry::exists('Vehicleoperationslimit') ? [] : ['className' => 'App\Model\Table\VehicleoperationslimitTable'];
        $this->Vehicleoperationslimit = TableRegistry::get('Vehicleoperationslimit', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Vehicleoperationslimit);

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
