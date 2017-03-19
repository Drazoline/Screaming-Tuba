<h1>Folder Files</h1>
<div class="row">
  <?= $this->Html->link('Ajouter', ['action' => 'add']) ?>
    <?php
    if(!empty($folderFiles)): foreach($folderFiles as $folderFile): ?>
    <div class="post-­‐box">
        <div class="post-­‐content">
            <div class="caption">
                <h4>
                    <?php echo $folderFile->id; ?>
                </h4>
                <h5><?= $folderFile->folder->title . '/' . $folderFile->file->title ?></h5>
                <p>
                  <?= $this->Html->link('Edit', ['action' => 'edit', $folderFile->id]) ?>
                  <?= $this->Form->postLink('Delete',['action' =>'delete', $folderFile->id], ['confirm' => 'Are you sure?']) ?>
                </p>
            </div>
        </div>
    </div>
    <?php
        endforeach;
    else: ?>
    <p class="no-­‐record">No file found......</p>
    <?php endif; ?>
</div>
