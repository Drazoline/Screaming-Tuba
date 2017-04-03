<body class="body-login">
<div class="users form ">
  <img class="logo-img" src="../webroot/img/logo.png" alt="logo" style="align: middle;">
  <img class="logo-img" src="../webroot/img/font.gif" alt="logo" style="align: middle;">
  <br>
    <?= $this->Form->create() ?>
    <fieldset class="login-infos">
        <legend class='legend'><?= __('Forgot password') ?></legend>
        <?= $this->Form->input('email',['label'=>'Enter your registered email address']) ?>
        <?= $this->Form->submit('../img/next.png', array('style' => 'margin-left: auto; display:block;')) ?>
        <?= $this->Form->end() ?>
    </fieldset>
</div>
</body>
