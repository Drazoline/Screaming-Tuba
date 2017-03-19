<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;

class FolderFilesController extends AppController
{
  public function initialize()
  {
    parent::initialize();
    $this->loadComponent('Flash');
  }

  public function index()
  {
    $folderFiles = $this->FolderFiles
        ->find()
        ->contain([
            'Folders',
            'Files'
        ]);
    $this->set(compact('folderFiles'));
  }

  public function add()
  {
    $folders_table = TableRegistry::get('Folders');
    $folders = $folders_table->find('list');
    $files_table = TableRegistry::get('Files');
    $files = $files_table->find('list');

    $folderFile = $this->FolderFiles->newEntity();
    if ($this->request->is('post')) {
      $folderFile = $this->FolderFiles->patchEntity($folderFile, $this->request->data);
      $folderFile->created = date("Y-m-d H:i:s");
      $folderFile->modified = date("Y-m-d H:i:s");
      if ($this->FolderFiles->save($folderFile)) {
        $this->Flash->success(__('Your folder-file has been saved.'));
        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__("Unable to add your folder-file."));
    }
    $this->set('folderFile', $folderFile);
    $this->set(compact('folders'));
    $this->set(compact('files'));
  }

  public function edit($id = null)
  {
    $folders_table = TableRegistry::get('Folders');
    $folders = $folders_table->find('list');
    $files_table = TableRegistry::get('Files');
    $files = $files_table->find('list');

    $folderFile = $this->FolderFiles->get($id);
    if ($this->request->is(['post', 'put'])) {
      $folderFile = $this->FolderFiles->patchEntity($folderFile, $this->request->data);
      $folderFile->modified = date("Y-m-d H:i:s");
      if ($this->FolderFiles->save($folderFile)) {
        $this->Flash->success(__('Your folder-file has been updated.'));
        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('Unable to update your folder-file.'));
    }
    $this->set('folderFile', $folderFile);
    $this->set(compact('folders'));
    $this->set(compact('files'));
  }

  public function delete($id)
  {
    $this->request->allowMethod(['post', 'delete']);
    $folderFile = $this->FolderFiles->get($id);
    if ($this->FolderFiles->delete($folderFile)) {
      $this->Flash->success(__('The folder-file with id: {0} has been deleted', h($id)));
      return $this->redirect(['action' => 'index']);
    }
  }
}
