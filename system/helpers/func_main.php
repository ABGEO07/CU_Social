<?php
/** 
 * 
 * NOTE: Designed for use with PHP version 4, 5 and up
 * @author Santos Montano B. <ssmontano@hotmail.com, litosantosm@gmail.com>
 * @country Perú
 * @copyright 2014
 * @version: 1.2 
 * 
 */

/** 
 * Main functions that are used in the application.
 */

	function __autoload($class_name)
	{
		global $C;
		require_once( $C->INCPATH.'classes/class_'.$class_name.'.php' );
	}
		
	function validateUrl($url)
	{
		if (!preg_match('/^(http|https):\/\/((([a-z0-9.-]+\.)+[a-z]{2,4})|([0-9\.]{1,4}){4})(\/([a-zA-Z?-?0-9-_\?\:%\.\?\!\=\+\&\/\#\~\;\,\@]+)?)?$/', $url))
			return FALSE;
		else return TRUE;
	}
	
	//function that checks if a URL is or is not "http"
	function fitsUrl($url) 
	{
		
		if( ! preg_match('/^(ftp|http|https):\/\//', $url) ) {
			$url = 'http://'.$url;
		}
	
		if( !validateUrl($url) ) return FALSE;
		
		return $url;
	}
	
	// function that returns the code of a YouTube video
	function getCodeYoutube($url, $lencodyt)
	{
		if( preg_match('/^http(s)?\:\/\/(www\.|de\.)?youtu\.be\/([a-z0-9-\_]{3,})/i', $url, $resultado) ) {
			$codeyt = $resultado[3];
			if (strlen($codeyt)!=$lencodyt) return FALSE;
			else return $codeyt;
		}
		if( preg_match('/^http(s)?\:\/\/(www\.|de\.)?youtube\.com\/watch\?(feature\=player\_embedded&)?v\=([a-z0-9-\_]{3,})/i', $url, $resultado) ) {
			$codeyt = $resultado[4];
			if (strlen($codeyt)!=$lencodyt) return FALSE;
			else return $codeyt;
		}
		return FALSE;
	}
	
	function emailValid($e)
	{
		return preg_match('/^[a-zA-Z0-9._%-]+@([a-zA-Z0-9.-]+\.)+[a-zA-Z]{2,4}$/u', $e);
	}
	
	
	// Function that checks if a code is already registered in a table
	function verifyCode($code, $table, $field)
	{			
		$mibdx2 = $GLOBALS["db2"];
		
		// check whether the code is being used
		$rx2 = $mibdx2->query("SELECT ".$field." FROM ".$table." WHERE ".$field."='".$code."' LIMIT 1");
		$numusers = $mibdx2->num_rows($rx2);

		if ($numusers==0) return FALSE;
		else return TRUE;			
	}
	
	//*************************************************************************
	// Function that returns a random string.
	// $numcharacters: number of letters returned string will.
	// $withrepeated: if 0 returns a string with no letters repeated. 
	// $withrepeated: if 1 returns a string with repeated letters.
	function getCode($numcharacters,$withrepeated)
	{
		$code = '';
		$characters = "0123456789abcdfghjkmnpqrstvwxyzBCDFGHJKMNPQRSTVWXYZ";
		$i = 0;
		while ($i < $numcharacters) {
			$char = substr($characters, mt_rand(0, strlen($characters)-1), 1);	
			if ($withrepeated == 1) {
				$code .= $char;
				$i += 1;			
			} else {
				if(!strstr($code,$char)) {
					$code .= $char;
					$i += 1;
				}
			}
		}
		return $code;
	}
	//*************************************************************************

	// Function that seeks a 11 digit code that is not registered in a table.
	function uniqueCode($numcharacters, $withrepeated, $table, $field)
	{
		$code = getCode($numcharacters, $withrepeated);
		while (verifyCode($code, $table, $field)) {	
			$code = getCode(11, 1);
		}
		return $code;
	}
	//*************************************************************************
	
	function dateago($thetime)
	{
		global $page;
		//if (empty($thetime)) return $page->lang('global_time_end',array('#TXTEND#'=>'1 '.$page->lang('global_time_sec'))); 
		$today = time();    
		$datediff = abs($today - $thetime);
		if ($datediff <= 0) $datediff = 1;
		$txtago = '';
		$years = floor($datediff / (365*60*60*24));  
		$months = floor(($datediff - $years * 365*60*60*24) / (30*60*60*24));  
		$days = floor(($datediff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));  
		$hours= floor($datediff/3600);  
		$minutes= floor($datediff/60);  
		$seconds= floor($datediff);  
		//year checker  
		if( $txtago == '' ) {  
			if( $years > 1 ) $txtago = $years.' '.$page->lang('global_time_yeas');  
			elseif( $years == 1 ) $txtago = $years.' '.$page->lang('global_time_yea');  
		}  
		//month checker  
		if( $txtago == '') {  
			if( $months > 1 ) $txtago = $months.' '.$page->lang('global_time_mons');  
			elseif( $months == 1 ) $txtago = $months.' '.$page->lang('global_time_mon');  
		}  
		//month checker  
		if( $txtago == '') {  
			if( $days > 1 ) $txtago = $days.' '.$page->lang('global_time_days');
			elseif( $days == 1 ) $txtago = $days.' '.$page->lang('global_time_day');  
		}  
		//hour checker  
		if( $txtago == '' ) {  
			if( $hours > 1 ) $txtago = $hours.' '.$page->lang('global_time_hous');  
			elseif( $hours == 1 ) $txtago = $hours.' '.$page->lang('global_time_hou');  
		}  
		//minutes checker  
		if( $txtago == '') {  
			if( $minutes > 1 ) $txtago = $minutes.' '.$page->lang('global_time_mins');
			elseif( $minutes == 1 ) $txtago = $minutes.' '.$page->lang('global_time_min');
		}  
		//seconds checker  
		if( $txtago == '') {  
			if( $seconds > 1 ) $txtago = $seconds.' '.$page->lang('global_time_secs');
			elseif( $seconds == 1 ) $txtago = $seconds.' '.$page->lang('global_time_sec');
		}  
		return $page->lang('global_time_end',array('#TXTEND#'=>$txtago));
	}
	
	//*************************************************************************
	
	function analyzeMessage($txtmsg) {
		global $C;
		// Parse any @mentions or links
		
		$analyzedText = preg_replace(array('/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:\'".,<>?«»“”‘’]))/', '/(^|[^a-z0-9_])@([a-z0-9_]+)/i', '/(^|[^a-z0-9_])#(\w+)/u'), array('<a href="$1" target="_blank" rel="nofollow" class="linkblue">$1</a>', '$1<span class="linkblue3"><a href="'.$C->SITE_URL.'$2">@$2</a></span>', '$1<span class="linkblue3"><a href="'.$C->SITE_URL.'search/t%%%$2">#$2</a></span>'), ($txtmsg));
		
		
		// Define smiles
		$emoticons = array(
			':-)'	=> 'regular.gif',
			':)'	=> 'regular.gif',
			':-D'	=> 'teeth.gif',
			':d'	=> 'teeth.gif',
			':D'	=> 'teeth.gif',
			':-O'	=> 'omg.gif',
			':o'	=> 'omg.gif',
			':O'	=> 'omg.gif',
			':-P'	=> 'tongue.gif',
			':p'	=> 'tongue.gif',
			':P'	=> 'tongue.gif',
			';-)'	=> 'wink.gif',
			';)'	=> 'wink.gif',
			':(('	=> 'cry.gif',
			':-('	=> 'sad.gif',
			':('	=> 'sad.gif',
			':-S'	=> 'confused.gif',
			':s'	=> 'confused.gif',
			':S'	=> 'confused.gif',
			':-|'	=> 'what.gif',
			':|'	=> 'what.gif',
			':-$'	=> 'red.gif',
			':$'	=> 'red.gif',
			'(H)'	=> 'shades.gif',
			'(h)'	=> 'shades.gif',
			':-@'	=> 'angry.gif',
			':@'	=> 'angry.gif',
			'(A)'	=> 'angel.gif',
			'(a)'	=> 'angel.gif',
			'(6)'	=> 'devil.gif',
			':-#'	=> 'dumb.gif',
			'8o|'	=> 'growl.gif',
			'8-|'	=> 'nerd.gif',
			'^o)'	=> 'sarcastic.gif',
			':-*'	=> 'secret.gif',
			'+o('	=> 'sick.gif',
			':^)'	=> 'noknow.gif',
			'*-)'	=> 'pensive.gif',
			'8-)'	=> 'eyesrolled.gif',
			'|-)'	=> 'sleepy.gif',
			'(C)'	=> 'coffee.gif',
			'(c)'	=> 'coffee.gif',
			'(Y)'	=> 'thumbs_up.gif',
			'(y)'	=> 'thumbs_up.gif',
			'(n)'	=> 'thumbs_down.gif',
			'(N)'	=> 'thumbs_down.gif',
			'(B)'	=> 'beer_mug.gif',
			'(b)'	=> 'beer_mug.gif',
			'(D)'	=> 'martini.gif',
			'(d)'	=> 'martini.gif',
			'(X)'	=> 'girl.gif',
			'(x)'	=> 'girl.gif',
			'(Z)'	=> 'guy.gif',
			'(z)'	=> 'guy.gif',
			'({)'	=> 'guy_hug.gif',
			'(})'	=> 'girl_hug.gif',
			':-['	=> 'bat.gif',
			':['	=> 'bat.gif',
			'(^)'	=> 'cake.gif',
			'(L)'	=> 'heart.gif',
			'(l)'	=> 'heart.gif',
			'(U)'	=> 'broken_heart.gif',
			'(u)'	=> 'broken_heart.gif',
			'(K)'	=> 'kiss.gif',
			'(k)'	=> 'kiss.gif',
			'(G)'	=> 'present.gif',
			'(g)'	=> 'present.gif',
			'(F)'	=> 'rose.gif',
			'(f)'	=> 'rose.gif',
			'(W)'	=> 'wilted_rose.gif',
			'(w)'	=> 'wilted_rose.gif',
			'(p)'	=> 'camera.gif',
			'(P)'	=> 'camera.gif',
			'(~)'	=> 'film.gif',
			'(@)'	=> 'cat.gif',
			'(dg)'	=> 'dog.gif',
			'(T)'	=> 'phone.gif',
			'(t)'	=> 'phone.gif',
			'(I)'	=> 'lightbulb.gif',
			'(i)'	=> 'lightbulb.gif',
			'(8)'	=> 'note.gif',
			'(S)'	=> 'moon.gif',
			'(*)'	=> 'star.gif',
			'(e)'	=> 'envelope.gif',
			'(E)'	=> 'envelope.gif',
			'(o)'	=> 'clock.gif',
			'(O)'	=> 'clock.gif',
			'(sn)'	=> 'scargot.gif',
			'(pl)'	=> 'dish.gif',
			'(||)'	=> 'bowl.gif',
			'(pi)'	=> 'pizza.gif',
			'(so)'	=> 'ball.gif',
			'(au)'	=> 'car.gif',
			'(um)'	=> 'umb.gif',
			'(ip)'	=> 'isla.gif',
			'(co)'	=> 'pc.gif',
			'(mp)'	=> 'cel.gif',
			'(st)'	=> 'rain.gif',
			'(li)'	=> 'torm.gif',
			'(mo)'	=> 'money.gif',
		);
		
		foreach($emoticons as $emoticons => $img) {
			$analyzedText = str_replace($emoticons, '<img src="'.$C->SITE_URL.'themes/default/imgs/emotics/'.$img.'" height="19" width="19" />', $analyzedText);
		}
		
		$analyzedText = str_replace('%%%', ':', $analyzedText);

		return str_replace(PHP_EOL, '<br/>',stripslashes($analyzedText));
	}
	
	//*************************************************************************
	
	function str_cut($str, $mx)
	{
		return mb_strlen($str)>$mx ? mb_substr($str, 0, $mx-1).'...' : $str;
	}
	
	//*************************************************************************
	
	function getCaptcha()
	{
		global $C;
		$Valor1 = rand(1,9);
		$Valor2 = rand(1,9);
		$_SESSION['captchasum'] = $Valor1 + $Valor2 ;
		$C->ctcha1 = $Valor1;
		$C->ctcha2 = $Valor2;
	}
	
	//*************************************************************************
	
	function clearnl($msg)
	{
		return preg_replace("/(\r?\n){2,}/", "\n\n", $msg);
	}
	
	//*************************************************************************
	
 	function send_mail( $from, $to, $subject, $body ) {
		$headers = '';
		$headers .= "From: $from\n";
		$headers .= "Return-Path: $from\n";
		$headers .= "MIME-Version: 1.0\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers .= "Date: " . date('r', time()) . "\n";
		
	
		mail( $to, $subject , $body, $headers );
	}
	
	
	function send_mail_phpmailer($target, $subject, $message)
	{
		require("class.phpmailer.php");
		global $C;
		$mymail = new PHPMailer();
		$mybody = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Email from '.$C->FromName.'</title>
		</head><body>';
		$mybody .= $message;
		$mybody .= '</body></html>';
		
		$mymail->From = $C->From;
		$mymail->FromName = $C->FromName;
		$mymail->Host = $C->Host;
		$mymail->Port = $C->Port;
		$mymail->Mailer = 'smtp';
		$mymail->AddAddress($target);
		$mymail->Subject = $subject;
		$mymail->Body = $mybody;
		$mymail->SMTPAuth = "true";
		$mymail->Username = $C->UsernameMail;
		$mymail->Password = $C->PasswordMail;
		
		$mymail->IsHTML(true);    
		
		if(!$mymail->Send()) return FALSE;
		else return TRUE;
	}
	
	/*************************************/
	/*************************************/
	
	/*** Update v1.2 ***/

	function genSpaceEmoticons($divspace) {
		global $C;
		
		// Define smiles
		$emoticons = array(
			':-)'	=> 'regular.gif',
			':-D'	=> 'teeth.gif',
			':-O'	=> 'omg.gif',
			':-P'	=> 'tongue.gif',
			';-)'	=> 'wink.gif',
			':(('	=> 'cry.gif',
			':-('	=> 'sad.gif',
			':-S'	=> 'confused.gif',
			':-|'	=> 'what.gif',
			':-$'	=> 'red.gif',
			'(H)'	=> 'shades.gif',
			':-@'	=> 'angry.gif',
			'(A)'	=> 'angel.gif',
			'(6)'	=> 'devil.gif',
			':-#'	=> 'dumb.gif',
			'8o|'	=> 'growl.gif',
			'8-|'	=> 'nerd.gif',
			'^o)'	=> 'sarcastic.gif',
			':-*'	=> 'secret.gif',
			'+o('	=> 'sick.gif',
			':^)'	=> 'noknow.gif',
			'*-)'	=> 'pensive.gif',
			'8-)'	=> 'eyesrolled.gif',
			'|-)'	=> 'sleepy.gif',
			'(C)'	=> 'coffee.gif',
			'(Y)'	=> 'thumbs_up.gif',
			'(N)'	=> 'thumbs_down.gif',
			'(B)'	=> 'beer_mug.gif',
			'(D)'	=> 'martini.gif',
			'(X)'	=> 'girl.gif',
			'(Z)'	=> 'guy.gif',
			'({)'	=> 'guy_hug.gif',
			'(})'	=> 'girl_hug.gif',
			':-['	=> 'bat.gif',
			'(^)'	=> 'cake.gif',
			'(L)'	=> 'heart.gif',
			'(U)'	=> 'broken_heart.gif',
			'(K)'	=> 'kiss.gif',
			'(G)'	=> 'present.gif',
			'(F)'	=> 'rose.gif',
			'(W)'	=> 'wilted_rose.gif',
			'(P)'	=> 'camera.gif',
			'(~)'	=> 'film.gif',
			'(@)'	=> 'cat.gif',
			'(dg)'	=> 'dog.gif',
			'(T)'	=> 'phone.gif',
			'(I)'	=> 'lightbulb.gif',
			'(8)'	=> 'note.gif',
			'(S)'	=> 'moon.gif',
			'(*)'	=> 'star.gif',
			'(E)'	=> 'envelope.gif',
			'(O)'	=> 'clock.gif',
			'(sn)'	=> 'scargot.gif',
			'(pl)'	=> 'dish.gif',
			'(||)'	=> 'bowl.gif',
			'(pi)'	=> 'pizza.gif',
			'(so)'	=> 'ball.gif',
			'(au)'	=> 'car.gif',
			'(um)'	=> 'umb.gif',
			'(ip)'	=> 'isla.gif',
			'(co)'	=> 'pc.gif',
			'(mp)'	=> 'cel.gif',
			'(st)'	=> 'rain.gif',
			'(li)'	=> 'torm.gif',
			'(mo)'	=> 'money.gif',
		);

		$txtEmoticons = '';
		foreach($emoticons as $emoticons => $img) {
			$txtEmoticons .= '<span class="onesmile"><img onclick="insertEmoticon(\''.$divspace.'\', \''.$emoticons.'\');" class="hand" title="'.$emoticons.'" src="'.$C->SITE_URL.'themes/default/imgs/emotics/'.$img.'" height="19" width="19" /></span>';
		}
		return $txtEmoticons;
	}
	
	function analyzeMessageChat($txtmsg) {
		global $C;
		// Parse any @mentions or links
		
		$analyzedText = preg_replace(array('/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:\'".,<>?«»“”‘’]))/', '/(^|[^a-z0-9_])@([a-z0-9_]+)/i', '/(^|[^a-z0-9_])#(\w+)/u'), array('<a href="$1" target="_blank" rel="nofollow" class="linkblue">$1</a>', '$1<span class="linkblue3"><a href="'.$C->SITE_URL.'$2">@$2</a></span>', '$1<span class="linkblue3"><a href="'.$C->SITE_URL.'search/t%%%$2">#$2</a></span>'), ($txtmsg));
		
		
		// Define smiles
		$emoticons = array(
			':-)'	=> 'regular.gif',
			':)'	=> 'regular.gif',
			':-D'	=> 'teeth.gif',
			':d'	=> 'teeth.gif',
			':D'	=> 'teeth.gif',
			':-O'	=> 'omg.gif',
			':o'	=> 'omg.gif',
			':O'	=> 'omg.gif',
			':-P'	=> 'tongue.gif',
			':p'	=> 'tongue.gif',
			':P'	=> 'tongue.gif',
			';-)'	=> 'wink.gif',
			';)'	=> 'wink.gif',
			':(('	=> 'cry.gif',
			':-('	=> 'sad.gif',
			':('	=> 'sad.gif',
			':-S'	=> 'confused.gif',
			':s'	=> 'confused.gif',
			':S'	=> 'confused.gif',
			':-|'	=> 'what.gif',
			':|'	=> 'what.gif',
			':-$'	=> 'red.gif',
			':$'	=> 'red.gif',
			'(H)'	=> 'shades.gif',
			'(h)'	=> 'shades.gif',
			':-@'	=> 'angry.gif',
			':@'	=> 'angry.gif',
			'(A)'	=> 'angel.gif',
			'(a)'	=> 'angel.gif',
			'(6)'	=> 'devil.gif',
			':-#'	=> 'dumb.gif',
			'8o|'	=> 'growl.gif',
			'8-|'	=> 'nerd.gif',
			'^o)'	=> 'sarcastic.gif',
			':-*'	=> 'secret.gif',
			'+o('	=> 'sick.gif',
			':^)'	=> 'noknow.gif',
			'*-)'	=> 'pensive.gif',
			'8-)'	=> 'eyesrolled.gif',
			'|-)'	=> 'sleepy.gif',
			'(C)'	=> 'coffee.gif',
			'(c)'	=> 'coffee.gif',
			'(Y)'	=> 'thumbs_up.gif',
			'(y)'	=> 'thumbs_up.gif',
			'(n)'	=> 'thumbs_down.gif',
			'(N)'	=> 'thumbs_down.gif',
			'(B)'	=> 'beer_mug.gif',
			'(b)'	=> 'beer_mug.gif',
			'(D)'	=> 'martini.gif',
			'(d)'	=> 'martini.gif',
			'(X)'	=> 'girl.gif',
			'(x)'	=> 'girl.gif',
			'(Z)'	=> 'guy.gif',
			'(z)'	=> 'guy.gif',
			'({)'	=> 'guy_hug.gif',
			'(})'	=> 'girl_hug.gif',
			':-['	=> 'bat.gif',
			':['	=> 'bat.gif',
			'(^)'	=> 'cake.gif',
			'(L)'	=> 'heart.gif',
			'(l)'	=> 'heart.gif',
			'(U)'	=> 'broken_heart.gif',
			'(u)'	=> 'broken_heart.gif',
			'(K)'	=> 'kiss.gif',
			'(k)'	=> 'kiss.gif',
			'(G)'	=> 'present.gif',
			'(g)'	=> 'present.gif',
			'(F)'	=> 'rose.gif',
			'(f)'	=> 'rose.gif',
			'(W)'	=> 'wilted_rose.gif',
			'(w)'	=> 'wilted_rose.gif',
			'(p)'	=> 'camera.gif',
			'(P)'	=> 'camera.gif',
			'(~)'	=> 'film.gif',
			'(@)'	=> 'cat.gif',
			'(dg)'	=> 'dog.gif',
			'(T)'	=> 'phone.gif',
			'(t)'	=> 'phone.gif',
			'(I)'	=> 'lightbulb.gif',
			'(i)'	=> 'lightbulb.gif',
			'(8)'	=> 'note.gif',
			'(S)'	=> 'moon.gif',
			'(*)'	=> 'star.gif',
			'(e)'	=> 'envelope.gif',
			'(E)'	=> 'envelope.gif',
			'(o)'	=> 'clock.gif',
			'(O)'	=> 'clock.gif',
			'(sn)'	=> 'scargot.gif',
			'(pl)'	=> 'dish.gif',
			'(||)'	=> 'bowl.gif',
			'(pi)'	=> 'pizza.gif',
			'(so)'	=> 'ball.gif',
			'(au)'	=> 'car.gif',
			'(um)'	=> 'umb.gif',
			'(ip)'	=> 'isla.gif',
			'(co)'	=> 'pc.gif',
			'(mp)'	=> 'cel.gif',
			'(st)'	=> 'rain.gif',
			'(li)'	=> 'torm.gif',
			'(mo)'	=> 'money.gif',
		);
		
		if ($C->CHAT_WITH_EMOTICONS) {
			foreach($emoticons as $emoticons => $img) {
				$analyzedText = str_replace($emoticons, '<img src="'.$C->SITE_URL.'themes/default/imgs/emotics/'.$img.'" height="19" width="19" />', $analyzedText);
			}
		}
		
		$analyzedText = str_replace('%%%', ':', $analyzedText);

		return stripslashes($analyzedText);
	}
	
	/*** end Update v1.2 ***/


	
?>