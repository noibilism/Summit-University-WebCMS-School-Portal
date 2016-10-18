<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContentCategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContentCategoriesTable Test Case
 */
class ContentCategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ContentCategoriesTable
     */
    public $ContentCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.content_categories',
        'app.contents',
        'app.users',
        'app.roles',
        'app.galleries',
        'app.content_documents',
        'app.coursewares',
        'app.departments',
        'app.faculty',
        'app.admissions_applicants',
        'app.school_sessions',
        'app.staff_profiles',
        'app.faculties',
        'app.students_academics',
        'app.students',
        'app.results',
        'app.courses',
        'app.publications',
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
        $config = TableRegistry::exists('ContentCategories') ? [] : ['className' => 'App\Model\Table\ContentCategoriesTable'];
        $this->ContentCategories = TableRegistry::get('ContentCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ContentCategories);

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
