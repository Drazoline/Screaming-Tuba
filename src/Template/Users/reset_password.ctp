<body class="body-login">
<div class="users form">
  <img class="logo-img" src="../webroot/img/logo.png" alt="logo" style="align: middle;">
  <h3 style="text-align:center; color:;">Screaming Tuba</h3>
    <?= $this->Form->create($user) ?>
    <fieldset class="login-infos">
        <legend class='legend'><?= __('Forgot password') ?></legend>
        <?= $this->Form->input('new_password',['type'=>'password']) ?>
        <?= $this->Form->input('confirm_password',['type'=>'password']) ?>
        <?= $this->Form->submit('../img/next.png', array('style' => 'margin-left: auto; display:block;')) ?>
        <?= $this->Form->end() ?>
    </fieldset>
</div>
</body>
