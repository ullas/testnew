<?php
namespace App\Test\TestCase\Controller;

use App\Controller\JobsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\JobsController Test Case
 */
class JobsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.jobs',
        'app.trackingobjects',
        'app.assettypes',
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
        'app.default_vehs',
        'app.templates'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
