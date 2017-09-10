<?php
namespace App\Controller;

use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception\NotAcceptableException;
use Cake\Network\Exception\NotFoundException;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Core\Configure;

class EntriesController extends AppController
{
    /**
     * Crud needs to expose all actions for this controller so users can view,
     * edit, and delete their entries.
     *
     * @param Event $event
     */
    public function beforeFilter(Event $event)
    {
        $this->Crud->mapAction('add', 'Crud.Add');
        $this->Crud->mapAction('delete', 'Crud.Delete');
        $this->Crud->mapAction('edit', 'Crud.Edit');
        $this->Crud->mapAction('view', 'Crud.View');
        $this->Crud->mapAction('labels', 'Crud.View');
    }

    /**
     * Is the requested entry id set, valid, and owned by the current user?
     *
     * @return boolean
     */
    private function _ownedByCurrentUser($id) {
        if (empty($id)) {
            return false;
        }
        $queryResult = $this->Entries->findById($id)->limit(1);
        foreach ($queryResult as $entry) {
            if ($entry['user_id'] === $this->Auth->user('id')) {
                return true;
            }
        }
        return false;
    }

    /**
     * Override the default Crud Index action so that we will filter entries by the logged in user's user ID.
     */
    public function index()
    {
        $action = $this->Crud->action();
        $action->findMethod('filterByCurrentUser');

        $entriesTable = TableRegistry::get('Entries');
        $unpaidQuery = $entriesTable->find()->where(['user_id' => $this->Auth->user('id'), 'paid' => false]);
        $this->set('unpaidEntries', $unpaidQuery->count());

        return $this->Crud->execute();
    }

    private function _action($id = null)
    {
        if ($this->_ownedByCurrentUser($id)) {
            return $this->Crud->execute();
        }
        throw new NotFoundException;
    }

    public function view($id = null)
    {
        return $this->_action($id);
    }

    public function labels($id = null)
    {
        return $this->_action($id);
    }

    public function edit($id = null)
    {
        if (!Configure::read('accepting_entries')) {
            // We don't allow editing entries outside of the entry window
            throw new NotAcceptableException;
        }

        return $this->_action($id);
    }

    public function delete($id = null)
    {
        $queryResult = $this->Entries->findById($id)->limit(1);
        foreach ($queryResult as $entry) {
            if (!empty($entry['paid']) || !empty($entry['score']) || !empty($entry['scoresheet'])) {
                // We don't allow deleting paid for or judged entries
                throw new NotAcceptableException;
            }
        }
        return $this->_action($id);
    }

    public function add()
    {
        if (!Configure::read('accepting_entries')) {
            // We don't allow adding entries outside of the entry window
            throw new NotAcceptableException;
        }

        if ($this->request->is('post')) {
            $this->request->data += [ 'user_id' => strval($this->Auth->user('id')), 'paid' => false ];
        }
        return $this->Crud->execute();
    }

    public function checkin()
    {
        if (!$this->request->session()->read('priv.staff')) {
            throw new NotAcceptableException;
        }
        if ($this->request->is('post')) {
            $entry = null;
            try {
                $entry = $this->Entries->get($this->request->data['id']);
            } catch (RecordNotFoundException $r) {
                $this->Flash->error('Entry number was not found');
                return null;
            }
            if (!is_numeric($this->request->data['bin'])) {
                $this->Flash->error('Bin number must be an integer');
                return null;
            }
            try {
                $entry = $this->Entries->patchEntity($entry, $this->request->data);
                $this->Entries->save($entry);
            } catch (Exception $e) {
                $this->Flash->error('Problem updating entry');
            }
        }
    }

    public function download($id = null)
    {
        if (!Configure::read('show_results')) {
            // We don't allow downloading scoresheets until the competition is closed
            throw new NotAcceptableException;
        }
        if (!empty($id)) {
            $queryResult = $this->Entries->findById($id)->limit(1);
            foreach ($queryResult as $entry) {
                if ($entry['user_id'] === $this->Auth->user('id') &&
                    !empty($entry['scoresheet'])) {
                    $this->response->file('scoresheets/' . $entry['scoresheet'],
                        [ 'download' => true, 'name' => $entry['scoresheet']]);
                    return $this->response;
                }
            }
        }
        throw new NotFoundException;
    }
}