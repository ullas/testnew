<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TemplatetypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TemplatetypesTable Test Case
 */
class TemplatetypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TemplatetypesTable
     */
    public $Templatetypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.templatetypes',
        'app.customers',
        'app.departments',
        'app.vehicles',
        'app.vehicletypes',
        'app.drivers',
        'app.contacts',
        'app.ibuttons',
        'app.rfids',
        'app.passengers',
        'app.ownerships',
        'app.symbols',
        'app.stations',
        'app.purposes',
        'app.fuelentries',
        'app.vehicleengines',
        'app.vehiclefluids',
        'app.vehiclepurchases',
        'app.vendors',
        'app.currencies',
        'app.vehiclespecifications',
        'app.vehiclewheelstyres',
        'app.gpsdata',
        'app.trackingobjects',
        'app.assettypes',
        'app.templates',
        'app.alertcategories',
        'app.jobs',
        'app.timepolicies',
        'app.schedules',
        'app.startlocs',
        'app.users',
        'app.vehiclegroups',
        'app.defaultvehicles',
        'app.assetgroups',
        'app.defaultassets',
        'app.peoplegroups',
        'app.defaultpeople',
        'app.subscriptions',
        'app.locations',
        'app.notifications',
        'app.endlocs',
        'app.routes',
        'app.trips',
        'app.startpoints',
        'app.endpoints',
        'app.passengergroups',
        'app.tripstatuses',
        'app.vehiclecategories',
        'app.default_drivers',
        'app.default_vehs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Templatetypes') ? [] : ['className' => 'App\Model\Table\TemplatetypesTable'];
        $this->Templatetypes = TableRegistry::get('Templatetypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Templatetypes);

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
