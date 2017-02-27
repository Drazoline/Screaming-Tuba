<h1>Blog
    Posts</h1>
<div
    class="row">
    <?php
    if(!empty($group_users)): foreach($group_users as $group_user): ?>
        <div class="post-­‐box">
            <div class="post-­‐content">
                <div class="caption">
                    <p>
                        <?php echo $group_user->id_group; ?>
                    </p>
                    <p>
                        <?php echo $group_user->id_user; ?>
                    </p>
                </div>
            </div>
        </div>
        <?php
    endforeach;
    else: ?>
        <p class="no-­‐record">No group user(s) found......</p>
    <?php endif; ?>
</div>