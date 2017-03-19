<?php
/**
 * Created by PhpStorm.
 * User: 1442000
 * Date: 2017-02-27
 * Time: 10:37
 */
namespace App\Controller;

class PermissionsController extends AppController
{
  public function initialize()
  {
      parent::initialize();
      $this->loadComponent('Flash');
  }

    public function index()
    {
        $permissions = $this->Permissions->find('all');
        $this->set(compact('permissions'));
    }

    public function add()
    {
        $permission = $this->Permissions->newEntity();
        if ($this->request->is('post')) {
            $permission = $this->Permissions->patchEntity($permission, $this->request->data);
            $permission->created = date("Y-m-d H:i:s");
            $permission->modified = date("Y-m-d H:i:s");
            if ($this->Permissions->save($permission)) {
                $this->Flash->success(__('Your permission has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your permission.'));
        }
        $this->set('permission', $permission);
    }

    public function edit($id = null)
    {
      $permission = $this->Permissions->get($id);
      if ($this->request->is(['post', 'put'])) {
        $permission = $this->Permissions->patchEntity($permission, $this->request->data);
        $permission->modified = date("Y-m-d H:i:s");
        if ($this->Permissions->save($permission)) {
          $this->Flash->success(__('Your permission has been updated.'));
          return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('Unable to update your permission.'));
      }
      $this->set('permission', $permission);
    }

    public function delete($id)
    {
      $this->request->allowMethod(['post', 'delete']);
      $permission = $this->Permissions->get($id);
      if ($this->Permissions->delete($permission)) {
        $this->Flash->success(__('The permission with id: {0} has been deleted', h($id)));
        return $this->redirect(['action' => 'index']);
      }
    }
}
