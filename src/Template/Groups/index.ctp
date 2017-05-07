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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <?=$this->Html->script('jquery-3.2.1.min.js') ?>
    <?=$this->Html->script('groups.js') ?>
    <script type="text/javascript">var groupAjaxUrl = '<?= $this->Url->Build(['controller' => 'Groups', 'action' => 'getGroupInfo']) ?>';</script>
    <script type="text/javascript">var fileAjaxUrl = '<?= $this->Url->Build(['controller' => 'Groups', 'action' => 'saveNewFile']) ?>';</script>
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
    <!--Code du feed starts here-->
        <div class="file_list">
            <?php
            $sql_groups = "SELECT groups.id FROM groups JOIN group_users ON groups.id = group_users.group_id JOIN users ON users.id = group_users.user_id WHERE users.id = $currentUser";
            $sth = $db->query($sql_groups);
            if(mysqli_num_rows($sth)!=0):
                $counter = 0;
                $sql = "SELECT files.id AS FileID, files.title, files.filename, files.filesize, files.filemime, groups.id, groups.name, groups.filename AS GroupsImage, groups.filesize, groups.filemime, users.id, users.username, users.user_image 
                      FROM files JOIN groups ON groups.id = files.group_id JOIN users ON files.user_id = users.id WHERE";
                while ($rowData = mysqli_fetch_assoc($sth)):
                    if ($counter != 0):
                        $sql .= ' OR';
                    endif;
                    $sql .= ' files.group_id = ' . $rowData["id"];
                    $counter += 1;
                endwhile;
                $sth = $db->query($sql);
                while ($rowData = mysqli_fetch_assoc($sth)):?>
                    <div class="feedfile">
                        <div class="file">
                            <?php
                            if($rowData['user_image'] == "") :?>
                                <?php echo $this->Html->image('../webroot/img/profile/profile.jpg', array('class' => 'smallimg')); ?>

                            <?php else:?>
                                <?php echo $this->Html->image('../webroot/img/profile/'.$rowData['user_image'], array('class' => 'smallimg')); ?>

                            <?php endif ?>
                            <h3><?php echo $rowData['username']." posted ".$rowData['title']." in ".$rowData['name']; ?></h3>
                            <?php
                            if($rowData['GroupsImage'] == "") :?>
                                <?php echo $this->Html->image('../webroot/img/groups/profile.jpg', array('class' => 'smallimg')); ?>

                            <?php else:?>
                                <?php echo $this->Html->image('../webroot/img/groups/'.$rowData['GroupsImage'], array('class' => 'smallimg')); ?>

                            <?php endif ?>
                        </div>
                        <div class="comment_section">
                            <div class="comment_writer">
                                <?= $this->Form->create('comment', ['url' => ['controller' => 'Comments', 'action' => 'add']]) ?>
                                <fieldset class="comment_form">
                                    <?= $this->Form->input( 'text', array('class' => 'comment_text', 'label' => '')); ?>
                                    <?= $this->Form->input('file_id', array('type' => 'hidden', 'value' => $rowData['FileID'])); ?>
                                    <?= $this->Form->input('user_id', array('type' => 'hidden', 'value' => $currentUser)); ?>
                                    <?= $this->Form->button(__('Save Comment'));?>
                                </fieldset>
                                <?= $this->Form->end() ?>
                            </div>
                            <?php $id = $rowData['FileID'];
                            $sql_comments = "SELECT comments.text, users.id, users.username, users.user_image FROM comments JOIN users ON users.id = comments.user_id WHERE comments.file_id = $id";
                            $sth_comments = $db->query($sql_comments);
                            if(mysqli_num_rows($sth_comments)!=0):
                                while ($rowData_comments = mysqli_fetch_assoc($sth_comments)):?>
                                    <div class="comment">
                                        <?php
                                        if($rowData['user_image'] == "") :?>
                                            <?php echo $this->Html->image('../webroot/img/profile/profile.jpg', array('class' => 'smallimg')); ?>

                                        <?php else:?>
                                            <?php echo $this->Html->image('../webroot/img/profile/'.$rowData['user_image'], array('class' => 'smallimg')); ?>

                                        <?php endif ?>
                                        <h4><?php echo $rowData_comments['text'];?></h4>
                                    </div>
                                    <?php
                                endwhile;
                            else:
                                echo "No comments";
                            endif;?>
                        </div>
                    </div>
                <?php endwhile;
            else:?>
                <p> No Files Posted</p>
            <?php endif;?>
        </div>
    </div>
</div>
</body>
</html>
