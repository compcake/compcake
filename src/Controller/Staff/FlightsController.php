<?php
namespace App\Controller\Staff;

use App\Controller\AppController;

/**
 * Flights Controller
 *
 * @property \App\Model\Table\FlightsTable $Flights
 */
class FlightsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Sessions', 'Entries']
        ];
        $flights = $this->paginate($this->Flights);

        $this->set(compact('flights'));
        $this->set('_serialize', ['flights']);
    }

    /**
     * View method
     *
     * @param string|null $id Flight id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $flight = $this->Flights->get($id, [
            'contain' => ['Sessions', 'Entries', 'Judges']
        ]);

        $this->set('flight', $flight);
        $this->set('_serialize', ['flight']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $flight = $this->Flights->newEntity();
        if ($this->request->is('post')) {
            $flight = $this->Flights->patchEntity($flight, $this->request->data);
            if ($this->Flights->save($flight)) {
                $this->Flash->success(__('The flight has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The flight could not be saved. Please, try again.'));
        }

        $sessions = array();
        $sessionQuery = null;
        if ($this->request->query('session_id')) {
            $s = $this->Flights->Sessions->get($this->request->query('session_id'));
            $sessions[$s->id] = $s->d . " - " . $s->location->name;
        } else {
            $sessionQuery = $this->Flights->Sessions->find('all');
            foreach ($sessionQuery as $s) {
                $sessions[$s->id] = $s->d . " - " . $s->location->name;
            }
        }
        if (!($this->request->query('style')) || !($this->request->query('session_id'))) {
            $this->set(compact('sessions'));
            $this->set('_serialize', ['sessions']);
            return null;
        }

        $entriesQuery = $this->Flights->Entries->find('all', ['conditions' => 'score IS NULL'])
            ->where(['style' => $this->request->query('style')])
            ->limit(20);
        $entries = array();
        foreach ($entriesQuery as $e) {
            $entries[$e->id] = $e->id . " - " . $e->description;
        }

        $judgesQuery = $this->Flights->Judges->find('all')
            ->contain(['Users'])
            ->where(['session_id' => $this->request->query('session_id')]);
        $judges = [];
        foreach ($judgesQuery as $j) {
            $judges[$j->id] = $j->user->first_name . " " . $j->user->last_name . " (" . $j->role . ")";
        }
        $this->set(compact('flight', 'sessions', 'entries', 'judges'));
        $this->set('_serialize', ['flight']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Flight id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $flight = $this->Flights->get($id);
        if ($this->Flights->delete($flight)) {
            $this->Flash->success(__('The flight has been deleted.'));
        } else {
            $this->Flash->error(__('The flight could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
