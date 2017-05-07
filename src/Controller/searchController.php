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
        $requete_files = "SELECT id, user_id, group_id, title, filename FROM files WHERE files.title LIKE '". $search_term . "'";
        $sth_users = $db->query($requete_users);
        $sth_groups = $db->query($requete_groups);
        $sth_files = $db->query($requete_files);
        $this->set(compact('sth_users'));
        $this->set(compact('sth_groups'));
        $this->set(compact('sth_files'));

    }
}