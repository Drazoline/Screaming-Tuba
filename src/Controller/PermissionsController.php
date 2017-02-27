<?php
/**
 * Created by PhpStorm.
 * User: 1442000
 * Date: 2017-02-27
 * Time: 10:37
 */
namespace App\Controller;

class PermissionsController extends AppController
{
    public function index()
    {
        $permissions = $this->Permissions->find('all');
        $this->set(compact('permissions'));
    }
}