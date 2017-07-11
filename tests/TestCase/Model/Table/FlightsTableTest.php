<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FlightsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FlightsTable Test Case
 */
class FlightsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FlightsTable
     */
    public $Flights;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.flights',
        'app.sessions',
        'app.locations',
        'app.judges',
        'app.volunteers',
        'app.users',
        'app.entries',
        'app.entries_flights',
        'app.staff',
        'app.stewards',
        'app.judges_flights'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Flights') ? [] : ['className' => 'App\Model\Table\FlightsTable'];
        $this->Flights = TableRegistry::get('Flights', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Flights);

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
