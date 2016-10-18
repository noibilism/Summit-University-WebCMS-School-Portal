<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Result Entity
 *
 * @property int $id
 * @property int $student_id
 * @property int $semester
 * @property string $level
 * @property int $dept_id
 * @property int $course_id
 * @property string $course_code
 * @property string $score
 * @property string $grade
 * @property string $units_obtainable
 * @property string $unit_obtained
 * @property int $session_id
 * @property string $added_by
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 *
 * @property \App\Model\Entity\Student $student
 * @property \App\Model\Entity\Department $department
 * @property \App\Model\Entity\Course $course
 * @property \App\Model\Entity\SchoolSession $school_session
 */
class Result extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
