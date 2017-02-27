<?php
/**
 * Created by PhpStorm.
 * User: 1442000
 * Date: 2017-02-27
 * Time: 10:37
 */
namespace App\Controller;

class GroupsController extends AppController
{
    public function index()
    {
        $groups = $this->Groups->find('all');
        $this->set(compact('groups'));
    }
}