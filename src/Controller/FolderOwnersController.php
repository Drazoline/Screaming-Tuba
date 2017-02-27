<?php

namespace App\Controller;

class FolderOwnersController extends AppController
{
    public function index()
    {
        $folderOwners = $this->FolderOwners->find('all');
        $this->set(compact('folderOwners'));
    }
}