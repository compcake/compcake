<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Entry Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $description
 * @property string $special_ingredients
 * @property string $style
 * @property int $judge_number
 *
 * @property \App\Model\Entity\User $user
 */
class Entry extends Entity
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
