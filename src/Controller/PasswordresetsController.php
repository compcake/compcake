<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\Utility\Security;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
use Cake\Core\Configure;
use Cake\Routing\Router;

/**
 * Passwordresets Controller
 *
 * @property \App\Model\Table\PasswordresetsTable $Passwordresets
 */
class PasswordresetsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        // Add logout and add to the allowed actions list.
        $this->Auth->allow(['index', 'add', 'resetpw']);
    }

    public function isAuthorized($user = null)
    {
        return true;
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $passwordresets = $this->paginate($this->Passwordresets);

        $this->set(compact('passwordresets'));
        $this->set('_serialize', ['passwordresets']);
    }

    /**
     * Add method
     *
     * If the email address corresponds to a valid user:
     *
     *   - Cleans up any existing entries belonging to the user.
     *   - Generates a token and stores it in a new table row.
     *   - Sends email to the user with the URL of the resetpw action for validation.
     *
     * @return \Cake\Network\Response|null Redirects to login action of users controller on POST, renders view
     * otherwise.
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $usersTable = TableRegistry::get('Users');
            $usersQuery = $usersTable->find()->where(['email' => $this->request->data['email']])->limit(1);
            debug($this->request->data);
            foreach ($usersQuery as $user) {
                $this->Passwordresets->deleteAll(['user_id' => $user->id]);

                $this->request->data['token'] =  Security::hash(Security::randomBytes(128), 'sha1', true);
                $this->request->data['user_id'] = $user->id;
                $this->request->data['expiration'] = new Time('+23 hours');

                $passwordreset = $this->Passwordresets->newEntity();
                $passwordreset = $this->Passwordresets->patchEntity($passwordreset, $this->request->data);
                $this->Passwordresets->save($passwordreset);

                $resetLink = Router::url([
                    'controller' => 'passwordresets',
                    'action' => 'resetpw',
                    $this->request->data['token']
                ], true);
                /* -- for local testing -- debug($resetLink); */
                $email = new Email();
                $email->from([ Configure::read('reset_email') => 'Password Reset' ])
                    ->to($this->request->data['email'])
                    ->subject('Password Reset Link for ' . Configure::read('competition'))
                    ->send('Your link to reset your password is: ' . $resetLink);
            }
            $this->Flash->success(__('If an account exists with that address, a password reset email was sent.'));
            return $this->redirect(['controller' => 'users', 'action' => 'login']);
        }
    }

    /**
     * Resetpw method
     *
     * @return \Cake\Network\Response|null Redirects to login action of users controller if token is expired,
     * or invalid; otherwise returns null to render view.
     */
    public function resetpw($token = null) {
        if ($this->request->is('post')) {
            $token = $this->request->data['token'];
        }
        if ($token) {
            $passwordreset = $this->Passwordresets->find()->where(['token' => $token]);
            foreach ($passwordreset as $r) {
                if ($r->expiration > Time::now()) {
                    $this->set(compact('r'));
                    $this->set('_serialize', ['r']);
                    if ($this->request->is('post')) {
                        if ($this->request->data['password'] != $this->request->data['confirm_password']) {
                            $this->Flash->error(__('Passwords must match. Please try again.'));
                        } else {
                            $this->Passwordresets->deleteAll(['token' => $r->token]);
                            $usersTable = TableRegistry::get('Users');
                            foreach ($usersTable->find()->where(['id' => $r->user_id]) as $user) {
                                $usersTable->patchEntity($user, ['password' => $this->request->data['password']]);
                                if ($usersTable->save($user)) {
                                    $this->Flash->success(__('Password has been reset.'));
                                }
                            }
                            return $this->redirect(['controller' => 'users', 'action' => 'login']);
                        }
                    }
                    return null;
                }
            }
        }
        $this->Flash->error(__('Password reset token is invalid or expired. Please try again.'));
        return $this->redirect(['controller' => 'users', 'action' => 'login']);
    }
}