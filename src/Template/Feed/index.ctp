<?php
/**
 * Created by PhpStorm.
 * User: Yannick Grégoire
 * Date: 08/05/2017
 * Time: 03:20 PM
 */
$pageTitle = 'Screaming Tuba';
$this->layout = false;
?>

<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?= $pageTitle ?>
            <?= $this->fetch('title') ?>
        </title>
        <?= $this->Html->meta('icon') ?>
        <?=$this->Html->css('feed.css') ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
<body>
<div class="contents">
    <div class="file_list">
        <?php
        if(mysqli_num_rows($sth)!=0):
            while ($rowData = mysqli_fetch_assoc($sth)):?>
                <div class="feedfile">
                    <div class="file">
                        <h3>
                            <?php
                            if($rowData['user_image'] == "") :?>
                                <?php echo $this->Html->link($this->Html->image('../webroot/img/profile/user_default.png', array('class' => 'smallimg')), ['controller' => 'users','action' => 'display_user', $rowData['UserID']], array('escape' => false)); ?>
                            <?php else:?>
                                <?php echo $this->Html->link($this->Html->image('../webroot/img/profile/'.$rowData['user_image'], array('class' => 'smallimg')), ['controller' => 'users','action' => 'display_user', $rowData['UserID']], array('escape' => false)); ?>
                            <?php endif ?>
                            <?php echo $rowData['username']." posted ".$rowData['title']." in ".$rowData['name']; ?>
                            <?php
                            if($rowData['GroupsImage'] == "") :?>
                                <?php echo $this->Html->link($this->Html->image('../webroot/img/groups/group_default.png', array('class' => 'smallimg')), ['controller' => 'users','action' => 'display_user', $rowData['GroupID']], array('escape' => false)); ?>
                            <?php else:?>
                                <?php echo $this->Html->link($this->Html->image('../webroot/img/groups/'.$rowData['GroupsImage'], array('class' => 'smallimg')), ['controller' => 'users','action' => 'display_user', $rowData['GroupID']], array('escape' => false)); ?>
                            <?php endif ?>
                        </h3>
                        <?php
                        $sql_file_likes = "SELECT id FROM user_file_likes WHERE user_file_likes.user_id = $currentUser AND user_file_likes.file_id = ".$rowData['FileID'];
                        $sth_file_likes = $db->query($sql_file_likes);
                        if(mysqli_num_rows($sth_file_likes)!=0): ?>
                            <?=$this->Form->create(NULL, ['type'=>'post'])?>
                            <?=$this->Form->button($this->Html->image('../webroot/img/unlit.png', ['class'=>'imgLit']),['type' => 'submit', 'name' => 'btnLit'.$rowData['FileID'], 'class' => 'btnLit', 'id' => 'btnLit'.$rowData['FileID']])?>
                            <?=$this->Form->end()?>
                        <?php else:?>
                            <?=$this->Form->create(NULL, ['type'=>'post'])?>
                            <?=$this->Form->button($this->Html->image('../webroot/img/lit.png', ['class'=>'imgLit']),['type' => 'submit', 'name' => 'btnLit'.$rowData['FileID'], 'class' => 'btnLit', 'id' => 'btnLit'.$rowData['FileID']])?>
                            <?=$this->Form->end()?>
                        <?php endif;

                        if(isset($_POST['btnLit'.$rowData['FileID']]))
                        {
                            if(mysqli_num_rows($sth_file_likes)!=0){
                                $sql = "DELETE FROM user_file_likes WHERE user_file_likes.user_id = $currentUser AND user_file_likes.file_id = ".$rowData['FileID'];
                                $db->query($sql);
                            }
                            Else{
                                $sql = "INSERT INTO user_file_likes VALUES (DEFAULT, $currentUser, ".$rowData['FileID'].")";
                                $db->query($sql);
                            }
                            header("Refresh:0");
                        }?>
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
                        $sql_comments = "SELECT comments.text, users.id, users.username, users.user_image FROM comments JOIN users ON users.id = comments.user_id WHERE comments.file_id = $id ORDER BY comments.id DESC";
                        $sth_comments = $db->query($sql_comments);
                        if(mysqli_num_rows($sth_comments)!=0):
                            while ($rowData_comments = mysqli_fetch_assoc($sth_comments)):?>
                                <div class="comment">
                                    <h4>
                                        <?php
                                        if($rowData_comments['user_image'] == "") :?>
                                            <?php echo $this->Html->link($this->Html->image('../webroot/img/profile/user_default.png', array('class' => 'smallimg commentimg')), ['controller' => 'users','action' => 'display_user', $rowData_comments['id']], array('escape' => false)); ?>

                                        <?php else:?>
                                            <?php echo $this->Html->link($this->Html->image('../webroot/img/profile/'.$rowData_comments['user_image'], array('class' => 'smallimg commentimg')), ['controller' => 'users','action' => 'display_user', $rowData_comments['id']], array('escape' => false)); ?>

                                        <?php endif ?>
                                        <?php echo $rowData_comments['text'];?>
                                    </h4>
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
</body>
</html>
