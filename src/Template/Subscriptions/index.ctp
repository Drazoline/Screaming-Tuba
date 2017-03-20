<h1>Subscriptions</h1>
<div class="row">
  <?= $this->Html->link('Ajouter', ['action' => 'add']) ?>
    <?php
    if(!empty($subscriptions)): foreach($subscriptions as $subscription): ?>
        <div class="comment-­‐box">
            <div class="comment-­‐content">
                <div class="caption">
                    <p>
                        <?php echo $subscription->user_id; ?>
                    </p>
                    <p>
                        <?php echo $subscription->target_id; ?>
                    </p>
                </div>
            </div>
            <?= $this->Form->postLink(
            'Delete',
            ['action' => 'delete', $subscription->id],
            ['confirm' => 'Are you sure?'])
            ?>
        </div>
        <?php
    endforeach;
    else: ?>
        <p class="no-­‐record">No comments(s) found......</p>
    <?php endif; ?>
</div>