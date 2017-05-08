
<div>
    <div id="title-group" class="title-group"><?= $group->name ?></div>
    <?php  echo $this->Html->image('../webroot/img/groups/'.$group->filename, array('class' => 'img-circle-title img-top')); ?>
</div>
<div style="float: left;width: 100%;">
    <div class="stat-members">
        <div id="members-wrap" class="categories">
            <h3><?= __('Members')?></h3>
            <div class="categories-content" >
                <ul>
                    <?php
                    if(!empty($results)): foreach($results as $result): ?>
                        <li>
                            <?= $result->username ?>
                        </li>
                        <?php
                    endforeach; ?>
                    <a href="/Screaming-Tuba/GroupUsers/add" target="_self"><button type="button" class="btn-info btn_add" style="border-radius: 50%; margin-left: 85px; margin-top: 10px;"><?= __('+') ?></button></a>

                    <?php else: ?>
                        <a style="display:block;text-align:center">No users</a>
                    <?php endif; ?>
                </ul>
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

        <div class="categories-content projects-content" style="display: inline-block;">
            <table>
                <tr>
                    <th>Nom</th>
                    <th>Fichier</th>
                    <th>Par</th>
                    <th>Nb. Télé.</th>
                    <th>Télécharger</th>
                </tr>
                <?php
                if(!empty($files)): foreach($files as $file): ?>
                    <tr>
                        <td><?= $file->title;?></td>
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
                echo $this->Form->create('file', array('type' => 'file', 'url' =>
                    array('app' => true, 'controller' => 'groups', 'action' => 'save_new_file'), 'id' => 'upload-form'));
                echo $this->Form->input('title', array('label' => array('text' => 'Description')));
                echo $this->Form->file('fileExt');
                echo $this->Form->input('user_id', array('type' => 'hidden', 'label' => false,  'value' => $userid));
                echo $this->Form->input('group_id', array('type' => 'hidden', 'label' => false,  'value' => $groupid));
                echo $this->Form->submit('Apply', array('class' => 'form-control'));
                echo $this->Form->end();
                ?>
        </div>
    </div>
</div>
