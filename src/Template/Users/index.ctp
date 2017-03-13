<h1>Blog
    Posts</h1>
<div
    class="row">
    <?php
    if(!empty($users)): foreach($users as $user): ?>
            <div class="post-­‐box">
                <div class="post-­‐content">
                    <div class="caption">
                        <h4>
                            <?php echo $user->name; ?>
                        </h4>
                        <p>
                                <?php echo $user->email; ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php
        endforeach;
    else: ?>
        <p class="no-­‐record">No user(s) found......</p>
        <?php endif; ?>

    <?= $this->Html->link('Ajouter', ['action' => 'add']) ?>
</div>