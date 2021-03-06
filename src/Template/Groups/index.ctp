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
$db =  mysqli_connect("localhost","root","","screaming_db");
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
    <?=$this->Html->script('jquery-3.2.1.min.js') ?>
    <?=$this->Html->script('js.cookie.js') ?>

    <?php
    if (!empty($defaultGroupId)) {
        echo "<script type=\"text/javascript\">var defaultGroupId = '" . $defaultGroupId->id . "';</script>";
    } else {
        echo "<script type=\"text/javascript\">var defaultGroupId = '';</script>";
    }
    ?>
    <?=$this->Html->script('groups.js') ?>
    <?=$this->Html->css('header.css') ?>
    <script type="text/javascript">var groupAjaxUrl = '<?= $this->Url->Build(['controller' => 'Groups', 'action' => 'getGroupInfo']) ?>';</script>
    <script type="text/javascript">var fileAjaxUrl = '<?= $this->Url->Build(['controller' => 'Groups', 'action' => 'saveNewFile']) ?>';</script>
    <script type="text/javascript">var addUserAjaxUrl = '<?= $this->Url->Build(['controller' => 'Groups', 'action' => 'addUser']) ?>';</script>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>
<header class="header">

    <?= $this->Html->link($this->Html->image('../webroot/img/logo.png', array('class' => 'smallimg')), ['controller' => 'feed', 'action' => 'index'], array('escape' => false)); ?>
    <h3 class="header-text">
        <?= $this->Html->link('My Profile', ['controller'=>'users', 'action'=>'display_user', $currentUser], array( 'class' => 'button-header')); ?>
        <?= $this->Html->link('Groups', ['controller'=>'groups', 'action'=>'index', $currentUser], array( 'class' => 'button-header')); ?>
        <?= $this->Html->link('Logout', ['controller'=>'users', 'action'=>'logout'], array( 'class' => 'button-header')); ?>
        <div class="search-bar">
            <?= $this->Form->create(); ?>
            <?= $this->Form->input('search', array('type' => 'search', 'label' => 'Search: ')) ?>
            <?= $this->Form->end() ?>
        </div>
    </h3>
</header>
<body>
<div>
    <div id="contents" class="content">
    </div>
    <div class="groups">
        <a id="title-center" style="align-content: center; text-align: center;">Groups</a>
        <?php
        if(!empty($groups)): foreach($groups as $group): ?>
            <a>
                <div class="group">
                    <?php  echo $this->Html->image('../webroot/img/groups/'.$group->filename, array('class' => 'img-circle', 'id' => 'img-group-'.$group->id)); ?>
                    <!--<p style=" margin:auto;"> <?php echo $group->name; ?></p>-->
                </div>
            </a>
            <?php
        endforeach;

        else: ?>
            <a style="display:block;text-align:center">You have no groups</a>
        <?php endif; ?>
        <?php
        if(!empty($query2)): foreach($query2 as $group): ?>
            <a>
                <div class="group">
                    <?php  echo $this->Html->image('../webroot/img/groups/'.$group->filename, array('class' => 'img-circle', 'id' => 'img-group-'.$group->id)); ?>
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
    <br style="clear: left;" />
</div>
</body>
</html>
