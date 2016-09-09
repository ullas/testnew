<?php
namespace App\Test\TestCase\Controller;

use App\Controller\VehicletypesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\VehicletypesController Test Case
 */
class VehicletypesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.vehicletypes',
        'app.vehicles',
        'app.drivers',
        'app.contacts',
        'app.ibuttons',
        'app.rfids',
        'app.customers',
        'app.ownerships',
        'app.symbols',
        'app.stations',
        'app.departments',
        'app.trackingobjects',
        'app.purposes',
        'app.fluids',
        'app.fuelentries',
        'app.vehicleengines',
        'app.vehiclespecifications',
        'app.vehiclewheelstyres'
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
