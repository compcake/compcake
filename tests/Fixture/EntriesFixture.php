<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EntriesFixture
 *
 */
class EntriesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'autoIncrement' => true, 'precision' => null, 'comment' => null],
        'user_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        'name' => ['type' => 'string', 'fixed' => true, 'length' => 30, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'collate' => null],
        'description' => ['type' => 'string', 'fixed' => true, 'length' => 50, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'collate' => null],
        'special_ingredients' => ['type' => 'string', 'fixed' => true, 'length' => 255, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'collate' => null],
        'style' => ['type' => 'string', 'fixed' => true, 'length' => 10, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'collate' => null],
        'judge_number' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        '_indexes' => [
            'entries_user' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'user_id_fk' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'name' => 'Lorem ipsum dolor sit amet',
            'description' => 'Lorem ipsum dolor sit amet',
            'special_ingredients' => 'Lorem ipsum dolor sit amet',
            'style' => 'Lorem ip',
            'judge_number' => 1
        ],
    ];
}
