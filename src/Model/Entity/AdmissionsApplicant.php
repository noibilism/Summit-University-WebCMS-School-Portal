<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AdmissionsApplicant Entity
 *
 * @property int $id
 * @property string $application_number
 * @property int $sch_session_id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property int $first_choice
 * @property int $second_choice
 * @property string $sex
 * @property \Cake\I18n\Time $dob
 * @property int $state_of_origin
 * @property int $lga
 * @property int $town
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 *
 * @property \App\Model\Entity\SchoolSession $school_session
 */
class AdmissionsApplicant extends Entity
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
