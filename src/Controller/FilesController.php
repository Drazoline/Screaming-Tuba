<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Symfony\Component\Console\Helper\Table;

class FilesController extends AppController
{
  public function initialize()
  {
    parent::initialize();
    $this->loadComponent('Flash');
  }

  public function index()
  {
    $files = $this->Files->find('all')
    ->contain([
        'Users'
    ]);;
    $this->set(compact('files'));
  }

  public function add()
  {
      $file = $this->Files->newEntity();

      if ($this->request->is('post')) {
          $file = $this->Files->patchEntity($file, $this->request->data);

            $data_info = $this->request->data['data'];
            $fichier = fopen($data_info['tmp_name'], 'r');
            if ($fichier)
            {
                $contenu = fread($fichier, $data_info['size']);
                fclose($fichier);
                $file->data = $contenu;
                $file->mime = $data_info['type'];
            }

          $file->created = date("Y-m-d H:i:s");
          $file->modified = date("Y-m-d H:i:s");

          if ($this->Files->save($file)) {
              $this->Flash->success(__('Your file has been saved.'));
              return $this->redirect(['action' => 'index']);
          }
          $this->Flash->error(__('Unable to add your file.'));
      }
      $this->set('file', $file);
      $this->getUsers();
  }

  public function media($id)
  {
      $users_table = TableRegistry::get('Files');
      $file = $users_table->get($id);

      $this->autoRender = false;
      $this->response->type($file->mime);
      $this->response->body(stream_get_contents($file->data));
  }

  private function getUsers()
  {
    $users_table = TableRegistry::get('Users');
    $users = $users_table->find('list');
    $this->set(compact('users'));
  }

  public function edit($id = null)
  {
    $file = $this->Files->get($id);
    if ($this->request->is(['post', 'put'])) {
      $file = $this->Files->patchEntity($file, $this->request->data);
      $file->modified = date("Y-m-d H:i:s");
      if ($this->Files->save($file)) {
        $this->Flash->success(__('Your file has been updated.'));
        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('Unable to update your file.'));
    }
    $this->set('file', $file);
    $this->getUsers();
  }

  public function delete($id)
  {
    $this->request->allowMethod(['post', 'delete']);
    $file = $this->Files->get($id);
    if ($this->Files->delete($file)) {
      $this->Flash->success(__('The file with id: {0} has been deleted', h($id)));
      return $this->redirect(['action' => 'index']);
    }
  }
}
