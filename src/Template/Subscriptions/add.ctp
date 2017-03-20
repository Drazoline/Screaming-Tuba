<h1>Add Subscription</h1>

<?php
echo $this->Form->create($subscription);
echo $this->Form->input('user_id');
echo $this->Form->input('target_id' , array('type' => 'select', 'options' => $users));
echo $this->Form->button(__('Save subscription'));
echo $this->Form->end();
?>
