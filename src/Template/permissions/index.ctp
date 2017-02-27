<h1>Blog
    Posts</h1>
<div
    class="row">
    <?php
    if(!empty($permissions)): foreach($permissions as $permission): ?>
        <div class="post-­‐box">
            <div class="post-­‐content">
                <div class="caption">
                    <p>
                        <?php echo $permission->nom; ?>
                    </p>
                </div>
            </div>
        </div>
        <?php
    endforeach;
    else: ?>
        <p class="no-­‐record">No perm(s) found......</p>
    <?php endif; ?>
</div>