<?php 
	// We check in which language we will work
	if (isset($_SESSION["DATAGLOBAL"][0]) && !empty($_SESSION["DATAGLOBAL"][0])) $C->LANGUAGE = $_SESSION["DATAGLOBAL"][0];

	$this->load_langfile('inside/admin.php');

	// We are here only if you're logged in
	if (!$this->user->is_logged || !$this->user->info->is_network_admin) {
		echo('0: '.$this->lang('admin_no_session'));
		die();
	}
	
	$errored = 0;
	$txterror = '';
	

	$theme = '';
	
	if (isset($_POST["t"]) && !empty($_POST["t"])) $theme = $this->db1->e($_POST["t"]);
	
	if (empty($theme)) { $errored = 1; $txterror .= 'Error... '; }
	
	if ($errored == 1) {
		echo('0: '.$txterror);
	} else {

		$this->db1->query("UPDATE settings SET value='".$theme."' WHERE word='THEME' LIMIT 1");
		$txtreturn = $this->lang('admin_txt_msgok');
		echo('1: '.$txtreturn);
		return;
	
	}
?>