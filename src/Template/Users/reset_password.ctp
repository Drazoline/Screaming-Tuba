<body class="body-login">
<div class="users form">
  <img class="logo-img" src="/Screaming-Tuba/webroot/img/logo.png" alt="logo" style="align: middle;">
  <img class="logo-img" src="../webroot/img/font.gif" alt="logo" style="align: middle;">
    <?= $this->Form->create($user) ?>
    <fieldset class="login-infos">
        <legend class='legend'><?= __('Forgot password') ?></legend>
        <?= $this->Form->input('new_password',['type'=>'password', 'style'=>'font-size: 11px; height:30px']) ?>
        <?= $this->Form->input('confirm_password',['type'=>'password', 'style'=>'font-size: 11px; height:30px']) ?>
        <button type="submit" class="btn-info btn-login" ><?= __('Next') ?></button>
        <?= $this->Form->end() ?>
    </fieldset>
</div>
</body>
