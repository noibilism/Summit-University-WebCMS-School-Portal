<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SchoolSession Entity
 *
 * @property int $id
 * @property string $name
 * @property int $added_by
 * @property \Cake\I18n\Time $starts
 * @property \Cake\I18n\Time $ends
 * @property int $current_session
 * @property \Cake\I18n\Time $admission_starts
 * @property \Cake\I18n\Time $admission_ends
 * @property \Cake\I18n\Time $sessional_reg_starts
 * @property \Cake\I18n\Time $sessional_reg_ends
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 *
 * @property \App\Model\Entity\User $user
 */
class SchoolSession extends Entity
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
