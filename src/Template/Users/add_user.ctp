<?php
$this->assign('title', __("Sign Up"));
?>
<body class="body-login"
    <div class="users form">
        <?= $this->Flash->render() ?>
        <?= $this->Form->create($user) ?>
        <img class="logo-img" src="../webroot/img/logo.png" alt="logo" style="align: middle;">
        <h3 style="text-align:center;">Screaming Tuba</h3>
        <br>
            <fieldset class="login-infos">
                <legend class="legend"><?= __('Sign Up') ?></legend>
                <?= $this->Form->input('username', array('style'=>'font-size: 11px; height:30px')) ?>
                <?= $this->Form->input('password', array('style'=>'font-size: 11px; height:30px')) ?>
                <?= $this->Form->input('email', array('style'=>'font-size: 11px; height:30px')) ?>
                <br>
                <button type="submit" class="btn-info btn-login" ><?= __('Sign up') ?></button>
                <?= $this->Form->end() ?>
                <legend class="legend"><?= __("Already a user?") ?></legend><br><br><br>
                <a href="/Screaming-Tuba/Users/login" target="_self"><button class="btn-info btn-login" ><?= __('Sign in') ?></button></a>
            </fieldset>
    </div>
</body>
