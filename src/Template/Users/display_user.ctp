<h1><?php echo $user->username; ?></h1>
<div
    class="row">
    <br><br>
    <?php
    if(!empty($user))?>
            <div class="post-­‐box">
                <div class="post-­‐content">
                    <div class="caption">
                        <h4>
                            <?php echo $user->email; ?>
                        </h4>
                        <h5>
                             <?php echo $user->subscription; ?>
                        </h5>
                        <br>
                    </div>
                </div>
            </div>
</div>