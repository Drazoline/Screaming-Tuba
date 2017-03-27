<h1>Add Like</h1>

<?php
echo $this->Form->create($user_file_likes);
echo $this->Form->input('user_id');
echo $this->Form->input('file_id');
echo $this->Form->button(__('Save Like'));
echo $this->Form->end();
?>