<?php

namespace App\Controller;

class FoldersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');
    }

    public function index()
    {
        $folders = $this->Folders->find('all');
        $this->set(compact('folders'));
    }

    public function add()
    {
        $folder = $this->Folders->newEntity();
        if ($this->request->is('post')) {
            $folder = $this->Folders->patchEntity($folder, $this->request->data);
            $folder->created = date("Y-m-d H:i:s");
            $folder->modified = date("Y-m-d H:i:s");
            if ($this->Folders->save($folder)) {
                $this->Flash->success(__('Your folder has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your folder.'));
        }
        $this->set('folder', $folder);
    }
}