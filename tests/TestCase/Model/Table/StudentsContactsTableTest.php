<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StudentsContactsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StudentsContactsTable Test Case
 */
class StudentsContactsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StudentsContactsTable
     */
    public $StudentsContacts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.students_contacts',
        'app.students',
        'app.users',
        'app.roles',
        'app.results',
        'app.departments',
        'app.contents',
        'app.content_categories',
        'app.faculty',
        'app.admissions_applicants',
        'app.school_sessions',
        'app.staff_profiles',
        'app.faculties',
        'app.students_academics',
        'app.publications',
        'app.units',
        'app.coursewares',
        'app.courses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('StudentsContacts') ? [] : ['className' => 'App\Model\Table\StudentsContactsTable'];
        $this->StudentsContacts = TableRegistry::get('StudentsContacts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StudentsContacts);

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
