<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Symphony\Component\Console\Helper\Table;

class UserFileLikesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function index()
    {
        $userFileLikes = $this->UserFileLikes->find('all')
            ->contain(['Users', 'Files']);

        $this->set(compact('userFileLikes'));
    }

    public function add(){
        $userFileLike = $this->UserFileLikes->newEntity();
        if ($this->request->is('post'))
        {
            $userFileLike = $this->UserFileLikes->patchEntity($userFileLike, $this->request->data);
            $userFileLike->created = date("Y-m-d H:i:s");
            $userFileLike->modified = date("Y-m-d H:i:s");
            if ($this->UserFileLikes->save($userFileLike)) {
                $this->Flash->success(__('Your like has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your like.'));
        }
        $this->set('userFileLike', $userFileLike);
        $this->getUsers();
        $this->getFiles();

    }

    private function getUsers()
    {
        $users_table = TableRegistry::get('Users');
        $users = $users_table->find('list');
        $this->set(compact('users'));
    }

    private function getFiles()
    {
        $files_table = TableRegistry::get('Files');
        $files = $files_table->find('list');
        $this->set(compact('files'));
    }


    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user_file_like= $this->Subscriptions->get($id);
        if ($this->UserFileLikes->delete($user_file_like)) {
            $this->Flash->success(__('The like with id: {0} has been deleted.', h($id
            )));
            return $this->redirect(['action' => 'index']);
        }
    }
}