<h1>Add Folder</h1>

<?php
    echo $this->Form->create($folder);
    echo $this->Form->input('name');
    echo $this->Form->input('user_id');
    echo $this->Form->button(__('Save folder'));
    echo $this->Form->end();
?>