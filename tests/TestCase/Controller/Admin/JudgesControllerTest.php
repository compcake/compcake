<?php
namespace App\Test\TestCase\Controller\Admin;

use App\Controller\Admin\JudgesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\Admin\JudgesController Test Case
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
        'app.entries',
        'app.flights',
        'app.sessions',
        'app.locations',
        'app.stewards',
        'app.volunteers',
        'app.staff',
        'app.entries_flights',
        'app.judges_flights',
        'app.roles',
        'app.users_roles'
    ];

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
