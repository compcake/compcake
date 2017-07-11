<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EntriesFlightsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EntriesFlightsTable Test Case
 */
class EntriesFlightsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EntriesFlightsTable
     */
    public $EntriesFlights;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.entries_flights',
        'app.entries',
        'app.users',
        'app.volunteers',
        'app.judges',
        'app.sessions',
        'app.locations',
        'app.flights',
        'app.stewards',
        'app.judges_flights',
        'app.staff'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('EntriesFlights') ? [] : ['className' => 'App\Model\Table\EntriesFlightsTable'];
        $this->EntriesFlights = TableRegistry::get('EntriesFlights', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EntriesFlights);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
