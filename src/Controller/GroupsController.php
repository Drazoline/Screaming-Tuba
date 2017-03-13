<?php
/**
 * Created by PhpStorm.
 * User: 1442000
 * Date: 2017-02-27
 * Time: 10:37
 */
namespace App\Controller;

class GroupsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');
    }

    public function index()
    {
        $groups = $this->Groups->find('all');
        $this->set(compact('groups'));
    }

    public function add()
    {
        $group = $this->Groups->newEntity();
        if ($this->request->is('post')) {
            $group = $this->Groups->patchEntity($group, $this->request->data);
            $group->created = date("Y-m-d H:i:s");
            $group->modified = date("Y-m-d H:i:s");
            if ($this->Groups->save($group)) {
                $this->Flash->success(__('Your group has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your folder.'));
        }
        $this->set('group', $group);
    }
}