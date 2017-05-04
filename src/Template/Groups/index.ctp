<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$pageTitle = 'Screaming Tuba';
$this->layout = false;
$db =  mysqli_connect("localhost","root","","screaming_db");
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $pageTitle ?>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?=$this->Html->css('groups.css') ?>
    <?=$this->Html->script('jquery-3.2.1.min.js') ?>
    <?=$this->Html->script('groups.js') ?>
    <script type="text/javascript">var groupAjaxUrl = '<?= $this->Url->Build(['controller' => 'Groups', 'action' => 'getGroupInfo']) ?>';</script>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>
<body>
<div class="menus">
    <a>
        Welcome <br>
        <?php echo $this->request->session()->read('Auth.User.username') ?><br><br>
    </a>
    <a>
        My account<br>
    </a>
    <a>
        Upload<br>
    </a>
    <a>
        Following<br>
    </a>
</div>
<div
    class="row">


    <div class="groups">
        <a id="title-center" style="align-content: center; text-align: center;">Groups</a>

        <?php
        if(!empty($groups)): foreach($groups as $group): ?>
            <a>
                <div class="group">
                    <?php  echo $this->Html->image('../webroot/img/groups/'.$group->filename, array('class' => 'img-circle', 'id' => 'img-group-'.$group->id)); ?>
                    <!--<p style=" margin:auto;"> <?php echo $group->name; ?></p>-->
                </div>
            </a>
            <?php
        endforeach;

        else: ?>
            <a style="display:block;text-align:center">You have no groups</a>
        <?php endif; ?>
        <?php echo $this->Html->link(
        $this->Html->image('../webroot/img/add_icon.png', array('class' => 'img-circle')), ['action' => 'add'], array('escape' => false)
        ); ?>
    </div>

    <div id="contents">
    <!--<!--Code du feed starts here-->
    <?php
/*        $currentUser = $this->Auth->user('id');
        $sql_groups = "SELECT groups.id FROM groups JOIN group_users ON groups.id = group_users.group_id JOIN users ON users.id = group_users.user_id WHERE users.id = $currentUser";
        $sth = $db->query($sql_groups);
        if(mysqli_num_rows($sth)!=0){
            $counter = 0;
            $sql = "SELECT files.id, files.title, files.filename, files.filesize, files.filemime, groups.id, groups.name, groups.filename, groups.filesize, groups.filemime, users.id, users.username, users.user_image 
              FROM files JOIN groups ON groups.id = files.group_id, JOIN users ON files.user_id = users.id WHERE";
            while ($rowData = mysqli_fetch_assoc($sth)){
                if ($counter != 0){
                    $sql = $sql + ' AND';
                }
                $sql = $sql + ' files.group_id = ' + $rowData["id"];
                $counter += 1;
            }
            $sth = $db->query($sql);
            while ($rowData = mysqli_fetch_assoc($sth)):*/?>
                <!--Code d'affichage d'une file dans le feed here-->
                <?/*= $this->Form->create($comment) */?>
                <fieldset class="comment_form">
                    <?/*= $this->Form->input('text') */?>
                    <?/*= $this->Form->input('file_id', array('type' => 'hidden'), array('value' => $rowData->id)) */?>
                    <?/*= $this->Form->input('user_id', array('type' => 'hidden'), array('value' => $currentUser)) */?>
                </fieldset>
                <button type="submit" class="btn-info btn-save" ><?/*= __('Save Comment') */?></button>
                <?/*= $this->Form->end() */?>
            <?php /*$sql_comments = "SELECT comments.text, users.id, users.username, users.user_image FROM comments JOIN users ON users.id = comments.user_id WHERE comments.file_id = $rowData->id";
                    $sth_comments = $db->query($sql_comments);
                    while ($rowData_comments = mysqli_fetch_assoc($sth_comments)):*/?>

                        --><?php
/*                    endwhile;
            endwhile;

        }

    */?>
    </div>
</div>
</body>
</html>
