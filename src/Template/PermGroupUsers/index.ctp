<h1>Blog User</h1>
<div
    class="row">
    <?= $this->Html->link('Ajouter', ['action' => 'add']) ?>
    <?php if(!empty($permGroupUsers)):
        foreach($permGroupUsers as $permGroupUser): ?>
        <div class="post-­‐box">
            <div class="post-­‐content">
                <div class="caption">
                    <p>
                        <?php echo $permGroupUser->id_perm; ?>
                    </p>
                    <p>
                        <?php echo $permGroupUser->id; ?>
                    </p>
                    <p>
                        <?php echo $permGroupUser->id_group_user; ?>
                    </p>
                </div>
                <?= $this->Html->link('Edit', ['action' => 'edit', $permGroupUser->id]) ?>
                <?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $permGroupUser->id],
                ['confirm' => 'Are you sure?'])
                ?>
            </div>
        </div>
        <?php
    endforeach;
    else: ?>
        <p class="no-­‐record">No perm group user(s) found......</p>
    <?php endif; ?>
</div>
