<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FacultiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FacultiesTable Test Case
 */
class FacultiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FacultiesTable
     */
    public $Faculties;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.faculties',
        'app.contents',
        'app.users',
        'app.roles',
        'app.content_categories',
        'app.galleries',
        'app.content_documents',
        'app.coursewares',
        'app.departments',
        'app.staff_profiles',
        'app.units',
        'app.publications',
        'app.students_academics',
        'app.students',
        'app.results',
        'app.courses',
        'app.school_sessions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Faculties') ? [] : ['className' => 'App\Model\Table\FacultiesTable'];
        $this->Faculties = TableRegistry::get('Faculties', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Faculties);

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
