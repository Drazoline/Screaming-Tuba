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

    <?php
    if(!empty($groups)): foreach($groups as $group): ?>
        <a style="display:block;text-align:center">
                        <?php echo $group->name; ?>
        </a>
        <?php
    endforeach;
    else: ?>
        <a style="display:block;text-align:center">You have no groups</a>
    <?php endif; ?>
        <?= $this->Html->link('Ajouter', ['action' => 'add']) ?>
        <!--<a style="display:block;text-align:center">Create group</a>-->
    </div>
</div>
</body>
</html>
