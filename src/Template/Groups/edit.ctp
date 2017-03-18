<h1>Edit Group</h1>

<?php
echo $this->Form->create($group);
echo $this->Form->input('name');
echo $this->Form->button(__('Save group'));
echo $this->Form->end();
?>