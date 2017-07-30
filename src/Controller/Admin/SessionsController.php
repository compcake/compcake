<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Sessions Controller
 *
 * @property \App\Model\Table\SessionsTable $Sessions
 */
class SessionsController extends AdminAppController
{
    public function index()
    {
        $this->Crud->on('beforeFind', function (\Cake\Event\Event $event) {
            $event->subject->query->contain(['Locations']);
        });
        return $this->Crud->execute();
    }

    public function view()
    {
        $this->Crud->on('beforeFind', function (\Cake\Event\Event $event) {
            $event->subject->query->contain(['Locations']);
        });
        return $this->Crud->execute();
    }

    public function edit($id = null)
    {
        $this->Crud->on('beforeFind', function (\Cake\Event\Event $event) {
            $event->subject->query->contain(['Locations']);
        });
        $locations = $this->Sessions->Locations->find('list', ['limit' => 200]);
        $this->set(compact('session', 'locations'));

        return $this->Crud->execute();
    }

    public function add($id = null)
    {
        $this->Crud->on('beforeFind', function (\Cake\Event\Event $event) {
            $event->subject->query->contain(['Locations']);
        });
        $locations = $this->Sessions->Locations->find('list', ['limit' => 200]);
        $this->set(compact('session', 'locations'));

        return $this->Crud->execute();
    }
}
