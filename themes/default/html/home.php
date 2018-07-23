<?php
$this->load_template('_home-header.php');
$this->load_template('_top.php');
?>
<script src="<?php echo $C->SITE_URL ?>themes/<?php echo $C->THEME ?>/js/js_login.js"></script>
<script src="<?php echo $C->SITE_URL ?>themes/<?php echo $C->THEME ?>/js/js_register.js"></script>
<script src="<?php echo $C->SITE_URL ?>themes/<?php echo $C->THEME ?>/js/md5.js"></script>
<div id="infohome">
	<div id="container">

    	<div id="topmsg">
        	<div id="line01"><?php echo $this->lang('home_msg_line1')?></div>
        	<div id="line02"><?php echo $this->lang('home_msg_line2')?></div>
        </div>

        <?php if ($C->LOGIN_WITH_FACEBOOK) { ?>
        <div class="areabfacebook">
        	<a href="<?php echo $D->fb_loginUrl; ?>" class="undecorated">
        	<div class="bfacebook">
            	<div class="iconofbf"><img src="<?php echo $C->SITE_URL?>themes/<?php echo $C->THEME ?>/imgs/icobfacebook.png"></div>
                <div class="titlebfb"><div class="centered"><?php echo $this->lang('home_bfacebook_login')?></div></div>
                <div class="sh"></div>
            </div>
            </a>
        </div>
        <?php } ?>



		<div id="home-boxcenter">
			<div id="box1">
            	<div id="boxwelcome" class="rounded">
                	<div class="pdn10">
										<img src="<?php echo $C->SITE_URL.'themes/'.$C->THEME.'/imgs/imgwelcome.jpg'?>">
									</div>
              </div>
            </div>
            <div id="box2">

                <div id="boxlogin" class="rounded">
                	<div class="pdn10">
                    	<div id="arealogin">
                            <form id="formlogin" name="formlogin" method="post">
                            <div class="pdn10R"><input type="text" name="usernamel" id="usernamel" class="form-control" placeholder="<?php echo $this->lang('home_f_login_un')?>"></div>
                            <div class="pdn10R mrg10T"><input type="password" name="passwordl" id="passwordl" class="form-control" placeholder="<?php echo $this->lang('home_f_login_pw')?>"></div>
                            <div id="errorlogin" class="alert-error mrg10T pdn10 centered hide"></div>
                            <div class="mrg10T">
                                <div class="fleft"><button id="btlogin" name="btlogin" type="submit" class="btn btn-sky"><?php echo $this->lang('home_f_login_bt')?></button></div>
                                <div id="linkrecovery" class="fright mrg8T linkblue mrg5T	onlyblue hand"><?php echo $this->lang('home_f_recovery_txtlink')?></div>
																<br /><br />
																<div id="linkregister" class="fleft mrg8T linkblue mrg5T	onlyblue hand"><?php echo $this->lang('home_f_register_txtlink')?></div>
                                <div class="sh"></div>
                            </div>
                            </form>
                        </div>

                    	<div id="arearecovery" class="hide">
                            <form id="formrecovery" name="formrecovery" method="post">
                            <div class="pdn10R"><input type="text" name="emailrecovery" id="emailrecovery" class="form-control" placeholder="<?php echo $this->lang('home_f_recovery_inputemail')?>"></div>
                            <div id="errorrecovery" class="alert-error mrg10T pdn10 centered hide"></div>
                            <div id="okrecovery" class="alert-success mrg10T pdn10 centered hide"></div>
                            <div class="mrg10T">
                                <div><button id="btrecovery" name="btrecovery" type="submit" class="btn btn-orange"><?php echo $this->lang('home_f_recovery_brecovery')?></button></div>
                                <div id="linkreturn" class="mrg10T mrg5L linkblue onlyblue hand"><?php echo $this->lang('home_f_recovery_linklogin')?></div>
                                <div class="sh"></div>
                            </div>
                            </form>
                        </div>

												<div id="areasignup" class="pdn10 hide">
														<div class="centered txtsize02 bold mrg10B grey2"><?php echo $this->lang('home_f_signup_tl');?></div>
														<form id="formregister" name="formregister" method="post">
														<div class="pdn10R"><input type="text" name="email" id="email" class="form-control" placeholder="<?php echo $this->lang('home_f_signup_em')?>"></div>
															<div class="pdn10R mrg10T"><input type="password" name="passwordr" id="passwordr" class="form-control" placeholder="<?php echo $this->lang('home_f_signup_pw')?>"></div>
															<div class="pdn10R mrg10T"><input type="password" name="repassword" id="repassword" class="form-control" placeholder="<?php echo $this->lang('home_f_signup_repw')?>"></div>
															<div class="mrg10T">
																<?php echo getCaptcha()?>
																<div class="mrg21L"><input type="text" name="captcha" id="captcha" placeholder="<?php echo $C->ctcha1?> + <?php echo $C->ctcha2?> = " class="form-control width30c"></div>
																<div class="pdn10R mrg10T">
																	<input type="checkbox" id="termsr" name="termsr" />
														      <label for="termsr"><?php echo $this->lang('home_f_signup_trmstxt')?> <a href="/page/p:termsofuse" class="linkblue onlyblue hand" style="text-decoration: none;"><?php echo $this->lang('home_f_signup_trmslnk')?></a>.</label>

																</div>
																<div class="sh"></div>
															</div>
															<div id="errorsignup" class="alert-error mrg10T pdn10 centered hide"></div>
															<div class="mrg10T">
																<div class="fleft"><button id="btsignup" name="btsignup" type="submit" class="btn btn-green"><?php echo $this->lang('home_f_signup_bt')?></button></div>
																<div id="linklogin" class="fright mrg8T linkblue mrg5T	onlyblue hand"><?php echo $this->lang('home_f_login_bt')?></div>
																<div class="sh"></div>
															</div>
															</form>
													</div>

													<div id="registerok" class="hide"></div>

                    </div>
                </div>
<script>
var ltxterror1 = '<?php echo $this->lang('home_f_login_error1')?>';
var ltxterror2 = '<?php echo $this->lang('home_f_login_error2')?>';
var ltxterror3 = '<?php echo $this->lang('home_f_login_error3')?>';
var ltxterror4 = '<?php echo $this->lang('home_f_login_error4')?>';
var txtconnerror = '<?php echo $this->lang('home_f_txtconnerror')?>';

$('#btlogin').click(function(){
	actionLogin('#btlogin', '#errorlogin');
	return false;
})

$('#linkregister').click(function(){
	$('#arealogin').slideUp('slow', function(){
		$('#areasignup').slideDown('slow');
	});
	return false;
})

$('#linklogin').click(function(){
	$('#areasignup').slideUp('slow', function(){
		$('#arealogin').slideDown('slow');
	});
	return false;
})

$('#linkrecovery').click(function(){
	$('#arealogin').slideUp('slow', function(){
		$('#arearecovery').slideDown('slow');
	});
	return false;
})

$('#linkreturn').click(function(){
	$('#arearecovery').slideUp('slow', function(){
		$('#arealogin').slideDown('slow');
	});
	return false;
})

var recvtxterror1 = '<?php echo $this->lang('home_f_recovery_error1')?>';
$('#btrecovery').click(function(){
	actionRecovery('#btrecovery', '#errorrecovery', '#okrecovery');
	return false;
})
</script>

<script>
	var rtxterror1 = '<?php echo $this->lang('home_f_signup_error1')?>';
	var rtxterror3 = '<?php echo $this->lang('home_f_signup_error3')?>';
	var rtxterror4 = '<?php echo $this->lang('home_f_signup_error4')?>';
	var rtxterror5 = '<?php echo $this->lang('home_f_signup_error8')?>';
	var rtxterror6 = '<?php echo $this->lang('home_f_signup_error10')?>';
	var rtxterror7 = '<?php echo $this->lang('home_f_signup_error11')?>';
	var rtxterror8 = '<?php echo $this->lang('home_f_signup_error12')?>';

	$('#btsignup').click(function(){
		actionRegister('#btsignup', '#errorsignup', '#areasignup', '#registerok');
		return false;
	})
</script>

            </div>
            <div class="sh"></div>
		</div>


<?php
$miniuser = array();
for($i = 0; $i < $D->numuserAleat; $i++) {
	$miniuser[$i]='';
	if (isset($D->userAleat[$i])) $miniuser[$i]='<a href="'.$C->SITE_URL.$D->userAleat[$i]->username.'"><img src="'.$C->SITE_URL.$C->FOLDER_AVATAR.'min2/'.(empty($D->userAleat[$i]->avatar)?$C->AVATAR_DEFAULT:$D->userAleat[$i]->avatar).'"></a>';
}
?>

    	<div id="usersAleat">

        	<div class="mrg20T mrg10B">
				<?php for($i = 0; $i < $D->numuserAleat; $i++) { ?>
                <div class="spacephoto">
                	<div class="oneminiphoto"><?php echo $miniuser[$i]?></div>
                </div>
                <?php } ?>
                <div class="sh"></div>
            </div>

        </div>

        <div class="sh"></div>

	</div>
</div>


<?php
$this->load_template('_home-foot.php');
$this->load_template('_footer.php');
?>
