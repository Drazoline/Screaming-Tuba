<h1>Folder Owner</h1>
<div
        class="row">
    <?php
    if(!empty($folderOwners)): foreach($folderOwners as $folderOwner): ?>
    <div class="post-­‐box">
        <div class="post-­‐content">
            <div class="caption">
                <h4>
                    <?php echo $folderOwner->user_id; ?>
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