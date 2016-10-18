<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Department Entity
 *
 * @property int $id
 * @property string $name
 * @property int $faculty_id
 * @property string $description
 * @property int $content_id
 * @property string $prospectus
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 *
 * @property \App\Model\Entity\Content $content
 * @property \App\Model\Entity\Faculty $faculty
 * @property \App\Model\Entity\AdmissionsApplicant[] $admissions_applicants
 * @property \App\Model\Entity\StaffProfile[] $staff_profiles
 * @property \App\Model\Entity\Courseware[] $coursewares
 * @property \App\Model\Entity\Publication[] $publications
 * @property \App\Model\Entity\Result[] $results
 */
class Department extends Entity
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
