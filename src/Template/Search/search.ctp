<html>
    <head>
        <?=$this->Html->css('search.css') ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
    <body>
        <div class="search-section">
            <h1>
                Users
            </h1>
            <div class="result-list">
                <?php
                    if(mysqli_num_rows($sth_users)!=0):
                        while ($rowData = mysqli_fetch_assoc($sth_users)):?>
                            <div class="result-user">
                                <?php
                                if($rowData['user_image'] == "") :?>
                                    <?= $this->Html->link($this->Html->image('../webroot/img/profile/profile.jpg', array('class' => 'smallimg')), ['controller' => 'users', 'action' => 'display_user', $rowData['id']], array('escape' => false)); ?>

                                <?php else:?>
                                    <?=$this->Html->link($this->Html->image('../webroot/img/profile/'.$rowData['user_image'], array('class' => 'smallimg')), ['controller' => 'users', 'action' => 'display_user', $rowData['id']], array('escape' => false)); ?>

                                <?php endif ?>
                                <h5>
                                    <?php echo $rowData['username'] ?>
                                </h5>
                            </div>
                        <?php endwhile;
                    else:?>
                    <h4>
                        No user found
                    </h4>
                    <?php endif;
                ?>
            </div>
        </div>
        <div class="search-section">
            <h1>
                Groups
            </h1>
            <div class="result-list">
                <?php
                if(mysqli_num_rows($sth_groups)!=0):
                    while ($rowData = mysqli_fetch_assoc($sth_groups)):?>
                        <div class="result-groups">

                        </div>
                    <?php endwhile;
                else:?>
                    <h4>
                    </h4>
                <?php endif;
                ?>
            </div>
        </div>
        <div class="search-section">
            <h1>
                Files
            </h1>
            <div class="result-list">
                <?php
                if(mysqli_num_rows($sth_files)!=0):
                    while ($rowData = mysqli_fetch_assoc($sth_files)):?>
                        <div class="result-files">

                        </div>
                    <?php endwhile;
                else:?>
                    <h4>
                    </h4>
                <?php endif;
                ?>
            </div>
        </div>
    </body>
</html>