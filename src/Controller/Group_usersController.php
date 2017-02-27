<?php
/**
 * Created by PhpStorm.
 * User: 1442000
 * Date: 2017-02-27
 * Time: 10:37
 */
namespace App\Controller;

class Group_usersController extends AppController
{
    public function index()
    {
        $group_users = $this->Group_users->find('all');
        $this->set(compact('group_users'));
    }
}