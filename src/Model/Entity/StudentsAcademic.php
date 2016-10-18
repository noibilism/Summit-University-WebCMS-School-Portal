<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StudentsAcademic Entity
 *
 * @property int $id
 * @property int $student_id
 * @property string $level
 * @property int $faculty_id
 * @property int $department_id
 * @property string $matric_no
 * @property string $created
 * @property string $updated
 *
 * @property \App\Model\Entity\Student $student
 * @property \App\Model\Entity\Faculty $faculty
 * @property \App\Model\Entity\Department $department
 */
class StudentsAcademic extends Entity
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
