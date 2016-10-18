<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApplicantEducationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApplicantEducationsTable Test Case
 */
class ApplicantEducationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ApplicantEducationsTable
     */
    public $ApplicantEducations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.applicant_educations',
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
        $config = TableRegistry::exists('ApplicantEducations') ? [] : ['className' => 'App\Model\Table\ApplicantEducationsTable'];
        $this->ApplicantEducations = TableRegistry::get('ApplicantEducations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ApplicantEducations);

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
