<?php
$pageTitle = 'Screaming Tuba : '.$user->username;
$this->layout = false;
$db =  mysqli_connect("localhost","root","","screaming_db");
?>
<html>
<!DOCTYPE html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $pageTitle ?>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?=$this->Html->css('display_user.css') ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<div class="User">
    <div id="Title" class="header">
        <?php
        if($user['user_image'] == "") :?>
            <?php echo $this->Html->image('../webroot/img/profile/profile.jpg', array('class' => 'bigimg')); ?>

        <?php else:?>
            <?php echo $this->Html->image('../webroot/img/profile/'.$user->user_image, array('class' => 'bigimg')); ?>

        <?php endif ?>
        <h1 class="Username" style="display:block;text-align:center"><?php echo $user->username ?></h1>

        <?php if($currentUser == $user->id) :?>
        <?=$this->Html->link($this->Html->image('../webroot/img/settings.png', array('class' => 'settings')), ['action' => 'edit', $user->id], array('escape' => false));?>
        <?php else:?>
            <?php
            $sql = "SELECT id FROM subscriptions WHERE subscriptions.user_id = $currentUser AND subscriptions.target_id = $user->id";
            $sth = $db->query($sql);
            if(mysqli_num_rows($sth)!=0){
                echo "<form action='' method='post'> <input type='submit' name='btnSubscribe' value='Unsubscribe' class='btn-danger subscribe' id='btnSubscribe'/> </form>";
            }
            else{
                echo "<form action='' method='post'> <input type='submit' name='btnSubscribe' value='Subscribe' class='btn-info subscribe' id='btnSubscribe'/> </form>";
            }

            if(isset($_POST['btnSubscribe']))
            {
                $sql = "SELECT id FROM subscriptions WHERE subscriptions.user_id = $currentUser AND subscriptions.target_id = $user->id";
                $sth = $db->query($sql);
                if(mysqli_num_rows($sth)!=0){
                    $sql = "DELETE FROM subscriptions WHERE subscriptions.user_id = $currentUser AND subscriptions.target_id = $user->id";
                    $db->query($sql);
                }
                Else{
                    $sql = "INSERT INTO subscriptions VALUES (DEFAULT, $currentUser, $user->id)";
                    $db->query($sql);
                }
                header("Refresh:0");
            }
        endif ?>
    </div>
    <div class="main_display">
        <div class="row">
            <div class="top_left">
                <h4> Groups </h4>
                <div class="scrolllist">
                    <?php $sql = "SELECT groups.id, groups.name, groups.filename FROM groups JOIN group_users ON groups.id = group_users.group_id WHERE group_users.user_id = $user->id";
                    $sth = $db->query($sql);
                    if(mysqli_num_rows($sth)!=0): while($rowData = mysqli_fetch_assoc($sth)): ?>
                        <?php
                        if($rowData['filename'] == "") :?>
                            <?=$this->Html->Link($this->Html->image('../webroot/img/profile/profile.jpg', array('class' => 'smallimg')), ['action' => 'groups', $rowData['id']], array('escape' => false)); ?>

                        <?php else:?>
                            <?=$this->Html->Link($this->Html->image('../webroot/img/profile/'.$rowData['filename'], array('class' => 'smallimg')), ['action' => 'groups', $rowData['id']], array('escape' => false)); ?>

                        <?php endif ?>
                    <?php endwhile; ?>
                    <?php else: ?>
                        <p> No groups</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="top_right">
                <h4> Subscribers </h4>
                <div class="scrolllist">
                    <?php $sql = "SELECT users.id, users.username, users.user_image FROM users JOIN subscriptions ON users.id = subscriptions.user_id WHERE subscriptions.target_id = $user->id";
                    $sth = $db->query($sql); if(mysqli_num_rows($sth)!=0): while($rowData = mysqli_fetch_assoc($sth)): ?>
                        <?php
                        if($rowData['user_image'] == "") :?>
                            <?= $this->Html->link($this->Html->image('../webroot/img/profile/profile.jpg', array('class' => 'smallimg')), ['action' => 'display_user', $rowData['id']], array('escape' => false)); ?>

                        <?php else:?>
                            <?=$this->Html->link($this->Html->image('../webroot/img/profile/'.$rowData['user_image'], array('class' => 'smallimg')), ['action' => 'display_user', $rowData['id']], array('escape' => false)); ?>

                        <?php endif ?>
                    <?php endwhile; ?>
                    <?php else: ?>
                        <p> No subscribers</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="bottom_left">
                <h4>Lits</h4>
                <div class="scrolllist">
                    <?php $sql = "SELECT DISTINCT files.id, files.title, (SELECT COUNT(user_file_likes.id) FROM user_file_likes WHERE file_id = files.id) AS countLikes FROM files JOIN user_file_likes ON user_file_likes.file_id = files.id WHERE files.user_id = $user->id ORDER BY countLikes";
                    $sth = $db->query($sql); if(mysqli_num_rows($sth)!=0): while($rowData = mysqli_fetch_assoc($sth)): ?>
                        <p><?php echo $rowData['title'];?></p>
                        <p><?php echo $rowData['countLikes'];?></p>
                    <?php endwhile; ?>
                    <?php else: ?>
                        <p> No files lit</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="bottom_right">
                <h4> Subscriptions </h4>
                <div class="scrolllist">
                    <?php $sql = "SELECT users.id, users.username, users.user_image FROM users JOIN subscriptions ON users.id = subscriptions.target_id WHERE subscriptions.user_id = $user->id";
                    $sth = $db->query($sql); if(mysqli_num_rows($sth)!=0): while($rowData = mysqli_fetch_assoc($sth)): ?>
                        <?php
                        if($rowData['user_image'] == "") :?>
                            <?=$this->Html->link($this->Html->image('../webroot/img/profile/profile.jpg', array('class' => 'smallimg')), ['action' => 'display_user', $rowData['id']], array('escape' => false)); ?>

                        <?php else:?>
                            <?=$this->Html->link($this->Html->image('../webroot/img/profile/'.$rowData['user_image'], array('class' => 'smallimg')), ['action' => 'display_user', $rowData['id']], array('escape' => false)); ?>

                        <?php endif ?>
                    <?php endwhile; ?>
                    <?php else: ?>
                        <p> No subscriptions</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
