<?php
/**
 * Created by PhpStorm.
 * User: 1442000
 * Date: 2017-02-27
 * Time: 10:37
 */
namespace App\Controller;

class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');
    }

    public function index()
    {
        $users = $this->Users->find('all');
        $this->set(compact('users'));
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->created = date("Y-m-d H:i:s");
            $user->modified = date("Y-m-d H:i:s");
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Your user has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your user.'));
        }
        $this->set('user', $user);
    }
}