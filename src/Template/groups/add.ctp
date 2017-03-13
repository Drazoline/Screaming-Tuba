<h1>Add Group</h1>

<?php
    echo $this->Form->create($group);
    echo $this->Form->input('name');
    echo $this->Form->input('user_id');
    echo $this->Form->button(__('Save group'));
    echo $this->Form->end();
?>