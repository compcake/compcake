<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * All of the other application controllers are inherited from this class
 * or a descandant thereof.
 *
 * This application makes use of several prefixes and associated controllers
 * to implement elevated privilege levels. Except for the Pages controller
 * which is accessible to anyone, the controllers require a fully authenticated
 * user session managed by the Auth module.
 *
 * The default route ('/') has the least privilege, and is available to all
 * roles. In this route, the user can only index or view objects which are
 * owned by that user (for instance that user's entries and user profile),
 * or publicly visible objects (such as sessions).
 *
 * The staff route ('staff/') has more privilege than the default, and
 * requires the 'Staff' role be assigned to the user to access. In this
 * route, users may index or view all objects in the system. The Staff role
 * has edit access to sessions, as well as full control over flights, and
 * its associated tables such as judges and stewards.
 *
 * The admin route ('admin/') has full access to the entire schema, and
 * requires users have the 'Admin' role to access it. Outside of development
 * its use is limited to creating or deleting sessions (which general
 * competition staff should not do), and editing the users table to grant
 * (or revoke) the Staff or Admin level privileges.
 */
class AppController extends Controller
{
    /**
     * Use Crud to dynamically generate controller methods for us by default.
     */
    use \Crud\Controller\ControllerTrait;

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        /**
         * Use Crud to scaffold our controller actions. This keeps us from having
         * to bake a bunch of boilerplate code that we will never change, but would
         * need to be tested, and has the added bonus of giving us a split permissions
         * model with very little effort.
         *
         * By default we only enable the Index action. The root Users and Entities
         * controllers implement their own non-Crud View actions, so that they can
         * filter for objects belonging to that user. The Crud defaults are overridden
         * in beforeFilter() of the Admin\AdminAppController, Staff\StaffAppController,
         * Staff\FlightController, and Staff\SessionsController classes.
         */
        $this->loadComponent('Crud.Crud', [
            'actions' => [
                'Crud.Index'
            ],
            'listeners' => [
                'Crud.Api',
                'Crud.ApiPagination',
                'Crud.ApiQueryLog',
            ]
        ]);
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'authorize' => 'Controller',    // see isAuthorized() below
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'unauthorizedRedirect' => $this->referer() // If unauthorized, return them to page they were just on
        ]);

        // Allow the display action for everyone - with this, we do not need isAuthorized() for Pages controller
        $this->Auth->allow(['display']);

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        $this->loadComponent('Security');
        $this->loadComponent('Csrf');
    }

    /**
     * Is user authorized to access this controller?
     *
     * 1. If prefix is not set, return true.
     * 2. If user is null return false. Note this test is second so that login/logout can work.
     * 3. If prefix is set and we cannot find role(s), return false.
     * 4. If prefix is set and the user has the role associated with
     *    the prefix, return true.
     * 5. Return false.
     *
     * If the user is logged in, sets the current user's ID on the table object as a side effect.
     *
     * @param null $user
     * @return bool
     */
    public function isAuthorized($user = null)
    {
        $users = TableRegistry::get('Users');

        // Set the current user id so we can filter on it
        if ($user) {
            $users->setUserId($user['id']);
        }

        $prefix = $this->request->param('prefix');
        if (!$prefix || $prefix == '') {
            return true;    // 1
        }

        if (!$user) {
            return false;   // 2
        }

        $query = $users->find('all')
            ->contain(['Roles'])
            ->where(['id' => $user['id']]);
        if (!$query) {
            return false;   // 3
        }

        foreach ($query as $user) {
            foreach ($user['roles'] as $role) {
                $r = strtolower($role['role']);
                if ($prefix === $r) {
                    return true; // 4
                }
            }
        }
        return false;   // 5
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
}
