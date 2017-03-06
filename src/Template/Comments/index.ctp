<h1>Blog
    Posts</h1>
<div
    class="row">
    <?php
    if(!empty($comments)): foreach($comments as $comment): ?>
        <div class="post-­‐box">
            <div class="post-­‐content">
                <div class="caption">
                    <p>
                        <?php echo $comment->text; ?>
                    </p>
                    <p>
                        <?php echo $comment->id_owner; ?>
                    </p>
                </div>
            </div>
        </div>
        <?php
    endforeach;
    else: ?>
        <p class="no-­‐record">No comments(s) found......</p>
    <?php endif; ?>
</div>