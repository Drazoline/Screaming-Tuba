<h1>Folder Files</h1>
<div
        class="row">
    <?php
    if(!empty($folderFiles)): foreach($folderFiles as $folderFile): ?>
    <div class="post-­‐box">
        <div class="post-­‐content">
            <div class="caption">
                <h4>
                    <?php echo $folderFile->title; ?>
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