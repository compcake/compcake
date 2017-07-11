<?php
namespace App\Controller\Staff;

use App\Controller\AppController;
use Cake\Event\Event;

class SessionsController extends AppController
{
    public function beforeFilter(Event $event)
    {
        $this->Crud->mapAction('edit', 'Crud.Edit');
        $this->Crud->mapAction('view', 'Crud.View');
    }
}
