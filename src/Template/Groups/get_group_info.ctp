
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
                    endforeach;

                    else: ?>
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
                <li>Coffee</li>
                <li>Tea</li>
                <li>Milk</li>
            </ul>
        </div>
    </div>
</div>
