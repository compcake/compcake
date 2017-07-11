<?php
namespace App\Controller;

use \Cake\Event\Event;

/**
 * Judges Controller
 *
 * Implements a simple GET add/delete interface.
 *
 * @property \App\Model\Table\JudgesTable $Judges
 */
class JudgesController extends AppController
{
    public function add($role = null, $session = null)
    {
        $this->request->allowMethod(['get', 'add']);
        if (!empty($role) && !empty($session)) {
            $judge = $this->Judges->newEntity();
            $judge = $this->Judges->patchEntity($judge, [
                'user_id' => $this->Auth->User('id'),
                'session_id' => $session,
                'role' => $role
            ]);
            if ($this->Judges->save($judge)) {
                $this->Flash->success(__('You have been signed up as a ' . h($role) . '.'));
            } else {
                $this->Flash->error(__('Unable to add you as a ' . h($role) . '. Please try again.'));
            }
        } else {
            $this->Flash->error(__('Invalid GET request.'));
        }
        return $this->redirect(['controller' => 'sessions', 'action' => 'index']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['get', 'delete']);
        $judge = $this->Judges->get($id);
        if ($this->Judges->delete($judge)) {
            $this->Flash->success(__('You have been removed from the requested session.'));
        } else {
            $this->Flash->error(__('The requested record could not be removed.'));
        }

        return $this->redirect(['controller' => 'sessions', 'action' => 'index']);
    }

}