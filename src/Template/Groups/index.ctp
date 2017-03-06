<h1>Blog
    Posts</h1>
<div
    class="row">
    <?php
    if(!empty($groups)): foreach($groups as $group): ?>
        <div class="post-­‐box">
            <div class="post-­‐content">
                <div class="caption">
                    <p>
                        <?php echo $group->name; ?>
                    </p>
                    <p>
                        <?php echo $group->id_owner; ?>
                    </p>
                </div>
            </div>
        </div>
        <?php
    endforeach;
    else: ?>
        <p class="no-­‐record">No groups(s) found......</p>
    <?php endif; ?>
</div>