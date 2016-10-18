<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PublicationsFixture
 *
 */
class PublicationsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'title' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'description' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'publication' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'url' => ['type' => 'string', 'length' => 225, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'staff_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'dept_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'faculty_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '	', 'precision' => null, 'autoIncrement' => null],
        'unit_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'updated' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_pub_staff_idx' => ['type' => 'index', 'columns' => ['staff_id'], 'length' => []],
            'fk_pub_dept_idx' => ['type' => 'index', 'columns' => ['dept_id'], 'length' => []],
            'fk_pub_faculty_idx' => ['type' => 'index', 'columns' => ['faculty_id'], 'length' => []],
            'fk_pub_unit_idx' => ['type' => 'index', 'columns' => ['unit_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_pub_staff' => ['type' => 'foreign', 'columns' => ['staff_id'], 'references' => ['staff_profiles', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_pub_dept' => ['type' => 'foreign', 'columns' => ['dept_id'], 'references' => ['departments', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_pub_faculty' => ['type' => 'foreign', 'columns' => ['faculty_id'], 'references' => ['faculties', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_pub_unit' => ['type' => 'foreign', 'columns' => ['unit_id'], 'references' => ['units', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'title' => 'Lorem ipsum dolor sit amet',
            'description' => 'Lorem ipsum dolor sit amet',
            'publication' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'url' => 'Lorem ipsum dolor sit amet',
            'staff_id' => 1,
            'dept_id' => 1,
            'faculty_id' => 1,
            'unit_id' => 1,
            'created' => 1476312137,
            'updated' => 1476312137
        ],
    ];
}
