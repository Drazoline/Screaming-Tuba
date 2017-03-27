<h1>Subscriptions</h1>
<div class="row">
    <?= $this->Html->link('Ajouter', ['action' => 'add']) ?>
    <?php
    if(!empty($userFileLikes)): foreach($userFileLikes as $userFileLike): ?>
        <div class="comment-­‐box">
            <div class="comment-­‐content">
                <div class="caption">
                    <p>
                        <?php echo $userFileLike->user_id; ?>
                    </p>
                    <p>
                        <?php echo $userFileLike->file_id; ?>
                    </p>
                </div>
            </div>
            <?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $userFileLike->id],
                ['confirm' => 'Are you sure?'])
            ?>
        </div>
        <?php
    endforeach;
    else: ?>
        <p class="no-­‐record">No like(s) found......</p>
    <?php endif; ?>
</div>