<?php
/**
 * Created by PhpStorm.
 * User: Yannick Grégoire
 * Date: 2017-03-06
 * Time: 11:17
 */
namespace App\Controller;

class CommentsController extends AppController
{
    public function index()
    {
        $comments = $this->Comments->find('all');
        $this->set(compact('Comments'));
    }
}