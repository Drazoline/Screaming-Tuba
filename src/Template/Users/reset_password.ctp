<body class="body-login">
<div class="users form">
  <img class="logo-img" src="/Screaming-Tuba/webroot/img/logo.png" alt="logo" style="align: middle;">
  <img class="logo-img" src="../webroot/img/font.gif" alt="logo" style="align: middle;">
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
