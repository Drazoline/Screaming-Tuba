<h1>Add User</h1>

<?php
    echo $this->Form->create($groupUser);
    echo $this->Form->input('group_id', [
        'type' => 'select',
        'options' => $groups,
        'label' => __("Group"),
        'style' => 'height: 35px;'
    ]);
    echo $this->Form->input('user_id', [
        'type' => 'select',
        'options' => $users,
        'label' => __("User"),
        'style' => 'height: 35px;'
    ]);
    echo $this->Form->button(__('Save user'), array('style' => 'margin-top: 15px;'));
    echo $this->Form->end();
?>
