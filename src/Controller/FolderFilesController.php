<?php

namespace App\Controller;

class FolderFilesController extends AppController
{
    public function index()
    {
        $folderFiles = $this->FolderFiles->find('all');
        $this->set(compact('folderFiles'));
    }
}