<h1>Blog
    Posts</h1>
<div
    class="row">
    <?php
    if(!empty($groupUsers)): foreach($groupUsers as $groupUser): ?>
        <div class="post-­‐box">
            <div class="post-­‐content">
                <div class="caption">
                    <p>
                        <?php echo $groupUser->id_group; ?>
                    </p>
                    <p>
                        <?php echo $groupUser->id_user; ?>
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