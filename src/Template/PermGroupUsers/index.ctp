<h1>Blog
    Posts</h1>
<div
    class="row">
    <?php
    if(!empty($permGroupUsers)): foreach($permGroupUsers as $permGroupUser): ?>
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
            </div>
        </div>
        <?php
    endforeach;
    else: ?>
        <p class="no-­‐record">No perm group user(s) found......</p>
    <?php endif; ?>
</div>