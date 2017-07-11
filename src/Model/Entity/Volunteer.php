<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Volunteer Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $bjcp
 * @property bool $judge
 * @property bool $steward
 * @property bool $volunteer
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Judge[] $judges
 * @property \App\Model\Entity\Steward[] $stewards
 */
class Volunteer extends Entity
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
