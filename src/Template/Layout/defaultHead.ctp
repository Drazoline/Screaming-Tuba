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

    <?=$this->Html->css('accueil.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>
<body>
<div>
    <?= $this->Flash->render() ?>
    <div id="mySidenavLeft" class="sidenav sidenav-align">
       <?= $this->Html->link(
        'Groups',
        '/Groups',
        ['class' => 'button', 'target' => 'index']
        ) ?>
        <?= $this->Html->link(
            'Users',
            '/Users',
            ['class' => 'button', 'target' => 'index']
        ) ?>
        <?= $this->Html->link(
            'Comments',
            '/Comments',
            ['class' => 'button', 'target' => 'index']
        ) ?>
        <?= $this->Html->link(
            'Files',
            '/Files',
            ['class' => 'button', 'target' => 'index']
        ) ?>
        <?= $this->Html->link(
            'Folders',
            '/Folders',
            ['class' => 'button', 'target' => 'index']
        ) ?>
        <?= $this->Html->link(
            'Permissions',
            '/Permissions',
            ['class' => 'button', 'target' => 'index']
        ) ?>
       <?= $this->Html->link(
           'Subscriptions',
           '/Subscriptions',
           ['class' => 'button', 'target' => 'index']
       ) ?>
    </div>

</div>
</body>
<footer>
</footer>
</body>
</html>
