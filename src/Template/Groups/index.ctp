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
<div class="menus">
    <a>
        Welcome <br>
        <?php echo $this->request->session()->read('Auth.User.username') ?><br><br>
    </a>
    <a>
        My account<br>
    </a>
    <a>
        Upload<br>
    </a>
    <a>
        Following<br>
    </a>
</div>
<div
    class="row">


    <div class="groups">
        <a id="title-center" style="align-content: center; text-align: center;">Groups</a>

        <?php
        if(!empty($groups)): foreach($groups as $group): ?>
            <a>
                <div class="group">
                    <?php  echo $this->Html->image('../webroot/img/groups/'.$group->filename, array('class' => 'img-circle')); ?>
                    <!--<p style=" margin:auto;"> <?php echo $group->name; ?></p>-->
                </div>
            </a>
            <?php
        endforeach;

        else: ?>
            <a style="display:block;text-align:center">You have no groups</a>
        <?php endif; ?>
        <?php echo $this->Html->link(
        $this->Html->image('../webroot/img/add_icon.png', array('class' => 'img-circle')), ['action' => 'add'], array('escape' => false)
        ); ?>
    </div>

    <div id="contents">
        <div>
            <div id="title-group" class="title-group">Je me Babamuse</div>
            <?php  echo $this->Html->image('../webroot/img/groups/'.$group->filename, array('class' => 'img-circle-title img-top')); ?>
        </div>
        <div>
        <div class="stat-members">
            <div id="members-wrap" class="categories">
                <h3><?= __('Members')?></h3>
                <div class="categories-content" >
                    <ul>
                        <li>Marcus_Babounne</li>
                        <li>Bâtisse</li>
                        <li>Grompiette</li>
                    </ul>
                </div>
            </div>
            <div id="members-wrap" class="categories">
                <h3><?= __('Stats')?></h3>
                <div class="categories-content" >
                    <ul>
                        <li>Blablabla</li>
                        <li>Test</li>
                        <li>Lol</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="projects">
            <h3><?= __('Projects')?></h3>
            <div class="categories-content projects-content" style="display: inline-block;">
                <ul>
                    <li>Coffee</li>
                    <li>Tea</li>
                    <li>Milk</li>
                </ul>
            </div>
        </div>
        </div>

    </div>
</div>
</body>
</html>
