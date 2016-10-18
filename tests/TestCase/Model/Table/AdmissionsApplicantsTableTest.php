<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdmissionsApplicantsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdmissionsApplicantsTable Test Case
 */
class AdmissionsApplicantsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdmissionsApplicantsTable
     */
    public $AdmissionsApplicants;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.admissions_applicants',
        'app.school_sessions',
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
        $config = TableRegistry::exists('AdmissionsApplicants') ? [] : ['className' => 'App\Model\Table\AdmissionsApplicantsTable'];
        $this->AdmissionsApplicants = TableRegistry::get('AdmissionsApplicants', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AdmissionsApplicants);

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
