<?php
namespace App\Controller\Staff;

use App\Controller\Staff\StaffAppController;

class UsersController extends StaffAppController
{
    public function index()
    {
        $action = $this->Crud->action();
        $action->config('scaffold.fields_blacklist', ['password']);
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
