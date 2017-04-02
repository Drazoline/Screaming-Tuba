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

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>
<body>
<div class="User">
    <div id="Title" class="header">
        <?php
/*        if($user['user_image'] == "")
        {
            echo "<img width='100' height='100' src='../webroot/img/profile.jpg'>";
        }
            */?>
        <a class="Username" style="display:block;text-align:center"><?php echo $user->username; ?></a>
        <?php ?>
    </div>
    <div class="main_display">
        <div class="top_left">
            <a> Groups </a>
            <div class="list">
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
            <a> Subscribers </a>
            <div class="list">
                <?php $sql = "SELECT users.username FROM users JOIN subscriptions ON users.id = subscriptions.user_id WHERE subscriptions.target_id = $user->id";
                $sth = $db->query($sql); if(mysqli_num_rows($sth)!=0): while($rowData = mysqli_fetch_assoc($sth)): ?>
                    <p><?php echo $rowData['username'] ?></p>
                <?php endwhile; ?>
                <?php else: ?>
                    <p> No subscribers</p>
                <?php endif; ?>
            </div>
        </div>
        <div class="bottom_left">
            <a>Lits</a>
            <div class="list">
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
            <a> Subscriptions </a>
            <div class="list">
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
</body>
</html>