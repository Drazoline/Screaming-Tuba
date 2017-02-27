<?php

namespace App\Controller;

class FoldersController extends AppController
{
    public function index()
    {
        $folders = $this->Folders->find('all');
        $this->set(compact('folders'));
    }
}