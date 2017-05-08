
<div>
    <div id="title-group" class="title-group"><?= $group->name ?></div>
    <?php  echo $this->Html->image('../webroot/img/groups/'.$group->filename, array('class' => 'img-circle-title img-top')); ?>
</div>
<div>
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
            <ul>
                <?php
                if(!empty($files)): foreach($files as $file): ?>
                    <li>
                        <?= $file->title ?>
                    </li>

                    <?php
                endforeach;

                else: ?>
                    <a style="display:block;text-align:center">No users</a>
                <?php endif; ?>
                <?php
                echo $this->Form->create('file', array('type' => 'file', 'url' => array('app' => true, 'controller' => 'groups', 'action' => 'save_new_file'), 'id' => 'upload-form'));
                echo $this->Form->input('title');
                echo $this->Form->file('fileExt');
                echo $this->Form->input('user_id', array('type' => 'hidden', 'label' => false,  'value' => $userid));
                echo $this->Form->input('group_id', array('type' => 'hidden', 'label' => false,  'value' => $groupid));
                echo $this->Form->submit('Apply', array('class' => 'form-control'));
                echo $this->Form->end();
                ?>
            </ul>
        </div>
    </div>
</div>
