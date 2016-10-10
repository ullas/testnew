<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CreateconfigsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CreateconfigsTable Test Case
 */
class CreateconfigsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CreateconfigsTable
     */
    public $Createconfigs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.createconfigs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Createconfigs') ? [] : ['className' => 'App\Model\Table\CreateconfigsTable'];
        $this->Createconfigs = TableRegistry::get('Createconfigs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Createconfigs);

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
