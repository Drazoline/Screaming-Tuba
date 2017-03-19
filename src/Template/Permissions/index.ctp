<h1>Permission</h1>
<div
    class="row">
    <?= $this->Html->link('Ajouter', ['action' => 'add']) ?>
    <?php
    if(!empty($permissions)): foreach($permissions as $permission): ?>
        <div class="post-­‐box">
            <div class="post-­‐content">
                <div class="caption">
                    <p>
                        <?php echo $permission->nom; ?>
                        <?= $this->Html->link('Edit', ['action' => 'edit', $permission->id]) ?>
                        <?= $this->Form->postLink('Delete',['action' =>'delete', $permission->id], ['confirm' => 'Are you sure?']) ?>
                    </p>
                </div>
            </div>
        </div>
        <?php
    endforeach;
    else: ?>
        <p class="no-­‐record">No perm(s) found......</p>
    <?php endif; ?>
</div>
