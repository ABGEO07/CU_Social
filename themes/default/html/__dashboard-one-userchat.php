<div class="oneuserchat">
	<div class="avatar"><a href="<?php echo $C->SITE_URL.$D->f_username?>/messages"><img src="<?php echo $C->SITE_URL.$C->FOLDER_AVATAR.'min2/'.(empty($D->f_avatar)?'default.jpg':$D->f_avatar); ?>" class="rounded8"></a></div>
    <div class="info">
    	<div class="name">
        	<span class="linkblue2"><a href="<?php echo $C->SITE_URL.$D->f_username?>/messages"><?php echo $D->f_name?></a></span>
			<?php if ($D->isThisUserVerified) { ?>
            <span><img src="<?php echo $C->SITE_URL?>themes/<?php echo $C->THEME; ?>/imgs/userverified.png"></span>
            <?php } ?>
        </div>
        <div class="moreinfo"><?php echo $D->f_lastmessage; ?></div>
        <div class="datewhen"><abbr class="timeago" title="<?php echo (date('Y-m-d',$D->f_date).'T'.date('H:i:s',$D->f_date).($C->TimeAgoWithZ==TRUE?'Z':'')); ?>"><?php echo date($this->lang('global_format_date'),$D->f_date);?></abbr></div>
    </div>
    <div class="sh"></div>
	
</div>