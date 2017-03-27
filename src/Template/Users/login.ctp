<?php
  $this->assign('title', __("Login"));
 ?>
<body class="body-login">
  <div class="login">
  <?= $this->Flash->render() ?>
  <?= $this->Form->create() ?>
  <img class="logo-img" src="../webroot/img/logo.png" alt="logo" style="align: middle;">
  <h3 style="text-align:center;">Screaming Tuba</h3>
  <br>
      <fieldset class="login-infos">
          <legend class="legend"><?= __("Sign in") ?></legend>
          <?= $this->Form->input('username', array('style'=>'font-size: 11px; height:30px')) ?>
          <?= $this->Form->input('password', array('style'=>'font-size: 11px; height:30px')) ?>
          <?= $this->Html->link("Forgot Password?",['controller'=>'Users','action'=>'forgotPassword'], array('style'=>'font-size: 10px; height:20px'));?>
          <br>
          <?= $this->Form->submit('../img/signin.png'); ?>
          <?= $this->Form->end() ?>

          <legend class="legend"><?= __("New User") ?></legend><br><br>

          <a href="/Screaming-Tuba/Users/add" target="add"><img src="../img/signup.png" alt="Signup"></a>
      </fieldset>
  </div>
</body>
