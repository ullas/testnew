<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ServiceremindersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ServiceremindersTable Test Case
 */
class ServiceremindersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ServiceremindersTable
     */
    public $Servicereminders;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.servicereminders',
        'app.servicetasks',
        'app.distributionlists',
        'app.customers',
        'app.departments',
        'app.vehicles',
        'app.vehicletypes',
        'app.vehiclestatuses',
        'app.drivers',
        'app.addresses',
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
        'app.workorderdocuments',
        'app.groups',
        'app.trackingobjects_groups'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Servicereminders') ? [] : ['className' => 'App\Model\Table\ServiceremindersTable'];
        $this->Servicereminders = TableRegistry::get('Servicereminders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Servicereminders);

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
