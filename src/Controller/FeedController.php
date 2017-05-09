<?php
namespace App\Controller;
/**
 * Created by PhpStorm.
 * User: Yannick
 * Date: 08/05/2017
 * Time: 03:08 PM
 */
class FeedController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');
    }
    public function index()
    {
        $currentUser = $this->Auth->user('id');
        $this->set(compact('currentUser'));
        $db = mysqli_connect("localhost", "root", "", "screaming_db");
        $this->set(compact('db'));

        $sql_groups = "SELECT groups.id FROM groups JOIN group_users ON groups.id = group_users.group_id JOIN users ON users.id = group_users.user_id WHERE users.id = $currentUser";
        $sth_groups = $db->query($sql_groups);
        $this->set(compact('sth_groups'));
        if (mysqli_num_rows($sth_groups) != 0){
            $counter = 0;
            $sql = "SELECT files.id AS FileID, files.title, files.filename, files.filesize, files.filemime, groups.id AS GroupID, groups.name, groups.filename AS GroupsImage, groups.filesize, groups.filemime, users.id AS UserID, users.username, users.user_image 
                      FROM files JOIN groups ON groups.id = files.group_id JOIN users ON files.user_id = users.id WHERE";
            while ($rowData = mysqli_fetch_assoc($sth_groups)) {
                if ($counter != 0) {
                    $sql .= ' OR';
                }
                $sql .= ' files.group_id = ' . $rowData["id"];
                $counter += 1;
            }
            $sql .= ' ORDER BY files.id DESC';
            $sth = $db->query($sql);
            $this->set(compact('sth'));
        }
        if($this->request->is('post')){
            $this->redirect(['controller' => 'search','action' => 'search', $this->request->data('search')]);
        }
    }
}