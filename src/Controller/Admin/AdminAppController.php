<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Admin Prefix Application Controller
 */
class AdminAppController extends AppController
{
    public function beforeFilter(Event $event)
    {
        $this->Crud->mapAction('add', 'Crud.Add');
        $this->Crud->mapAction('delete', 'Crud.Delete');
        $this->Crud->mapAction('edit', 'Crud.Edit');
        $this->Crud->mapAction('view', 'Crud.View');
    }
}