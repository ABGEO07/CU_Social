<?php
/** 
 * 
 * NOTE: Designed for use with PHP version 4, 5 and up
 * @author Santos Montano B. <ssmontano@hotmail.com, litosantosm@gmail.com>
 * @country Perú
 * @copyright 2014
 * @version: 1.4 
 * 
 */

/** 
 * Configuration file.
 */

	$C	= new stdClass;
	
	$C->INCPATH = dirname(__FILE__).'/';
	chdir( $C->INCPATH );
	
	$C->SITE_URL = 'http://www.cusocial.ga/';
	$C->DOMAIN = 'www.cusocial.ga';

	// MySQL SETTINGS
	$C->DB_HOST = 'localhost';
	$C->DB_USER = 'ABGEO';
	$C->DB_PASS = 'phVphVo4$24k4';
	$C->DB_NAME = 'CUSocial';
	$C->DB_MYEXT = 'mysqli'; // 'mysqli' or 'mysql'	

	
	// Folder of user data
	$C->FOLDER_DATA = "data/";
	
	// Temporary folder
	$C->FOLDER_TMP = "data/tmp/";
	
	// Avatars folder users
	$C->FOLDER_AVATAR = "data/avatars/"; 
	
	$C->AVATAR_DEFAULT = 'default.jpg';
	
	// Sizes for the avatar
	$C->widthAvatar0 = 180;
	$C->widthAvatar1 = 100;
	$C->heightAvatar1 = 100;
	$C->widthAvatar2 = 50;
	$C->heightAvatar2 = 50;
	$C->widthAvatar3 = 26;
	$C->heightAvatar3 = 26;	
	
	$C->SIZE_IMAGEN_AVATAR = 2 * 1024 * 1024; // 2 MB;
	
	// photos folder users
	$C->FOLDER_PHOTOS = "data/photos/";
	
	$C->SIZE_PHOTO = 5 * 1024 * 1024; // 5 MB;
	
	// Sizes for the photos
	$C->widthPhotoThumbail = 230;
	
	/**************************/

	
	//if you want to view page view statistics in administration section set the value to TRUE,
	$C->write_page_view_is_active	= FALSE;

	
	/*********************************/
	// add in version version 1.1
	
	$C->LOGIN_WITH_FACEBOOK = FALSE;
	$C->FB_APPID = '';
	$C->FB_SECRET = '';
	
	// Settings for Mail
	$C->FromName = 'phpShark';
	$C->From = 'no-reply@kanorika.com';
	$C->Host = 'mail.kanorika.com';
	$C->Port = '587';
	$C->UsernameMail = 'no-reply@kanorika.com';
	$C->PasswordMail = 'yourpasswordemail';
	
	/*************************************/
	/*************************************/
	
	/*** Update v1.4 ***/
	
	// To consider the time zone (in timeago)
	$C->TimeAgoWithZ = TRUE;
	
	/*** end Update v1.4 ***/

?>