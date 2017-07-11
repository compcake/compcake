<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AdminAppController;

class UsersController extends AdminAppController
{
    public function login()
    {
        return $this->redirect('/users/login');
    }

    public function logout()
    {
        return $this->redirect('/users/logout');
    }
}