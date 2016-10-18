<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CoursewaresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CoursewaresTable Test Case
 */
class CoursewaresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CoursewaresTable
     */
    public $Coursewares;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.coursewares',
        'app.departments',
        'app.contents',
        'app.content_categories',
        'app.users',
        'app.roles',
        'app.faculty',
        'app.admissions_applicants',
        'app.school_sessions',
        'app.staff_profiles',
        'app.faculties',
        'app.students_academics',
        'app.publications',
        'app.units',
        'app.results'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Coursewares') ? [] : ['className' => 'App\Model\Table\CoursewaresTable'];
        $this->Coursewares = TableRegistry::get('Coursewares', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Coursewares);

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
