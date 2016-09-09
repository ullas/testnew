<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ServicedocumentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ServicedocumentsTable Test Case
 */
class ServicedocumentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ServicedocumentsTable
     */
    public $Servicedocuments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.servicedocuments',
        'app.servicesentries',
        'app.vehicles',
        'app.vehicletypes',
        'app.drivers',
        'app.contacts',
        'app.ibuttons',
        'app.rfids',
        'app.customers',
        'app.departments',
        'app.gpsdata',
        'app.ownerships',
        'app.purposes',
        'app.stations',
        'app.symbols',
        'app.trackingobjects',
        'app.assettypes',
        'app.passengers',
        'app.fuelentries',
        'app.venders',
        'app.fueldouments',
        'app.fuelphotos',
        'app.vehicleengines',
        'app.vehiclefluids',
        'app.vehiclepurchases',
        'app.vendors',
        'app.currencies',
        'app.vehiclespecifications',
        'app.vehiclewheelstyres',
        'app.servicecompleted'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Servicedocuments') ? [] : ['className' => 'App\Model\Table\ServicedocumentsTable'];
        $this->Servicedocuments = TableRegistry::get('Servicedocuments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Servicedocuments);

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
