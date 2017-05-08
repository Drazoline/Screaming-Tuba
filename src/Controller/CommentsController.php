<?php
/**
 * Created by PhpStorm.
 * User: Yannick Grégoire
 * Date: 2017-03-06
 * Time: 11:17
 */
namespace App\Controller;

use Cake\ORM\TableRegistry;
use Symfony\Component\Console\Helper\Table;


class CommentsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function index()
    {
        $comments = $this->Comments->find('all')
        ->contain([
            'Users',
            'Files'
        ]);;
        $this->set(compact('comments'));
    }

    public function add(){
        $comment = $this->Comments->newEntity();
        if ($this->request->is('post'))
        {
            $comment = $this->Comments->patchEntity($comment, $this->request->data);
            $comment->created = date("Y-m-d H:i:s");
            $comment->modified = date("Y-m-d H:i:s");
            if ($this->Comments->save($comment)) {
                $this->Flash->success(__('Your comment has been saved.'));
                return $this->redirect(['controller' => 'feed','action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your comment. '));
        }
        $this->set('comment', $comment);
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

    public function edit($id = null)
    {
        $comment = $this->Comments->get($id);
        if ($this->request->is(['post','put'])) {
            $comment = $this->Comments->patchEntity($comment, $this->request->data);
            $comment->modified = date("Y-m-d H:i:s");
            if ($this->Comments->save($comment)) {
                $this->Flash->success(__('Your comment has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your comment.'));
        }
        $this->set('comment', $comment);
        $this->getUsers();
        $this->getFiles();

    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $comment= $this->Comments->get($id);
        if ($this->Comments->delete($comment)) {
            $this->Flash->success(__('The comment with id: {0} has been deleted.', h($id
            )));
            return $this->redirect(['action' => 'index']);
        }
    }
}