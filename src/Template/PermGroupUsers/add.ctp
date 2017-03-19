<h1>Add	Permissions for a user</h1>
<?php
    echo $this->Form->create($permGroupUser);
    echo $this->Form->input('group_user_id', [
        'type' => 'select',
        'options' => $groupUsers,
        'label' => __("User Group")
    ]);
    echo $this->Form->input('permission_id', [
        'type' => 'select',
        'options' => $permissions,
        'label' => __("Permission")
    ]);
    echo $this->Form->button(__('Save Permission for a user'));
    echo $this->Form->end();
?>
