<div class="users form">
<?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit a user') ?></legend>
        <?= $this->Form->input('username') ?>
        <?= $this->Form->input('password') ?>
        <?= $this->Form->input('email') ?>
        <?= $this->Form->input('user_image') ?>
        <?= $this->Form->input('subscription') ?>
    </fieldset>
<?= $this->Form->button(__('Save user')); ?>
<?= $this->Form->end() ?>
</div>
