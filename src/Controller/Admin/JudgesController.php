<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Judges Controller
 *
 * @property \App\Model\Table\JudgesTable $Judges
 */
class JudgesController extends AppController
{

    /**
     * Delete method
     *
     * @param string|null $id Judge id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $judge = $this->Judges->get($id);
        if ($this->Judges->delete($judge)) {
            $this->Flash->success(__('The judge has been deleted.'));
        } else {
            $this->Flash->error(__('The judge could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
