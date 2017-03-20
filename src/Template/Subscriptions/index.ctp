<h1>Subscriptions</h1>
<div
    class="row">
    <?= $this -> Html -> link('Ajouter', ['action' => 'add']) ?>
    <?php
    if(!empty($subscriptions)): foreach($subscriptions as $subscription): ?>
        <div class="post-­‐box">
            <div class="post-­‐content">
                <div class="caption">
                    <h4>
                        <?php echo $subscription->id; ?>
                    </h4>
                    <p>
                        <?php echo $subscription->user_id; ?>
                    </p>
                </div>
            </div>
            <?= $this -> Form -> postLink('Delete', ['action' => 'delete', $subscription -> id], ['confirm' => 'Are you sure?'])?>
        </div>
        <?php
    endforeach;
    else: ?>
        <p class="no-­‐record">No subscription(s) found......</p>
    <?php endif; ?>
</div>