<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Site Config Controller
 */
class SiteConfigController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        if ($this->request->is('post')) {
            debug($this->request->data);
        }
        $this->set(compact('sessions'));
        $this->set('_serialize', ['sessions']);
    }

    public function beforeFilter(\Cake\Event\Event $event) {
        $this->Security->config('unlockedActions', ['index']);
    }
}