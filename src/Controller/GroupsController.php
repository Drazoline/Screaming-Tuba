<?php
/**
 * Created by PhpStorm.
 * User: 1442000
 * Date: 2017-02-27
 * Time: 10:37
 */
namespace App\Controller;
use Cake\Datasource\ConnectionManager;

class GroupsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');
    }

    public function index()
    {

        $groups = $this->Groups->find('all', array(
            'conditions' => array('Groups.user_id' => $this->Auth->user('id'))
        ));

        $query = $this->Groups->find('all')
            ->where(['user_id' => $this->Auth->user('id')]);
        $this->set(compact('groups'));
        $defaultGroupId = $query->first();
        $this->set(compact('defaultGroupId'));
        $currentUser = $this->Auth->user('id');
        $this->set(compact('currentUser'));
        if($this->request->is('post')){
            $this->redirect(['controller' => 'search','action' => 'search', $this->request->data('search')]);
        }

        $query2 = $this->Groups->find()
            ->innerJoinWith('GroupUsers', function ($q) {
                return $q->where(['GroupUsers.user_id' => $this->Auth->user('id')]);
            });

        $this->set(compact('query2'));
    }

    public function getGroupInfo($groupId)
    {
        //if ($this->request->is('ajax')) {
            $group = $this->Groups->get($groupId);
       // }
        $this->set('group', $group);
        //$this->loadModel('GroupUsers');
        $this->loadModel('Users');
        $this->loadModel('Files');
        $this->loadModel('GroupUsers');

        $query = $this->Users->find();
        $query->innerJoinWith('GroupUsers', function ($q) use ($groupId) {
            return $q->where(['GroupUsers.group_id' => $groupId]);
        });

        $files = $this->Files->find()
            ->select(['username' => 'users.username'])
            ->select($this->Files)
            ->contain(['Users'])
            ->where(['group_id =' => $groupId]);


        $query4 = $this->GroupUsers->find()
            ->select(['GroupUsers.user_id'])
            ->where([
            'GroupUsers.group_id ' => $groupId
        ]);

        $query3 = $this->Users->find('list')->where([
            'Users.id !=' => $this->Auth->user('id')
        ])->where([
            'Users.id NOT IN' => $query4
        ])->where([
            'Users.id !=' => $group->user_id
        ]);

        $this->set('groupquery', $query4);

        $this->set('userQuery', $query3);
        $this->set('userid', $this->Auth->user('id'));
        $this->set('groupid', $groupId);
        $this->set('results', $query);
        $this->set('files', $files);
    }

    public function add()
    {
        $group = $this->Groups->newEntity();
        if ($this->request->is('post')) {
            //uploadstart
            $file = $this->request->data['fileExt']; //put the data into a var for easy use

            $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
            $arr_ext = array('jpg', 'jpeg', 'png'); //set allowed extensions
            $setNewFileName = time() . "_" . rand(000000, 999999);

            if (in_array($ext, $arr_ext)) {
                //do the actual uploading of the file. First arg is the tmp name, second arg is
                //where we are putting it
                move_uploaded_file($file['tmp_name'], WWW_ROOT . '/img/groups/' . $setNewFileName . '.' . $ext);

                //prepare the filename for database entry
                $imageFileName = $setNewFileName . '.' . $ext;
           }
            //uploadend

            $group = $this->Groups->patchEntity($group, $this->request->data);
            $group->created = date("Y-m-d H:i:s");
            $group->modified = date("Y-m-d H:i:s");
            $group->filename= $imageFileName;
            //Valeur a remplacer par l'id de l'utilisateur courrant.
            $group->user_id = $this->Auth->user('id');
            if ($this->Groups->save($group)) {
                //$this->Flash->success(__('Your group has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            //$this->Flash->error(__('Unable to add your folder.'));
        }
        $this->set('group', $group);
    }

    public function saveNewFile()
    {
        $this->loadModel('Files');
        $fileAdd = $this->Files->newEntity();
        $status = 'failure';
        if ($this->request->is('post')) {
            //uploadstart
            $file = $this->request->data['fileExt']; //put the data into a var for easy use
            if($file['tmp_name'] !== '') {
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $arr_ext = array('jpg', 'jpeg', 'png', 'pdf', 'html', 'mp3', 'flac', 'wav'); //set allowed extensions
                $setNewFileName = time() . "_" . rand(000000, 999999);

                if (in_array($ext, $arr_ext)) {
                    //do the actual uploading of the file. First arg is the tmp name, second arg is
                    //where we are putting it
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . '/files/' . $setNewFileName . '.' . $ext);

                    //prepare the filename for database entry
                    $imageFileName = $setNewFileName . '.' . $ext;
                    $fileAdd = $this->Files->patchEntity($fileAdd, $this->request->data);
                    $fileAdd->org_filename = $file['name'];
                    $fileAdd->filesize = $file['size'];
                    $fileAdd->filemime = $file['type'];
                    $fileAdd->created = date("Y-m-d H:i:s");
                    $fileAdd->modified = date("Y-m-d H:i:s");
                    $fileAdd->filename = $imageFileName;
                    $this->Files->save($fileAdd);
                    $status = 'success';
                    $this->set('fileAdd', $fileAdd);
                    $this->set('username', $this->Auth->user('username'));

                } else {
                    $status = 'wrongfiletype';
                }
            }
        }
        $this->set('status', $status);
    }

    public function addUser(){
        $this->loadModel('GroupUsers');
        $groupAdd = $this->GroupUsers->newEntity();
        $groupAdd = $this->GroupUsers->patchEntity($groupAdd, $this->request->data);
        $this->loadModel('Users');
        $user =$this->Users->get($this->request->data['user_id']);
        $this->set('user', $user);
        $this->GroupUsers->save($groupAdd);
    }


    public function edit($id = null)
    {
        $group = $this->Groups->get($id);
        if ($this->request->is(['post', 'put'])) {
            $group = $this->Groups->patchEntity($group, $this->request->data);
            $group->modified = date("Y-m-d H:i:s");
            if ($this->Groups->save($group)) {
                //$this->Flash->success(__('Your group has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            //$this->Flash->error(__('Unable to update your group.'));
        }
        $this->set('group', $group);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $group = $this->Groups->get($id);
        if ($this->Groups->delete($group)) {
            //$this->Flash->success(__('The group with id: {0} has been deleted', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }
}
