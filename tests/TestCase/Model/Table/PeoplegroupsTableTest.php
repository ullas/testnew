<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PeoplegroupsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PeoplegroupsTable Test Case
 */
class PeoplegroupsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PeoplegroupsTable
     */
    public $Peoplegroups;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.peoplegroups',
        'app.defaultpeople'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Peoplegroups') ? [] : ['className' => 'App\Model\Table\PeoplegroupsTable'];
        $this->Peoplegroups = TableRegistry::get('Peoplegroups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Peoplegroups);

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
