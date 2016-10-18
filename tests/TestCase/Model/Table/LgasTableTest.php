<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LgasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LgasTable Test Case
 */
class LgasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LgasTable
     */
    public $Lgas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.lgas',
        'app.states',
        'app.countries',
        'app.cities'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Lgas') ? [] : ['className' => 'App\Model\Table\LgasTable'];
        $this->Lgas = TableRegistry::get('Lgas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Lgas);

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
