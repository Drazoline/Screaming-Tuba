<?php
/**
 * Created by PhpStorm.
 * User: 1442000
 * Date: 2017-02-27
 * Time: 10:37
 */
namespace App\Controller;

class PermGroupUsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function index()
    {
        $permGroupUsers = $this->PermGroupUsers->find('all')
        ->contain([
            'GroupUsers',
            'Permissions'
        ]);;
        $this->set(compact('permGroupUsers'));
    }

    public function add()
    {
        $permGroupUser = $this->PermGroupUsers->newEntity();
        if ($this->request->is('post')) {
            $permGroupUser = $this->Groups->patchEntity($permGroupUser, $this->request->data);
            $permGroupUser->created = date("Y-m-d H:i:s");
            $permGroupUser->modified = date("Y-m-d H:i:s");
            if ($this->PermgroupUsers->save($permGroupUser)) {
                $this->Flash->success(__('Your permission for the user in your group has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your permission for the user in your group.'));
        }
        $this->setPermissions();
        $this->setGroupUsers();
        $this->set('permGroupUser', $permGroupUser);
    }

    private function setPermissions()
    {
      $permissions_table = TableRegistry::get('Permissions');
      $permissions = $permissions_table->find('list');
      $this->set(compact('permissions'));
    }

    private function setGroupUsers()
    {
      $group_users_table = TableRegistry::get('GroupUsers');
      $group_users = $group_users_table->find('list');
      $this->set(compact('group_users'));
    }

    public function edit($id = null)
    {
        $permGroupUser = $this->PermGroupUsers->get($id);
        if ($this->request->is(['post','put'])) {
            $permGroupUser = $this->PermGroupUsers->patchEntity($permGroupUser, $this->request->data);
            $permGroupUser->modified = date("Y-m-d H:i:s");
            if ($this->PermGroupUsers->save($permGroupUser)) {
                $this->Flash->success(__('Your permission for the user has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your permission for this user.'));
        }
        $this->setPermissions();
        $this->setGroupUsers();
        $this->set('permGroupUser', $permGroupUser);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $permGroupUser= $this->PermGroupUsers->get($id);
        if ($this->PermGroupUsers->delete($permGroupUser)) {
            $this->Flash->success(__('The permission with id: {0} for this user has been deleted.', h($id
            )));
            return $this->redirect(['action' => 'index']);
        }
    }
}
