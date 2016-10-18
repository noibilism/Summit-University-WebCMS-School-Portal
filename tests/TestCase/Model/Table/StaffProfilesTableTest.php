<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StaffProfilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StaffProfilesTable Test Case
 */
class StaffProfilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StaffProfilesTable
     */
    public $StaffProfiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'app.publications',
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
        $config = TableRegistry::exists('StaffProfiles') ? [] : ['className' => 'App\Model\Table\StaffProfilesTable'];
        $this->StaffProfiles = TableRegistry::get('StaffProfiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StaffProfiles);

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
