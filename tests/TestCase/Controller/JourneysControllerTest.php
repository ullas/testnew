<?php
namespace App\Test\TestCase\Controller;

use App\Controller\JourneysController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\JourneysController Test Case
 */
class JourneysControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.journeys',
        'app.trackingobjects',
        'app.assettypes',
        'app.customers',
        'app.customertypes',
        'app.addresses',
        'app.drivers',
        'app.ibuttons',
        'app.vehicles',
        'app.vehicletypes',
        'app.vehiclestatuses',
        'app.ownerships',
        'app.symbols',
        'app.driverdetectionmodes',
        'app.stations',
        'app.departments',
        'app.purposes',
        'app.currencies',
        'app.vehiclepurchases',
        'app.vendors',
        'app.fuelentries',
        'app.fueldouments',
        'app.fuelphotos',
        'app.servicesentries',
        'app.servicecompleted',
        'app.servicedocuments',
        'app.vehicleleases',
        'app.workorders',
        'app.workorderstatuses',
        'app.issuedbies',
        'app.distributionlists',
        'app.distributionlists_addresses',
        'app.assignedbies',
        'app.assigntos',
        'app.issues',
        'app.reportedbies',
        'app.issuestatuses',
        'app.issuedocuments',
        'app.workorderlineitems',
        'app.servicetasks',
        'app.servicereminders',
        'app.groups',
        'app.fences',
        'app.users',
        'app.locations',
        'app.jobs',
        'app.timepolicies',
        'app.schedules',
        'app.startlocs',
        'app.subscriptions',
        'app.notifications',
        'app.endlocs',
        'app.routes',
        'app.trips',
        'app.startpoints',
        'app.endpoints',
        'app.tripstatuses',
        'app.vehiclecategories',
        'app.triptypes',
        'app.locations_trips',
        'app.default_drivers',
        'app.vehicles_drivers',
        'app.contractors',
        'app.shifts',
        'app.alerts',
        'app.alertcategories',
        'app.providers',
        'app.devices',
        'app.devicemodels',
        'app.simcards',
        'app.simproviders',
        'app.distancetypes',
        'app.sensormappings',
        'app.gpsdata',
        'app.eventtypes',
        'app.tracking',
        'app.templates',
        'app.templatetypes',
        'app.rfids',
        'app.passengers',
        'app.drivergroups',
        'app.defaultdrivers',
        'app.drivers_drivergroups',
        'app.languages',
        'app.drivers_languages',
        'app.default_vehs',
        'app.transporters',
        'app.activedrivers',
        'app.inspections',
        'app.inspectionforms',
        'app.inspectionstatuses',
        'app.vehicleengines',
        'app.vehiclefluids',
        'app.vehiclepermits',
        'app.vehiclespecifications',
        'app.vehiclewheelstyres',
        'app.locations_schedules',
        'app.drivers_schedules',
        'app.passengergroups',
        'app.passengergroups_passengers',
        'app.zonetypes',
        'app.renewalreminders',
        'app.renewalstypes',
        'app.trackingobjects_groups',
        'app.workordertypes',
        'app.workorderlabourlineitems',
        'app.issues_addresses',
        'app.workorderdocuments',
        'app.workorderpartslineitems',
        'app.parts',
        'app.partcategories',
        'app.measurementunits',
        'app.manufacturers',
        'app.worklorderlineitems',
        'app.assets',
        'app.people'
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
