<h1>Users List</h1>
<div
    class="row">
    <?= $this->Html->link('Add', ['action' => 'add']) ?>
    <br><br>
    <?php
    if(!empty($users)): foreach($users as $user): ?>
            <div class="post-­‐box">
                <div class="post-­‐content">
                    <div class="caption">
                        <h4>
                            <?php echo $user->username; ?>
                        </h4>
                        <h5>
                                <?php echo $user->email; ?>
                                <?= $this->Html->link('Edit', ['action' => 'edit', $user->id]) ?>
                                <?= $this->Form->postLink('Delete',['action' =>'delete', $user->id], ['confirm' => 'Are you sure?']) ?>                        </h5>
                        <br>
                    </div>
                </div>
            </div>
            <?php
        endforeach;
    else: ?>
        <p class="no-­‐record">No users found......</p>
        <?php endif; ?>
</div>
