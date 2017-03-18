<h1>Edit Post</h1>

<?php
    echo $this->Form->create($user);
    echo $this->Form->input('name');
    echo $this->Form->input('password');
    echo $this->Form->input('email');
    echo $this->Form->input('user_image');
    echo $this->Form->input('subscription');
    echo $this->Form->button(__('Save user'));
    echo $this->Form->end();
?>
