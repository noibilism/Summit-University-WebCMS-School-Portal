<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Content Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $category_id
 * @property string $title
 * @property string $meta
 * @property string $alias
 * @property string $intro
 * @property string $body
 * @property int $gallery_id
 * @property string $display
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 * @property int $status
 *
 * @property \App\Model\Entity\ContentCategory $content_category
 * @property \App\Model\Entity\User $user
 */
class Content extends Entity
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
