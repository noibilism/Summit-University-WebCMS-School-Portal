<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StudentsAcademicsFixture
 *
 */
class StudentsAcademicsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'student_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'level' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'faculty_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'department_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'matric_no' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'updated' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'fk_studentacada_matric_idx' => ['type' => 'index', 'columns' => ['matric_no'], 'length' => []],
            'fk_studentacada_faculty_idx' => ['type' => 'index', 'columns' => ['faculty_id'], 'length' => []],
            'fk_studentacada_dep_idx' => ['type' => 'index', 'columns' => ['department_id'], 'length' => []],
            'fk_studentacada_stdid_idx' => ['type' => 'index', 'columns' => ['student_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_studentacada_matric' => ['type' => 'foreign', 'columns' => ['matric_no'], 'references' => ['students', 'matric_no'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_studentacada_faculty' => ['type' => 'foreign', 'columns' => ['faculty_id'], 'references' => ['faculties', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_studentacada_dep' => ['type' => 'foreign', 'columns' => ['department_id'], 'references' => ['departments', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_studentacada_stdid' => ['type' => 'foreign', 'columns' => ['student_id'], 'references' => ['students', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'level' => 'Lorem ipsum dolor sit amet',
            'faculty_id' => 1,
            'department_id' => 1,
            'matric_no' => 'Lorem ipsum dolor sit amet',
            'created' => 'Lorem ipsum dolor sit amet',
            'updated' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
