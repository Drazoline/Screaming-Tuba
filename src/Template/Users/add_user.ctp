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
        <div class="login-infos">
            <fieldset>
                <legend class="legend"><?= __('Sign Up') ?></legend>
                <?= $this->Form->input('username', array('style'=>'font-size: 11px; height:30px')) ?>
                <?= $this->Form->input('password', array('style'=>'font-size: 11px; height:30px')) ?>
                <?= $this->Form->input('first_name', array('style'=>'font-size: 11px; height:30px')) ?>
                <?= $this->Form->input('last_name', array('style'=>'font-size: 11px; height:30px')) ?>
                <?= $this->Form->input('email', array('style'=>'font-size: 11px; height:30px')) ?>
                <br>
                <button type="submit" class="btn-info btn-login" ><?= __('Sign up') ?></button>
                <?= $this->Form->end() ?>
                <legend class="legend"><?= __("Already a user?") ?></legend><br><br><br>
            </fieldset>
            <form method="post" name="gotologin">
                <button class="btn-info btn-login" name="btnLogin" ><?= __('Sign in') ?></button>

            </form>
<?php
if(!empty($_POST['gotologin'])){
    echo "Baba";
    header('Location: http://localhost:8888/Screaming-Tuba/Users/login');
}
?>
        </div>
    </div>
</body>
