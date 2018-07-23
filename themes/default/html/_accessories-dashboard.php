<div id="dashboard3">

	<div class="mrg20B">
		<div class="titleblock"><?php echo $this->lang('dashboard_more_users'); ?></div>
        
        <?php if (empty($D->useraccesories)) {?>
        
        	<div class="pdn10 centered"><?php echo $this->lang('dashboard_more_users_empty')?></div>
        	<hr>
            
        <?php } else { ?>
        
        	<div id="useraccesories"><?php echo $D->useraccesories?></div>
        
        <?php }?>
        
        <div id="linkmoreuser" class="linkblue"><a href="<?php echo $C->SITE_URL?>directory/people"><?php echo $this->lang('dashboard_more_users_linkviewmore')?></a></div>
        <hr>
        
    </div>
    
	<?php if (!empty($D->adsDashboard1)) { ?>
	<div class="mrg20B centered">
		<span><?php echo stripslashes($D->adsDashboard1) ?></span>
    </div>
    <?php } ?>

	<?php if (!empty($D->adsDashboard2)) { ?>
	<div class="mrg20B centered">
		<span><?php echo stripslashes($D->adsDashboard2) ?></span>
    </div>
    <?php } ?>

</div>