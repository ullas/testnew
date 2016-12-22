<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AnalogsensortypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AnalogsensortypesTable Test Case
 */
class AnalogsensortypesTableTest extends TestCase
{

    /**
     * Test subject     *
     * @var \App\Model\Table\AnalogsensortypesTable     */
    public $Analogsensortypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.analogsensortypes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Analogsensortypes') ? [] : ['className' => 'App\Model\Table\AnalogsensortypesTable'];        $this->Analogsensortypes = TableRegistry::get('Analogsensortypes', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Analogsensortypes);

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
