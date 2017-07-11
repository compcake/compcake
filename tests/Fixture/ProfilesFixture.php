<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProfilesFixture
 *
 */
class ProfilesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'autoIncrement' => true, 'precision' => null, 'comment' => null],
        'user_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        'first_name' => ['type' => 'string', 'fixed' => true, 'length' => 80, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'collate' => null],
        'last_name' => ['type' => 'string', 'fixed' => true, 'length' => 80, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'collate' => null],
        'address1' => ['type' => 'string', 'fixed' => true, 'length' => 80, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'collate' => null],
        'address2' => ['type' => 'string', 'fixed' => true, 'length' => 80, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'collate' => null],
        'address3' => ['type' => 'string', 'fixed' => true, 'length' => 80, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'collate' => null],
        'city' => ['type' => 'string', 'fixed' => true, 'length' => 80, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'collate' => null],
        'province' => ['type' => 'string', 'fixed' => true, 'length' => 80, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'collate' => null],
        'country' => ['type' => 'string', 'fixed' => true, 'length' => 80, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'collate' => null],
        'postcode' => ['type' => 'string', 'fixed' => true, 'length' => 80, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'collate' => null],
        'aha_number' => ['type' => 'string', 'fixed' => true, 'length' => 10, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'collate' => null],
        '_indexes' => [
            'profiles_user_id' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'sqlite_autoindex_profiles_1' => ['type' => 'unique', 'columns' => ['user_id'], 'length' => []],
            'user_id_fk' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['user', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'user_id' => 1,
            'first_name' => 'Lorem ipsum dolor sit amet',
            'last_name' => 'Lorem ipsum dolor sit amet',
            'address1' => 'Lorem ipsum dolor sit amet',
            'address2' => 'Lorem ipsum dolor sit amet',
            'address3' => 'Lorem ipsum dolor sit amet',
            'city' => 'Lorem ipsum dolor sit amet',
            'province' => 'Lorem ipsum dolor sit amet',
            'country' => 'Lorem ipsum dolor sit amet',
            'postcode' => 'Lorem ipsum dolor sit amet',
            'aha_number' => 'Lorem ip'
        ],
    ];
}
