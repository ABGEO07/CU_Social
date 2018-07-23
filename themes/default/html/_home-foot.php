
<div id="footsite">

    <div id="container" class="centered">
    
    	<?php if ($C->SHOW_MENU_PAGES) { ?>
    	<div><?php $this->load_template('__pagesmenu-home.php');?></div>
		
        <?php } ?>
    
        <?php if ($C->SHOW_MENU_LANGUAJE) { ?>
        <div class="mrg10T"><?php $this->load_template('__languagemenu-home.php');?></div>
        
        <?php } ?>

        <div id="foot-right" class="mrg10T">&copy; <?php echo date('Y'); ?> - <?php echo $C->SITE_TITLE; ?></div>
        
        <div class="sh"></div>

    </div>

</div>
<?php if (isset($D->msg_alert) && !empty($D->msg_alert)) {?>
<script>
	alert('<?php echo $D->msg_alert?>')
</script>
<?php } ?>