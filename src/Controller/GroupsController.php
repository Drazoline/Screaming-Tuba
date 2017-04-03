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

    private $current_user_id = 1;
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');
    }

    public function index()
    {
        $groups = $this->Groups->find('all', array(
            'conditions' => array('Groups.user_id' => $this->current_user_id)
        ));
        $this->set(compact('groups'));
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
            $group->user_id = $this->current_user_id;
            if ($this->Groups->save($group)) {
                //$this->Flash->success(__('Your group has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            //$this->Flash->error(__('Unable to add your folder.'));
        }
        $this->set('group', $group);
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
