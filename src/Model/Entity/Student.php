<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Student Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $matric_no
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $sex
 * @property string $mode_of_entry
 * @property \Cake\I18n\Time $dob
 * @property string $home_town
 * @property int $lga
 * @property int $state_of_origin
 * @property int $pix
 * @property int $status
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Result[] $results
 */
class Student extends Entity
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
