<h1>Add	Permissions for an user</h1>
<?php
    echo $this->Form->create($permGroupUser);
    echo $this->Form->input('group_user_id');
    echo $this->Form->input('permission_id');
    echo $this->Form->button(__('Save Permission for an user'));
    echo $this->Form->end();
?>