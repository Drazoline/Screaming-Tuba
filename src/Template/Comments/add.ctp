<h1>Add	Comment</h1>
<?php
    echo $this->Form->create($comment);
    echo $this->Form->input('user_id');
    echo $this->Form->input('file_id');
    echo $this->Form->input('text', ['rows' => '3']);
    echo $this->Form->button(__('Save Comment'));
    echo $this->Form->end();
?>