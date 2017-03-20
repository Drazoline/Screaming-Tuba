<h1>Edit File</h1>

<?php
echo $this->Form->create($file, ['type' => 'file']);
echo $this->Form->input('data', ['type' => 'file']);
echo $this->Form->input('times_played');
echo $this->Form->input('user_id');
echo $this->Form->input('title');
echo $this->Form->button(__('Save file'));
    echo $this->Form->end();
?>
