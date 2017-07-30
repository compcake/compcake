<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

class LocationsController extends AdminAppController
{
    public function view($id = null)
    {
        $this->Crud->on('beforeFind', function (\Cake\Event\Event $event) {
            $event->subject->query->contain(['Sessions']);
        });
        return $this->Crud->execute();
    }
}