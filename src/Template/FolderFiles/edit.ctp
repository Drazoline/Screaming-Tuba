<h1>Edit Folder</h1>

<?php
    echo $this->Form->create($folderFile);
    echo $this->Form->input('folder_id', [
        'type' => 'select',
        'options' => $folders,
        'label' => __("Folder")
    ]);
    echo $this->Form->input('file_id', [
        'type' => 'select',
        'options' => $files,
        'label' => __("File")
    ]);
    echo $this->Form->button(__('Save folder-file'));
    echo $this->Form->end();
?>
