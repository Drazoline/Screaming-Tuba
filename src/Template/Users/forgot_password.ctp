<body class="body-login">
<div class="users form ">
  <img class="logo-img" src="../webroot/img/logo.png" alt="logo" style="align: middle;">
  <img class="logo-img" src="../webroot/img/font.gif" alt="logo" style="align: middle;">
  <br>
    <?= $this->Form->create() ?>
    <fieldset class="login-infos">
        <legend class='legend'><?= __('Forgot password') ?></legend>
        <?= $this->Form->input('email',['label'=>'Enter your registered email address', 'style'=>'font-size: 11px; height:30px']) ?>
        <button type="submit" class="btn-info btn-login" ><?= __('Next') ?></button>
        <?= $this->Form->end() ?>
    </fieldset>
</div>
</body>
