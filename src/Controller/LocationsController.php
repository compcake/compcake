<?php
namespace App\Controller;

use \Cake\Event\Event;

class LocationsController extends AppController
{
    /**
     * Crud needs to expose a view action for this controller so users can view a session's location.
     *
     * @param Event $event
     */
    public function beforeFilter(Event $event)
    {
        $this->Crud->mapAction('view', 'Crud.View');
    }
}