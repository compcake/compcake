<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VolunteersFixture
 *
 */
class VolunteersFixture extends TestFixture
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
        'bjcp' => ['type' => 'string', 'fixed' => true, 'length' => 10, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'collate' => null],
        'judge' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'steward' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'volunteer' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        '_indexes' => [
            'volunteers_user_id' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'sqlite_autoindex_volunteers_1' => ['type' => 'unique', 'columns' => ['user_id'], 'length' => []],
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
            'bjcp' => 'Lorem ip',
            'judge' => 1,
            'steward' => 1,
            'volunteer' => 1
        ],
    ];
}
