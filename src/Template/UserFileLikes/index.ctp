<h1>Blog
    Posts</h1>
<div
    class="row">
    <?php
    if(!empty($userFileLikes)): foreach($userFileLikes as $userFileLike): ?>
        <div class="post-­‐box">
            <div class="post-­‐content">
                <div class="caption">
                    <h4>
                        <?php echo $userFileLike->id; ?>
                    </h4>
                    <p>
                        <?php echo $userFileLike->user_id; ?>
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