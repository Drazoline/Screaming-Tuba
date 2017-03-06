<?php
/**
 * Created by PhpStorm.
 * User: 1442000
 * Date: 2017-02-27
 * Time: 10:37
 */
namespace App\Controller;

class PermGroupUsersController extends AppController
{
    public function index()
    {
        $permGroupUsers = $this->PermGroupUsers->find('all');
        $this->set(compact('permGroupUsers'));
    }
}