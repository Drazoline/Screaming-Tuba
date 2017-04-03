<h1>Add Group</h1>

<?php
    echo $this->Form->create($group, ['type' => 'file']);
    echo $this->Form->input('name');
    echo $this->Form->file('fileExt');
    echo $this->Form->button(__('Save group'));
    echo $this->Form->end();
?>