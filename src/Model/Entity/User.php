<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Collection\Collection;

/**
 * User Entity
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string $address1
 * @property string $address2
 * @property string $address3
 * @property string $city
 * @property string $province
 * @property string $country
 * @property string $postcode
 * @property string $aha_number
 * @property string $bjcp
 * @property boolean $judge
 * @property boolean $steward
 * @property boolean $volunteer
 *
 * @property string $name
 */
class User extends Entity
{
    public function _setPassword($password)
    {
        // Do not hash the password if it already is hashed
        if (substr($password, 0, 7) != '$2y$10$') {
            $hasher = new DefaultPasswordHasher();
            return $hasher->hash($password);
        }
    }

    public function _getName()
    {
        return $this->first_name . " " . $this->last_name;
    }

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

    /**
     * Fields which are virtual.
     */
    protected $_virtual = [
        'name'
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
