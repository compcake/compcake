<?php
namespace App\Controller\Admin;

class EntriesController extends AdminAppController
{
    public function view()
    {
        $this->Crud->on('beforeFind', function (\Cake\Event\Event $event) {
            $event->subject->query->contain(['Users']);
        });
        return $this->Crud->execute();
    }
}