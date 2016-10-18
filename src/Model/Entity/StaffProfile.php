<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StaffProfile Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $sex
 * @property string $profile
 * @property int $faculty_id
 * @property int $department_id
 * @property int $unit_id
 * @property string $pix
 * @property int $staff_type
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Faculty $faculty
 * @property \App\Model\Entity\Department $department
 * @property \App\Model\Entity\Unit $unit
 */
class StaffProfile extends Entity
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
