<h1>Files</h1>
<div class="row">
  <?= $this->Html->link('Ajouter', ['action' => 'add']) ?>
    <?php
    if(!empty($files)): foreach($files as $file): ?>
    <div class="post-­‐box">
        <div class="post-­‐content">
            <div class="caption">
                <h4>
                    <?php echo $file->title; ?>
                </h4>
                <h5><?= $this->Html->link('Edit', ['action' => 'edit', $file->id]) ?>
                <?= $this->Form->postLink('Delete',['action' =>'delete', $file->id], ['confirm' => 'Are you sure?']) ?></h5>
            </div>
        </div>
    </div>
    <?php
        endforeach;
    else: ?>
    <p class="no-­‐record">No file found......</p>
    <?php endif; ?>
</div>
