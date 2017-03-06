<?php
/**
 * Created by PhpStorm.
 * User: 1442000
 * Date: 2017-02-27
 * Time: 10:37
 */
namespace App\Controller;

class GroupUsersController extends AppController
{
    public function index()
    {
        $groupUsers = $this->GroupUsers->find('all');
        $this->set(compact('groupUsers'));
    }
}