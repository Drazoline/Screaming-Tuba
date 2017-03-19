<h1>Blog
    Posts</h1>
<div
    class="row">
    <?php
    <?= $this->Html->link('Ajouter', ['action' => 'add']) ?>
    if(!empty($comments)): foreach($comments as $comment): ?>
        <div class="comment-­‐box">
            <div class="comment-­‐content">
                <div class="caption">
                    <p>
                        <?php echo $comment->text; ?>
                    </p>
                    <p>
                        <?php echo $comment->id_owner; ?>
                    </p>
                </div>
            </div>
            <?= $this->Html->link('Edit', ['action' => 'edit', $comment->id]) ?>
            <?= $this->Form->postLink(
            'Delete',
            ['action' => 'delete', $comment->id],
            ['confirm' => 'Are you sure?'])
            ?>
        </div>
        <?php
    endforeach;
    else: ?>
        <p class="no-­‐record">No comments(s) found......</p>
    <?php endif; ?>
</div>