<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AdmissionPayment Entity
 *
 * @property int $id
 * @property string $reference_no
 * @property string $application_number
 * @property float $amount
 * @property string $mode
 * @property string $status_code
 * @property string $status_description
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 * @property int $fee_id
 * @property int $admission_application_id
 *
 * @property \App\Model\Entity\Fee $fee
 * @property \App\Model\Entity\AdmissionsApplicant $admissions_applicant
 */
class AdmissionPayment extends Entity
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
