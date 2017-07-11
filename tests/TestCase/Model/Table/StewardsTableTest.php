<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StewardsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StewardsTable Test Case
 */
class StewardsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StewardsTable
     */
    public $Stewards;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.stewards',
        'app.volunteers',
        'app.users',
        'app.judges',
        'app.sessions',
        'app.locations',
        'app.flights',
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
        $config = TableRegistry::exists('Stewards') ? [] : ['className' => 'App\Model\Table\StewardsTable'];
        $this->Stewards = TableRegistry::get('Stewards', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Stewards);

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
