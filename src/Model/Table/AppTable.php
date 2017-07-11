<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class AppTable extends Table
{
    protected $_user_id = 0;

    public function setUserId($uid)
    {
        $this->_user_id = $uid;
    }

    public function getUserId()
    {
        return $this->_user_id;
    }
}