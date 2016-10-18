<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ApplicantEducation Entity
 *
 * @property int $id
 * @property string $sec_school
 * @property string $grades_obtained
 * @property string $other_grades
 * @property string $jamb_reg
 * @property string $jamb_score
 * @property string $application_numer
 * @property int $admission_application_id
 *
 * @property \App\Model\Entity\AdmissionsApplicant $admissions_applicant
 */
class ApplicantEducation extends Entity
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
