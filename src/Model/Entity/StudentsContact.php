<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StudentsContact Entity
 *
 * @property int $id
 * @property int $student_id
 * @property string $matric_no
 * @property string $email
 * @property string $phone
 * @property string $home_address
 * @property string $city
 * @property int $lga
 * @property int $state
 * @property string $parent_name
 * @property string $parent_phone
 * @property string $parent_address
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 *
 * @property \App\Model\Entity\Student $student
 */
class StudentsContact extends Entity
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
