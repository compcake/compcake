<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Core\Configure;

class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        // Add logout and add to the allowed actions list.
        $this->Auth->allow(['logout', 'add']);
    }

    /**
     * Crud needs to expose an add action for this controller so new users can register,
     * and an edit action so users can update their profile.
     *
     * @param Event $event
     */
    public function beforeFilter(Event $event)
    {
        $this->Crud->mapAction('add', 'Crud.Add');
        $this->Crud->mapAction('edit', 'Crud.Edit');
        /**
         * Unlock security checks for 'add' action so that we can use reCAPTCHA. Since reCAPTCHA will
         * prevent replay attacks etc. this should be fine.
         */
        if (Configure::read('recaptcha_enable')) {
            $this->Security->config('unlockedActions', ['add']);
        }
    }

    /**
     * Override the default Crud Index action. This is used to retrieve the user's profile data,
     * so we set the find method to filter by the logged in user's user ID.
     *
     * @return mixed
     */
    public function index()
    {
        $action = $this->Crud->action();
        $action->findMethod('filterByCurrentUser');
        $action->config('scaffold.fields_blacklist', ['password']);

        return $this->Crud->execute();
    }

    public function edit($id = null)
    {
        if (!empty($id) && $id == $this->Auth->user('id')) {
            return $this->Crud->execute();
        }
        throw new NotFoundException;
    }

    public function add() {
        $this->loadComponent('Recaptcha.Recaptcha', [
            'enable' => Configure::read('recaptcha_enable'),
            'sitekey' => Configure::read('recaptcha_sitekey'),
            'secret' => Configure::read('recaptcha_secret'),
            'type' => 'image',  // image/audio
            'theme' => 'light', // light/dark
            'lang' => 'en',      // default en
            'size' => 'normal'  // normal/compact
        ]);
        if ($this->request->is('post')){
            if (!($this->Recaptcha->verify())) {
                $this->Flash->error(__('ReCAPTCHA response invalid'));
                return $this->redirect(['controller' => 'users', 'action' => 'add']);
            }
        }
        return $this->Crud->execute();
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Authorization failed.');
        }
        $this->set('siteTitle', 'Login');
        $this->set('disableSidebar', 'true');
    }

    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }
}