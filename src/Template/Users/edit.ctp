<?php
$pageTitle = 'Screaming Tuba : '.$user->username;
$this->layout = false;
$db =  mysqli_connect("localhost","root","","screaming_db");?>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $pageTitle ?>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?=$this->Html->css('edit_user.css') ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>
<body>
    <div id="Title" class="header">
        <?php
        if($user['user_image'] == "") :?>
            <div class="circleborder"><?php echo $this->Html->image('../webroot/img/profile/profile.jpg'); ?></div>

        <?php else:?>
            <div class="circleborder"><?php echo $this->Html->image('../webroot/img/profile/'.$user->user_image); ?></div>

        <?php endif ?>
        <h1 class="Username" style="display:block;text-align:center"><?php echo $user->username ?></h1>
    </div>
        <div class="users form">
            <?= $this->Form->create($user, ['type' => 'file']) ?>
            <fieldset class="user_edit_form">
                <legend><?= __('Edit a user') ?></legend>
                <?php echo "FirstName: "; echo $user->first_name; ?>
                <br/>
                <?php echo "LastName: "; echo $user->last_name; ?>
                <?= $this->Form->input('password') ?>
                <?= $this->Form->input('email') ?>
                <?= $this->Form->file('fileExt') ?>
                <?= $this->Form->input('subscription') ?>
            </fieldset>
            <?= $this->form->button(__('Save User')) ?>
            <?= $this->Form->end() ?>
        </div>
</body>
</html>
