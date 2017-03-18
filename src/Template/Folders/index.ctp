<h1>Folder</h1>
<div class="row">
  <?= $this->Html->link('Ajouter', ['action' => 'add']) ?>
    <?php
        if(!empty($folders)): foreach($folders as $folder): ?>
    <div class="post-­‐box">
        <div class="post-­‐content">
            <div class="caption">
                <h4>
                    <?php echo $folder->title; ?>
                </h4>
                <p>
                  <?php echo $folder->visibility; ?>
                  <?= $this->Html->link('Edit', ['action' => 'edit', $folder->id]) ?>
                  <?= $this->Form->postLink('Delete',['action' =>'delete', $folder->id], ['confirm' => 'Are you sure?']) ?>
                </p>
            </div>
        </div>
    </div>
    <?php
        endforeach;
    else: ?>
    <p class="no-­‐record">No folder found......</p>
    <?php endif; ?>
</div>
