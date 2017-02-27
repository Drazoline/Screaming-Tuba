<h1>Files</h1>
<div
        class="row">
    <?php
    if(!empty($files)): foreach($files as $file): ?>
    <div class="post-­‐box">
        <div class="post-­‐content">
            <div class="caption">
                <h4>
                    <?php echo $file->times_played; ?>
                </h4>
            </div>
        </div>
    </div>
    <?php
        endforeach;
    else: ?>
    <p class="no-­‐record">No file found......</p>
    <?php endif; ?>
</div>