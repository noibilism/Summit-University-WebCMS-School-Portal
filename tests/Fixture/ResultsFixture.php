<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ResultsFixture
 *
 */
class ResultsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'student_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'semester' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '1=>FirstSemester, 2=>SecondSemester', 'precision' => null, 'autoIncrement' => null],
        'level' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'dept_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'course_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'course_code' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'score' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'grade' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'units_obtainable' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'unit_obtained' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'session_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'added_by' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'updated' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_result_dept_idx' => ['type' => 'index', 'columns' => ['dept_id'], 'length' => []],
            'fk_result_course_idx' => ['type' => 'index', 'columns' => ['course_id'], 'length' => []],
            'fk_result_session_idx' => ['type' => 'index', 'columns' => ['session_id'], 'length' => []],
            'fk_result_student_idx' => ['type' => 'index', 'columns' => ['student_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_result_dept' => ['type' => 'foreign', 'columns' => ['dept_id'], 'references' => ['departments', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_result_course' => ['type' => 'foreign', 'columns' => ['course_id'], 'references' => ['courses', 'is'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_result_session' => ['type' => 'foreign', 'columns' => ['session_id'], 'references' => ['school_sessions', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_result_student' => ['type' => 'foreign', 'columns' => ['student_id'], 'references' => ['students', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'student_id' => 1,
            'semester' => 1,
            'level' => 'Lorem ipsum dolor sit amet',
            'dept_id' => 1,
            'course_id' => 1,
            'course_code' => 'Lorem ipsum dolor sit amet',
            'score' => 'Lorem ipsum dolor sit amet',
            'grade' => 'Lorem ipsum dolor sit amet',
            'units_obtainable' => 'Lorem ipsum dolor sit amet',
            'unit_obtained' => 'Lorem ipsum dolor sit amet',
            'session_id' => 1,
            'added_by' => 'Lorem ipsum dolor sit amet',
            'created' => 1476312196,
            'updated' => 1476312196
        ],
    ];
}
