<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Faculty Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $content_id
 * @property string $prospectus
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 *
 * @property \App\Model\Entity\Content $content
 * @property \App\Model\Entity\StudentsAcademic[] $students_academics
 * @property \App\Model\Entity\StaffProfile[] $staff_profiles
 * @property \App\Model\Entity\Department[] $departments
 * @property \App\Model\Entity\Publication[] $publications
 */
class Faculty extends Entity
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
