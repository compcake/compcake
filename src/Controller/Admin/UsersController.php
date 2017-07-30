<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AdminAppController;

class UsersController extends AdminAppController
{
    public function view()
    {
        $this->Crud->on('beforeFind', function (\Cake\Event\Event $event) {
            $event->subject->query->contain(['Entries', 'Roles']);
        });
        return $this->Crud->execute();
    }

    public function edit()
    {
        $roles = $this->Users->Roles->find('all', ['limit' => 200]);
        $rlist = array();
        foreach ($roles as $role) {
            $rlist[$role['id']] = $role['role'];
        }
        $this->set('roles', $rlist);

        return $this->Crud->execute();
    }

    public function login()
    {
        return $this->redirect('/users/login');
    }

    public function logout()
    {
        return $this->redirect('/users/logout');
    }
}