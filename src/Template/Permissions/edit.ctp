<h1>Edit Permission</h1>

<?php
    echo $this->Form->create($permission);
    echo $this->Form->input('nom');
    echo $this->Form->button(__('Save permission'));
    echo $this->Form->end();
?>
