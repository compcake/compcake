<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JudgesFlightsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JudgesFlightsTable Test Case
 */
class JudgesFlightsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\JudgesFlightsTable
     */
    public $JudgesFlights;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.judges_flights',
        'app.judges',
        'app.volunteers',
        'app.users',
        'app.staff',
        'app.sessions',
        'app.locations',
        'app.flights',
        'app.stewards'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('JudgesFlights') ? [] : ['className' => 'App\Model\Table\JudgesFlightsTable'];
        $this->JudgesFlights = TableRegistry::get('JudgesFlights', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->JudgesFlights);

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
