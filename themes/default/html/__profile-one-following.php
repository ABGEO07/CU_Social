<div class="onefollower">
	<div class="avatar"><a href="<?php echo $C->SITE_URL.$D->f_username?>"><img src="<?php echo $C->SITE_URL.$C->FOLDER_AVATAR.'min2/'.(empty($D->f_avatar)?'default.jpg':$D->f_avatar); ?>" class="rounded8"></a></div>
    <div class="info">
    	<div class="name">
        	<span class="linkblue2"><a href="<?php echo $C->SITE_URL.$D->f_username?>"><?php echo $D->f_name?></a></span>
			<?php if ($D->isThisUserVerified) { ?>
            <span><img src="<?php echo $C->SITE_URL?>themes/<?php echo $C->THEME ?>/imgs/userverified.png"></span>
            <?php } ?>
        </div>
        <div class="moreinfo"><?php echo $D->f_numphotos==1?$this->lang('profile_following_hasphoto', array('#NUM#'=>$D->f_numphotos)):$this->lang('profile_following_hasphotos', array('#NUM#'=>$D->f_numphotos)); ?></div>
    </div>
    <div class="sh"></div>
	
</div>