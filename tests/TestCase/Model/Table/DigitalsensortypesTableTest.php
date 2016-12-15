<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DigitalsensortypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DigitalsensortypesTable Test Case
 */
class DigitalsensortypesTableTest extends TestCase
{

    /**
     * Test subject     *
     * @var \App\Model\Table\DigitalsensortypesTable     */
    public $Digitalsensortypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.digitalsensortypes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Digitalsensortypes') ? [] : ['className' => 'App\Model\Table\DigitalsensortypesTable'];        $this->Digitalsensortypes = TableRegistry::get('Digitalsensortypes', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Digitalsensortypes);

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
