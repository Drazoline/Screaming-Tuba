<?php
namespace App\Controller;
/**
 * Created by PhpStorm.
 * User: Mathieu
 * Date: 5/7/2017
 * Time: 3:17 PM
 */
class searchController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');
    }

    public function search($search_term){
        $db =  mysqli_connect("localhost","root","","screaming_db");
        $requete_users = "SELECT id, username, email, first_name, last_name, birthdate, user_image FROM users WHERE username LIKE '". $search_term . "'";
        $requete_groups = "SELECT id, groups.name, user_id, filename, filesize, filemime FROM groups WHERE groups.name LIKE '". $search_term . "'";
        $requete_files = "SELECT files.id, files.user_id AS FileUserID, files.group_id AS FileGroupID, files.title AS Title, files.filename, groups.filename AS GroupFilename, users.user_image AS UserImage, users.username AS Username, groups.name AS GroupName FROM files JOIN users ON files.user_id = users.id JOIN groups ON files.group_id = groups.id WHERE files.title LIKE '". $search_term . "'";
        $sth_users = $db->query($requete_users);
        $sth_groups = $db->query($requete_groups);
        $sth_files = $db->query($requete_files);
        $this->set(compact('sth_users'));
        $this->set(compact('sth_groups'));
        $this->set(compact('sth_files'));

    }
}