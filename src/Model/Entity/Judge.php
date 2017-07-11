<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Judge Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $session_id
 * @property string $role
 *
 * @property \App\Model\Entity\Volunteer $volunteer
 * @property \App\Model\Entity\Session $session
 * @property \App\Model\Entity\Flight[] $flights
 */
class Judge extends Entity
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
