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

    public function edit($id = null)
    {
      $folder = $this->Folders->get($id);
      if ($this->request->is(['post', 'put'])) {
        $folder = $this->Folders->patchEntity($folder, $this->request->data);
        $folder->modified = date("Y-m-d H:i:s");
        if ($this->Folders->save($folder)) {
          $this->Flash->success(__('Your folder has been updated.'));
          return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('Unable to update yourfolder.'));
      }
      $this->set('folder', $folder);
    }

    public function delete($id)
    {
      $this->request->allowMethod(['post', 'delete']);
      $folder = $this->Folders->get($id);
      if ($this->Folders->delete($folder)) {
        $this->Flash->success(__('The folder with id: {0} has been deleted', h($id)));
        return $this->redirect(['action' => 'index']);
      }
    }
}
