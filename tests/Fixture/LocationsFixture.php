<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LocationsFixture
 *
 */
class LocationsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'autoIncrement' => true, 'precision' => null, 'comment' => null],
        'name' => ['type' => 'string', 'fixed' => true, 'length' => 80, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'collate' => null],
        'address1' => ['type' => 'string', 'fixed' => true, 'length' => 80, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'collate' => null],
        'address2' => ['type' => 'string', 'fixed' => true, 'length' => 80, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'collate' => null],
        'city' => ['type' => 'string', 'fixed' => true, 'length' => 80, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'collate' => null],
        'state' => ['type' => 'string', 'fixed' => true, 'length' => 80, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'collate' => null],
        'zipcode' => ['type' => 'string', 'fixed' => true, 'length' => 10, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'collate' => null],
        'url' => ['type' => 'string', 'fixed' => true, 'length' => 255, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'collate' => null],
        'isdropoff' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'isshipping' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
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
            'name' => 'Lorem ipsum dolor sit amet',
            'address1' => 'Lorem ipsum dolor sit amet',
            'address2' => 'Lorem ipsum dolor sit amet',
            'city' => 'Lorem ipsum dolor sit amet',
            'state' => 'Lorem ipsum dolor sit amet',
            'zipcode' => 'Lorem ip',
            'url' => 'Lorem ipsum dolor sit amet',
            'isdropoff' => 1,
            'isshipping' => 1
        ],
    ];
}
