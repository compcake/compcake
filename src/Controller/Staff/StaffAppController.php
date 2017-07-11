<?php
namespace App\Controller\Staff;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Staff Prefix Application Controller
 */
class StaffAppController extends AppController
{
    public function beforeFilter(Event $event)
    {
        $this->Crud->mapAction('view', 'Crud.View');
    }
}
