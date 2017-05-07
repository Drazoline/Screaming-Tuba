<?php
/**
 * Created by PhpStorm.
 * User: 1442000
 * Date: 2017-02-27
 * Time: 10:37
 */
namespace App\Controller;

use Cake\ORM\TableRegistry;

class GroupUsersController extends AppController
{
    public function index()
    {
        $groupUsers = $this->GroupUsers->find('all');
        $this->set(compact('groupUsers'));
    }

    public function add() {
      $groups_table = TableRegistry::get('Groups');
      $groups = $groups_table->find('list');
      $users_table = TableRegistry::get('Users');
      $users = $users_table->find('list');

      $groupUser = $this->GroupUsers->newEntity();

      if ($this->request->is('post')) {
        $groupUser = $this->GroupUsers->patchEntity($groupUser, $this->request->data);
        $groupUser->created = date("Y-m-d H:i:s");
        $groupUser->modified = date("Y-m-d H:i:s");
        if ($this->GroupUsers->save($groupUser)) {
          $this->Flash->success(__('Your user has been saved.'));
          return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('Unable to add your user.'));
      }
      $this->set('groupUser', $groupUser);
      $this->set(compact('groups'));
      $this->set(compact('users'));
    }
}
