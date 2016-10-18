<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Publication Entity
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $publication
 * @property string $url
 * @property int $staff_id
 * @property int $dept_id
 * @property int $faculty_id
 * @property int $unit_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 *
 * @property \App\Model\Entity\StaffProfile $staff_profile
 * @property \App\Model\Entity\Department $department
 * @property \App\Model\Entity\Faculty $faculty
 * @property \App\Model\Entity\Unit $unit
 */
class Publication extends Entity
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
