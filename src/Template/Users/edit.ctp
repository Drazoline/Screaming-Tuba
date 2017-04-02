<?php
/*    if(isset($_POST['submit'])){
        move_uploaded_file($_FILES['file']['tmp_name'],$_FILES['file'],['name']);
    }*/?>
<div class="users form">
<?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit a user') ?></legend>
        <?= $this->Form->input('username') ?>
        <?= $this->Form->input('password') ?>
        <?= $this->Form->input('email') ?>
        <!--<form actions="" method="post" enctype="multipart/form-data">
            <input type="file" name="file">
            <input type="submit" name="submit">
        </form>-->
        <?= $this->Form->input('subscription') ?>
    </fieldset>
<?= $this->form->button(__('Save User')) ?>
<?= $this->Form->end() ?>
</div>
