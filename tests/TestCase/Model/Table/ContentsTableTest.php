<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContentsTable Test Case
 */
class ContentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ContentsTable
     */
    public $Contents;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.contents',
        'app.content_categories',
        'app.users',
        'app.roles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Contents') ? [] : ['className' => 'App\Model\Table\ContentsTable'];
        $this->Contents = TableRegistry::get('Contents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Contents);

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

    /**
     * Test validationRegister method
     *
     * @return void
     */
    public function testValidationRegister()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationResetPassword method
     *
     * @return void
     */
    public function testValidationResetPassword()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationActiveAccount method
     *
     * @return void
     */
    public function testValidationActiveAccount()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test createToken method
     *
     * @return void
     */
    public function testCreateToken()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationEditPassword method
     *
     * @return void
     */
    public function testValidationEditPassword()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationEditProfile method
     *
     * @return void
     */
    public function testValidationEditProfile()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test deactive method
     *
     * @return void
     */
    public function testDeactive()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
