<?php
$this->assign('title', __("Login"));
?>

<body class="body-login">
  <div class="login">
    <?= $this->Flash->render() ?>
    <?= $this->Form->create() ?>
    <img class="logo-img" src="../webroot/img/logo.png" alt="logo" style="align: middle;">
    <img class="logo-img" src="../webroot/img/font.gif" alt="logo" style="align: middle;">
    <br>
    <fieldset class="login-infos">
      <legend class="legend"><?= __("Sign in") ?></legend>
      <?= $this->Form->input('username', array('style'=>'font-size: 11px; height:30px')) ?>
      <?= $this->Form->input('password', array('style'=>'font-size: 11px; height:30px')) ?>
      <?= $this->Html->link("Forgot Password?",['controller'=>'Users','action'=>'forgotPassword'], array('style'=>'font-size: 10px; height:20px; margin-left: 64%;'));?>
      <br>
      <button type="submit" class="btn-info btn-login" ><?= __('Sign In') ?></button>
      <?= $this->Form->end() ?>

      <legend class="legend"><?= __("New User") ?></legend><br><br><br>

      <a href="/Screaming-Tuba/Users/addUser" target="_self"><button type="button" class="btn-info btn-login" ><?= __('Sign up') ?></button></a>
    </fieldset>
  </div>
</body>
