<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * JudgesFlightsFixture
 *
 */
class JudgesFlightsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'autoIncrement' => true, 'precision' => null, 'comment' => null],
        'judge_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        'flight_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'flight_id_fk' => ['type' => 'foreign', 'columns' => ['flight_id'], 'references' => ['flights', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'judge_id_fk' => ['type' => 'foreign', 'columns' => ['judge_id'], 'references' => ['judges', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'judge_id' => 1,
            'flight_id' => 1
        ],
    ];
}
