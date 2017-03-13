<h1>Folder</h1>
<div class="row">
    <?php
    if(!empty($folders)): foreach($folders as $folder): ?>
    <div class="post-­‐box">
        <div class="post-­‐content">
            <div class="caption">
                <h4>
                    <?php echo $folder->title; ?>
                </h4>
            </div>
        </div>
    </div>
    <?php
        endforeach;
    else: ?>
    <p class="no-­‐record">No folder found......</p>
    <?php endif; ?>

    <?= $this->Html->link('Ajouter', ['action' => 'add']) ?>
</div>