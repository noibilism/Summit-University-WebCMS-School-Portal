<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ApplicantContact Entity
 *
 * @property int $id
 * @property string $application_number
 * @property string $phone_number
 * @property string $email
 * @property string $home_address
 * @property int $state
 * @property int $lga
 * @property string $city
 * @property string $admission_application_id
 *
 * @property \App\Model\Entity\AdmissionApplication $admission_application
 */
class ApplicantContact extends Entity
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
