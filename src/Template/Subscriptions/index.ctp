<h1>Subscriptions</h1>
<div class="row">
  <?= $this->Html->link('Ajouter', ['action' => 'add']) ?>
    <?php
    if(!empty($subscriptions)): foreach($subscriptions as $subscription): ?>
        <div class="comment-­‐box">
            <div class="comment-­‐content">
                <div class="caption">
                    <h5>
                        <?php echo $subscription->user->name; ?>  followed 
                        <?php echo $subscription->target_id; ?>
                    </h5>
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
