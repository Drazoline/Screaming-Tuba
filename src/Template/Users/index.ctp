<h1>Blog
    Posts</h1>
<div
    class="row">
    <?= $this->Html->link('Ajouter', ['action' => 'add']) ?>
    <br>
    <?php
    if(!empty($users)): foreach($users as $user): ?>
            <div class="post-­‐box">
                <div class="post-­‐content">
                    <div class="caption">
                        <h4>
                            <?php echo $user->name; ?>
                        </h4>
                        <p>
                                <?php echo $user->email; ?>
                                <?= $this->Html->link('Edit', ['action' => 'edit', $user->id]) ?>
                                <?= $this->Form->postLink('Delete', ['action' => 'delete', $user->id]) ?>
                        </p>

                    </div>
                </div>
            </div>
            <?php
        endforeach;
    else: ?>
        <p class="no-­‐record">No users found......</p>
        <?php endif; ?>
</div>
