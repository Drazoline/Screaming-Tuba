<h1>Blog
    Posts</h1>
<div
    class="row">
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
        </div>
        <?php
    endforeach;
    else: ?>
        <p class="no-­‐record">No subscription(s) found......</p>
    <?php endif; ?>
</div>