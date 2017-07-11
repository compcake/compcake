<?php
namespace App\Test\TestCase\Controller;

use App\Controller\JudgesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\JudgesController Test Case
 */
class JudgesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.judges',
        'app.users',
        'app.volunteers',
        'app.staff',
        'app.sessions',
        'app.locations',
        'app.flights',
        'app.stewards',
        'app.entries',
        'app.entries_flights',
        'app.judges_flights',
        'app.roles',
        'app.users_roles'
    ];

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
