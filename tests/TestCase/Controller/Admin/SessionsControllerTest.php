<?php
namespace App\Test\TestCase\Controller\Admin;

use App\Controller\Admin\SessionsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\Admin\SessionsController Test Case
 */
class SessionsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sessions',
        'app.locations',
        'app.flights',
        'app.stewards',
        'app.volunteers',
        'app.users',
        'app.entries',
        'app.entries_flights',
        'app.roles',
        'app.users_roles',
        'app.judges',
        'app.judges_flights',
        'app.staff'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

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
