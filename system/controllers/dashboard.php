<?php
	if( !$this->user->is_logged ) {
		$this->redirect('home');
	}
	
	/*************************************************************************/
	// needed before proceeding
	require_once('_all-required-language.php');
	
	$this->load_langfile('global/global.php');	
	$this->load_langfile('inside/dashboard.php');

	/*************************************************************************/
	
	
	require_once('_all-required-dashboard.php');
	

	/*************************************************************************/

	$cadidsposts = '';
	$idpostscensors = $this->db2->fetch_all("SELECT iditem FROM censored WHERE typeitem=1 AND iduser=".$this->user->id);
	if (count($idpostscensors)>0) {
		$arridscens = array();
		foreach($idpostscensors as $oneidc) $arridscens[] = $oneidc->iditem;
		$cadidsposts = ' AND activities.iditem NOT in ('.implode($arridscens,',').') ';
	}


	$D->totalactivities = $this->db2->fetch_field('SELECT count(DISTINCT activities.id) FROM relations, activities WHERE (subscriber='.$this->user->id.' AND activities.iduser=leader) OR activities.iduser='.$this->user->id.$cadidsposts);

	// first extract the ids of the activities
	$idsactivities = $this->db2->fetch_all('SELECT DISTINCT activities.id FROM relations, activities WHERE (subscriber='.$this->user->id.' AND activities.iduser=leader) OR activities.iduser='.$this->user->id.$cadidsposts.' ORDER BY activities.date DESC LIMIT 0,'.$C->NUM_ACTIVITIES_PAGE);

	
	$theactivities = new stdClass;

	$arridsact = array();

	foreach($idsactivities as $oneida) $arridsact[] = $oneida->id;

	if (count($arridsact)>0) {
		$theactivities = $this->db2->fetch_all('SELECT activities.iduser, action, idresult , iduser2, iditem, date, username, firstname, lastname, avatar, registerdate FROM activities, users WHERE (users.iduser=activities.iduser) AND activities.id in('.implode($arridsact,',').') ORDER BY date DESC');
	}
	
	$D->numactivities = count($theactivities);
	
	// see if there is "follows" and group the user ids seconds
	$usersseconds = array();
	foreach($theactivities as $oneactivity) {
		if ($oneactivity->action == 1) {
			$usersseconds[] = $oneactivity->iduser2;
		}
	}
	if (count($usersseconds) > 0) $following = $this->db2->fetch_all('SELECT iduser, username, firstname, lastname, avatar, num_posts, validated FROM users WHERE iduser in ('.implode($usersseconds,',').')');
	unset($usersseconds);
	/*********************************************************/

	
	$D->htmlResult = '';
	
	ob_start();
	foreach($theactivities as $oneactivity) {

		$D->userName = $oneactivity->username;
		$D->nameUser = (empty($oneactivity->firstname) || empty($oneactivity->lastname))?$oneactivity->username:($oneactivity->firstname.' '.$oneactivity->lastname);
		$D->userAvatar = $oneactivity->avatar;
		$D->isThisUserVerified0 = $this->network->isUserVerified($oneactivity->iduser);
		
		switch ($oneactivity->action) {
			case 1:
				$D->txtaction = $this->lang('dashboard_activities_follow');
				foreach($following as $onefg) {
					if ($onefg->iduser == $oneactivity->iduser2) {
						$D->isThisUserVerified = $onefg->validated==1?TRUE:FALSE;
						$D->f_username = $onefg->username;
						$D->f_date = $oneactivity->{'date'};
						$D->f_name = (empty($onefg->firstname) || empty($onefg->lastname))?stripslashes($onefg->username):(stripslashes($onefg->firstname).' '.stripslashes($onefg->lastname));
						$D->f_avatar = $onefg->avatar;
						$D->f_numphotos = $onefg->num_posts;
						$this->load_template('__dashboard-activity-one-following.php');
						
					}
				}
				break;
			
			case 2:
				// in case de hability albums
				break;
			
			case 3:
				$D->a_date = $oneactivity->{'date'};
				
				$D->idpost = $oneactivity->iditem;
				$D->codepost = $this->network->getCodePost($D->idpost);
				$onePost = new post($D->codepost);
				$D->idUser = $onePost->iduser;
				$D->typepost = $onePost->typepost;
				$D->numlikes = $onePost->numlikes;
				$D->numcommentstotal = $onePost->numcomments;
				$D->post = stripslashes($onePost->post);
				$D->typepost = $onePost->typepost;
				$D->valueattach = $onePost->valueattach;
				
				// see if the favorite is for the observer
				$D->liketoUser = 0;
				if ($D->is_logged == 1) {
					if ($onePost->likeOfUser($this->user->id) > 0) $D->liketoUser = 1;
				}
				
				$D->htmlcommentspost = '';
				$D->totalcomments = $onePost->numComments();
				$allcommentspost = $onePost->getComments(0,$C->NUM_COMMENTS_PER_POST);
				$D->numcomments = count($allcommentspost);
				
				$allcommentspost = array_reverse($allcommentspost);	
				
				foreach($allcommentspost as $onecomment){
					ob_start();
					$D->o_comment = stripslashes($onecomment->comment);
					$D->o_username = stripslashes($onecomment->username);
					$D->o_firstname = stripslashes($onecomment->firstname);
					$D->o_lastname = stripslashes($onecomment->lastname);
					$D->o_nameUser = (empty($D->o_firstname) || empty($D->o_lastname))?stripslashes($D->o_username):(stripslashes($D->o_firstname).' '.stripslashes($D->o_lastname));
					$D->o_whendate = $onecomment->whendate;
					$D->o_avatar =  empty($onecomment->avatar)?$C->AVATAR_DEFAULT:$onecomment->avatar;
					$D->o_idcomment = $onecomment->idcomment;
					$D->o_idUser = $onecomment->iduser;
					$D->o_idpost = $D->idpost;
					$D->o_idUserOwner = $D->idUser;
					$D->o_codepost = $D->codepost;
					$this->load_template('__dashboard-onecomment-post.php');
					$D->htmlcommentspost .= ob_get_contents();
					ob_end_clean();
				}
				unset($onecomment);
				
				$this->load_template('__dashboard-activity-one-post.php');
				unset($onePost);
				break;
			
			case 4:
				//if comment a post
				break;
				
			case 5:
				// If add a post to your favorites
				break;
		}
	}

	$D->htmlResult = ob_get_contents();
	ob_end_clean();

	/*************************************************************************/

	$D->optionactive = 1;
	$this->load_template('dashboard.php');
?>
