<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * JudgesFlight Entity
 *
 * @property int $id
 * @property int $judge_id
 * @property int $flight_id
 *
 * @property \App\Model\Entity\Judge $judge
 * @property \App\Model\Entity\Flight $flight
 */
class JudgesFlight extends Entity
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
