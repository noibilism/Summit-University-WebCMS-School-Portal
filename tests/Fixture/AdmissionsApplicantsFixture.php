<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AdmissionsApplicantsFixture
 *
 */
class AdmissionsApplicantsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'application_number' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'sch_session_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'first_name' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'middle_name' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'last_name' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'first_choice' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'second_choice' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'sex' => ['type' => 'string', 'length' => 15, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'dob' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'state_of_origin' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'lga' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'town' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'updated' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_admission_session_idx' => ['type' => 'index', 'columns' => ['sch_session_id'], 'length' => []],
            'fk_admission_fst_choice_idx' => ['type' => 'index', 'columns' => ['first_choice'], 'length' => []],
            'fk_admisison_scd_choice_idx' => ['type' => 'index', 'columns' => ['second_choice'], 'length' => []],
            'fk_admission_state_of_origin_idx' => ['type' => 'index', 'columns' => ['state_of_origin'], 'length' => []],
            'fk_admission_lga_idx' => ['type' => 'index', 'columns' => ['lga'], 'length' => []],
            'fk_admission_town_idx' => ['type' => 'index', 'columns' => ['town'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'application_number_UNIQUE' => ['type' => 'unique', 'columns' => ['application_number'], 'length' => []],
            'fk_admisison_scd_choice' => ['type' => 'foreign', 'columns' => ['second_choice'], 'references' => ['departments', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_admission_fst_choice' => ['type' => 'foreign', 'columns' => ['first_choice'], 'references' => ['departments', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_admission_lga' => ['type' => 'foreign', 'columns' => ['lga'], 'references' => ['lgas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_admission_session' => ['type' => 'foreign', 'columns' => ['sch_session_id'], 'references' => ['school_sessions', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_admission_state_of_origin' => ['type' => 'foreign', 'columns' => ['state_of_origin'], 'references' => ['states', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_admission_town' => ['type' => 'foreign', 'columns' => ['town'], 'references' => ['cities', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'application_number' => 'Lorem ipsum dolor sit amet',
            'sch_session_id' => 1,
            'first_name' => 'Lorem ipsum dolor sit amet',
            'middle_name' => 'Lorem ipsum dolor sit amet',
            'last_name' => 'Lorem ipsum dolor sit amet',
            'first_choice' => 1,
            'second_choice' => 1,
            'sex' => 'Lorem ipsum d',
            'dob' => '2016-10-13',
            'state_of_origin' => 1,
            'lga' => 1,
            'town' => 1,
            'created' => 1476310834,
            'updated' => 1476310834
        ],
    ];
}
