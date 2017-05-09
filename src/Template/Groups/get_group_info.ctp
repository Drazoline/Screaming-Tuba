
<div>
    <div id="title-group" class="title-group"><?= $group->name ?></div>
    <?php  echo $this->Html->image('../webroot/img/groups/'.$group->filename, array('class' => 'img-circle-title img-top')); ?>
</div>
<div style="float: left;width: 100%;">
    <div class="stat-members">
        <div id="members-wrap" class="categories">
            <h3><?= __('Members')?></h3>
            <div class="categories-content" >
                <ul id="user-list">
                    <?php
                    if(!empty($results)): foreach($results as $result): ?>
                        <li id="<?= $result->id?>"><?= $result->username ?>

                            <!--<?=$this->Html->image('../webroot/img/delete.png', array('class' => 'img-delete'));?> -->
                        <?php
                    endforeach; ?>
                    <?php else: ?>
                        <a style="display:block;text-align:center">No users</a>
                    <?php endif; ?>
                </ul>
                <?php
                if($group->user_id == $userid){
                echo $this->Form->create('groupUser', array('style' => 'padding-left: 10px;',
                    'url' => array('app' => true, 'controller' => 'groups', 'action' => 'add_user'), 'id' => 'upload-form-user'));
                echo $this->Form->input('user_id', [
                    'type' => 'select',
                    'options' => $userQuery,
                    'label' => __("Utilisateurs"),
                    'style' => 'height: 35px;'
                ]);
                    echo $this->Form->input('group_id', array('class' => 'add-file', 'type' => 'hidden', 'label' => false,  'value' => $groupid));
                    echo $this->Form->submit('Ajouter', array('class' => 'add-file', 'class' => 'form-control'));
                    echo $this->Form->end();
                }
                ?>
            </div>
        </div>
        <div id="members-wrap" class="categories">
            <h3><?= __('Stats')?></h3>
            <div class="categories-content" >
                <ul>

                </ul>
            </div>
        </div>
    </div>
    <div class="projects">
        <h3><?= __('Files')?></h3>

        <div class="categories-content projects-content" style="display: inline-block; padding-top:10px;">
            <table class="table-files" id="table-files">
                <tr style="border-bottom: 1px solid #000000;">
                    <th class="colonne-files">Nom</th>
                    <th>Fichier</th>
                    <th>Par</th>
                    <th>Nb. Télé.</th>
                    <th>Télécharger</th>
                </tr>

                <?php
                if(!empty($files)): foreach($files as $file): ?>
                    <tr>
                        <td style="padding-left: 10px;"><?= $file->title;?></td>
                        <td><?= $file->org_filename;?></td>
                        <td><?= $file->username;?></td>
                        <td><?= $file->times_downloaded;?></td>

                        <td><?=  $this->Html->link(
                                'Télécharger',
                                '../webroot/files/'.$file->filename,
                                ['class' => 'button', 'target' => '_blank', 'download' =>$file->org_filename, 'onclick'=> 'console.log("ok")']
                            ); ?>
                        </td>
                    <tr>
                    <?php
                endforeach;

                else: ?>
                    <a style="display:block;text-align:center">No users</a>
                <?php endif; ?>
            </table>
                <?php
                echo $this->Form->create('file', array('class' => 'add-file first', 'type' => 'file', 'url' =>
                    array('app' => true, 'controller' => 'groups', 'action' => 'save_new_file'), 'id' => 'upload-form'));
                echo $this->Form->input('title', array('class' => 'add-file', 'label' => array('text' => 'Description')));
                echo $this->Form->file('fileExt');
                echo $this->Form->input('user_id', array('class' => 'add-file', 'type' => 'hidden', 'label' => false,  'value' => $userid));
                echo $this->Form->input('group_id', array('class' => 'add-file', 'type' => 'hidden', 'label' => false,  'value' => $groupid));
                echo $this->Form->submit('Ajouter', array('class' => 'add-file', 'class' => 'form-control'));
                echo $this->Form->end();
                ?>
        </div>
    </div>
</div>
