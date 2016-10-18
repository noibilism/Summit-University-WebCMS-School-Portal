<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApplicantContactsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApplicantContactsTable Test Case
 */
class ApplicantContactsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ApplicantContactsTable
     */
    public $ApplicantContacts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.applicant_contacts',
        'app.admission_applications'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ApplicantContacts') ? [] : ['className' => 'App\Model\Table\ApplicantContactsTable'];
        $this->ApplicantContacts = TableRegistry::get('ApplicantContacts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ApplicantContacts);

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
