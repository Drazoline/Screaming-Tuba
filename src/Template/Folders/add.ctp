<h1>Add Folder</h1>

<?php
    echo $this->Form->create($folder);
    echo $this->Form->input('title');
    echo $this->Form->radio(
    'visibility',
    [
        ['value' => 'PRIVATE', 'text' => 'PRIVATE'],
        ['value' => 'PUBLIC', 'text' => 'PUBLIC'],
        ['value' => 'GROUP', 'text' => 'GROUP'],
    ]
);
    echo $this->Form->input('folder_image');
    echo $this->Form->button(__('Save folder'));
    echo $this->Form->end();
?>
