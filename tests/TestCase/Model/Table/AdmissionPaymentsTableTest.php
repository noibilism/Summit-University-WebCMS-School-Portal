<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdmissionPaymentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdmissionPaymentsTable Test Case
 */
class AdmissionPaymentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdmissionPaymentsTable
     */
    public $AdmissionPayments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.admission_payments',
        'app.fees',
        'app.school_sessions',
        'app.users',
        'app.roles',
        'app.transactions',
        'app.admissions_applicants'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AdmissionPayments') ? [] : ['className' => 'App\Model\Table\AdmissionPaymentsTable'];
        $this->AdmissionPayments = TableRegistry::get('AdmissionPayments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AdmissionPayments);

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
