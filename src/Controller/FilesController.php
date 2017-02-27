<?php

namespace App\Controller;

class FilesController extends AppController
{
    public function index()
    {
        $files = $this->Files->find('all');
        $this->set(compact('files'));
    }
}