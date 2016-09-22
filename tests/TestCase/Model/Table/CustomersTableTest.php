<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CustomersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CustomersTable Test Case
 */
class CustomersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CustomersTable
     */
    public $Customers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'app.trackingobjects',
        'app.assettypes',
        'app.gpsdata',
        'app.devices',
        'app.providers',
        'app.eventtypes',
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
        $config = TableRegistry::exists('Customers') ? [] : ['className' => 'App\Model\Table\CustomersTable'];
        $this->Customers = TableRegistry::get('Customers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Customers);

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
