<?php
$pageTitle = 'Screaming Tuba : '.$user->username;
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
            <div class="circleborder"><?php echo $this->Html->image('../webroot/img/profile/profile.jpg'); ?></div>

        <?php else:?>
            <div class="circleborder"><?php echo $this->Html->image('../webroot/img/profile/'.$user->user_image); ?></div>

        <?php endif ?>
        <h1 class="Username" style="display:block;text-align:center"><?php echo $user->username ?></h1>
        <!--<a><?/*= $this->Html->link( ($this->Html->image('../webroot/img/Settings.png')), ['action' => 'edit', $user->id]) */?></a>-->
        <?php

/*            if( ){

            }
        echo $_SESSION['USERID']*/?>
    </div>
    <div class="main_display">
        <div class="row">
            <div class="top_left">
                <h4> Groups </h4>
                <div class="pre-scrollable">
                    <?php $sql = "SELECT groups.name FROM groups JOIN group_users ON groups.id = group_users.group_id WHERE group_users.user_id = $user->id";
                    $sth = $db->query($sql);
                    if(mysqli_num_rows($sth)!=0): while($rowData = mysqli_fetch_assoc($sth)): ?>
                        <p><?php echo $rowData['name'] ?></p>
                    <?php endwhile; ?>
                    <?php else: ?>
                        <p> No groups</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="top_right">
                <h4> Subscribers </h4>
                <div class="pre-scrollable">
                    <?php $sql = "SELECT users.username FROM users JOIN subscriptions ON users.id = subscriptions.user_id WHERE subscriptions.target_id = $user->id";
                    $sth = $db->query($sql); if(mysqli_num_rows($sth)!=0): while($rowData = mysqli_fetch_assoc($sth)): ?>
                        <p><?php echo $rowData['username'] ?></p>
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
                <div class="pre-scrollable">
                    <?php $sql = "SELECT files.title FROM files JOIN user_file_likes ON user_file_likes.file_id = files.id WHERE user_file_likes.user_id = $user->id";
                    $sth = $db->query($sql); if(mysqli_num_rows($sth)!=0): while($rowData = mysqli_fetch_assoc($sth)): ?>
                        <p><?php echo $rowData['title'] ?></p>
                    <?php endwhile; ?>
                    <?php else: ?>
                        <p> No files lit</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="bottom_right">
                <h4> Subscriptions </h4>
                <div class="pre-scrollable">
                    <?php $sql = "SELECT users.username FROM users JOIN subscriptions ON users.id = subscriptions.target_id WHERE subscriptions.user_id = $user->id";
                    $sth = $db->query($sql); if(mysqli_num_rows($sth)!=0): while($rowData = mysqli_fetch_assoc($sth)): ?>
                        <p><?php echo $rowData['username'] ?></p>
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