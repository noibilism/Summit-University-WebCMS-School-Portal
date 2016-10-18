<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PublicationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PublicationsTable Test Case
 */
class PublicationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PublicationsTable
     */
    public $Publications;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.publications',
        'app.staff_profiles',
        'app.users',
        'app.roles',
        'app.faculties',
        'app.contents',
        'app.content_categories',
        'app.students_academics',
        'app.departments',
        'app.faculty',
        'app.admissions_applicants',
        'app.school_sessions',
        'app.coursewares',
        'app.results',
        'app.units'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Publications') ? [] : ['className' => 'App\Model\Table\PublicationsTable'];
        $this->Publications = TableRegistry::get('Publications', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Publications);

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
