<div id="profile03">

	<div class="mrg20B">
		<div class="titleblock"><?php echo $this->lang('profile_more_users'); ?></div>
        
        <?php if (empty($D->useraccesories)) {?>
        
        	<div class="pdn10 centered"><?php echo $this->lang('profile_more_users_empty')?></div>
            <hr>
        
        <?php } else { ?>
        
        	<div id="useraccesories"><?php echo $D->useraccesories?></div>
        
        <?php }?>
        
        <div id="linkmoreuser" class="linkblue"><a href="<?php echo $C->SITE_URL?>directory/people"><?php echo $this->lang('profile_more_users_linkviewmore')?></a></div>
        <hr>

    </div>

    
	<?php if (!empty($D->adsProfile1)) { ?>
	<div class="mrg20B centered">
		<span><?php echo stripslashes($D->adsProfile1) ?></span>
    </div>
    <?php } ?>

	<?php if (!empty($D->adsProfile2)) { ?>
	<div class="mrg20B centered">
		<span><?php echo stripslashes($D->adsProfile2) ?></span>
    </div>
    <?php } ?>

</div>