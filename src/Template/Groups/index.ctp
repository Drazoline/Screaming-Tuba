<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$pageTitle = 'Screaming Tuba';
$this->layout = false;
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $pageTitle ?>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?=$this->Html->css('groups.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>
<body>
<div
    class="row">
    <div id="groups">
        <a style="display:block;text-align:center">My Groups</a>

        <?= $this->Html->link('Ajouter', ['action' => 'add']) ?>

        <?php
        if(!empty($groups)): foreach($groups as $group): ?>
            <a style="display:block;text-align:center">
                <?php echo $group->name; ?>
                <?php echo $group->filename; ?>
                <?php echo $this->Html->image('../webroot/img/groups/'.$group->filename); ?>
                <?= $this->Html->link('Edit', ['action' => 'edit', $group->id]) ?>
                <?= $this->Form->postLink('Delete', ['action' => 'delete', $group->id]) ?>
            </a>
            <?php
        endforeach;
        else: ?>
            <a style="display:block;text-align:center">You have no groups</a>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
