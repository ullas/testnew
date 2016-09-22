<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GpsdataTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GpsdataTable Test Case
 */
class GpsdataTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GpsdataTable
     */
    public $Gpsdata;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.gpsdata',
        'app.trackingobjects',
        'app.assettypes',
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
        'app.contractors',
        'app.stations',
        'app.rfids',
        'app.passengers',
        'app.drivergroups',
        'app.defaultdrivers',
        'app.drivers_drivergroups',
        'app.ownerships',
        'app.symbols',
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
        'app.workorderdocuments',
        'app.devices',
        'app.providers',
        'app.eventtypes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Gpsdata') ? [] : ['className' => 'App\Model\Table\GpsdataTable'];
        $this->Gpsdata = TableRegistry::get('Gpsdata', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Gpsdata);

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
