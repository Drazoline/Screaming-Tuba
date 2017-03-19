<h1>Edit Folder</h1>

<?php
    echo $this->Form->create($folder);
    echo $this->Form->input('title');
    echo $this->Form->input('visibility');
    echo $this->Form->input('folder_image');
    echo $this->Form->button(__('Save folder'));
    echo $this->Form->end();
?>
