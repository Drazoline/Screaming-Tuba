<?php
/**
 * Created by PhpStorm.
 * User: Mathieu Godin
 * Date: 2017-03-06
 * Time: 10:55
 */
namespace App\Controller;

class UserFileLikesController extends AppController
{
    public function index()
    {
        $userFileLikes = $this->UserFileLikes->find('all');
        $this->set(compact('userFileLikes'));
    }
}