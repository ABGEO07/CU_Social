<div id="dashboard1">
	<div class="titleblock"><span id="icot"><img src="<?php echo $C->SITE_URL?>themes/<?php echo $C->THEME ?>/imgs/icodashboardmenu.png"></span><span id="txtt"><?php echo $this->lang('dashboard_title');?></span></div>
    
    <div>
    	<div class="menuglobal">
            <a href="<?php echo $C->SITE_URL?>dashboard">
            <div class="menuoption <?php echo($D->optionactive==1?'act':'inact')?>">
                <div class="icopc"><span title="<?php echo $this->lang('dashboard_vmenu_opc_home');?>"><img src="<?php echo $C->SITE_URL?>themes/<?php echo $C->THEME ?>/imgs/iconewsfeed.png"></span></div>
                <div class="txtopc"><?php echo $this->lang('dashboard_vmenu_opc_home');?></div>
                <div class="sh"></div>
            </div>
            </a>
		</div>        
        
        <hr>
        
		<div class="menuglobal">
            <a href="<?php echo $C->SITE_URL?>dashboard/myposts">
            <div class="menuoption <?php echo($D->optionactive==9?'act':'inact')?>">
                <div class="icopc"><span title="<?php echo $this->lang('dashboard_vmenu_opc_myposts');?>"><img src="<?php echo $C->SITE_URL?>themes/<?php echo $C->THEME ?>/imgs/icomyposts.png"></span></div>
                <div class="txtopc"><?php echo $this->lang('dashboard_vmenu_opc_myposts');?></div>
                <div class="sh"></div>
            </div>
            </a>
        </div>
        
        <hr>
        
            
		<div class="menuglobal">
            <a href="<?php echo $C->SITE_URL?>dashboard/myphotos">
            <div class="menuoption <?php echo($D->optionactive==3?'act':'inact')?>">
                <div class="icopc"><span title="<?php echo $this->lang('dashboard_vmenu_opc_myphotos');?>"><img src="<?php echo $C->SITE_URL?>themes/<?php echo $C->THEME ?>/imgs/icomyphotos.png"></span></div>
                <div class="txtopc"><?php echo $this->lang('dashboard_vmenu_opc_myphotos');?></div>
                <div class="sh"></div>
            </div>
            </a>
        </div>
        
        <hr>
        
		<div class="menuglobal">
            <a href="<?php echo $C->SITE_URL?>dashboard/myvideos">
            <div class="menuoption <?php echo($D->optionactive==10?'act':'inact')?>">
                <div class="icopc"><span title="<?php echo $this->lang('dashboard_vmenu_opc_myvideos');?>"><img src="<?php echo $C->SITE_URL?>themes/<?php echo $C->THEME ?>/imgs/icomyvideos.png"></span></div>
                <div class="txtopc"><?php echo $this->lang('dashboard_vmenu_opc_myvideos');?></div>
                <div class="sh"></div>
            </div>
            </a>
        </div>
        
        <hr>
            
		<div class="menuglobal">
            <a href="<?php echo $C->SITE_URL?>dashboard/mymessages">
            <div class="menuoption <?php echo($D->optionactive==8?'act':'inact')?>">
                <div class="icopc"><span title="<?php echo $this->lang('dashboard_vmenu_opc_mymessages');?>"><img src="<?php echo $C->SITE_URL?>themes/<?php echo $C->THEME ?>/imgs/icomessages.png"></span></div>
                <div class="txtopc"><?php echo $this->lang('dashboard_vmenu_opc_mymessages');?></div>
                <div class="sh"></div>
            </div>
            </a>
        </div>
            
        <hr>
        
        <div class="menuglobal">
            <a href="<?php echo $C->SITE_URL?>dashboard/mylikes">
            <div class="menuoption <?php echo($D->optionactive==4?'act':'inact')?>">
                <div class="icopc"><span title="<?php echo $this->lang('dashboard_vmenu_opc_myfavorites');?>"><img src="<?php echo $C->SITE_URL?>themes/<?php echo $C->THEME ?>/imgs/icodashboardfavorites.png"></span></div>
                <div class="txtopc"><?php echo $this->lang('dashboard_vmenu_opc_myfavorites');?></div>
                <div class="sh"></div>
            </div>
            </a>
        </div>
        
        <hr>
        
        <div class="menuglobal">
            <a href="<?php echo $C->SITE_URL?>dashboard/mycomments">
            <div class="menuoption <?php echo($D->optionactive==5?'act':'inact')?>">
                <div class="icopc"><span title="<?php echo $this->lang('dashboard_vmenu_opc_mycomments');?>"><img src="<?php echo $C->SITE_URL?>themes/<?php echo $C->THEME ?>/imgs/icodashboardcomments.png"></span></div>
                <div class="txtopc"><?php echo $this->lang('dashboard_vmenu_opc_mycomments');?></div>
                <div class="sh"></div>
            </div>
            </a>
        </div>
            
        <hr>
        
        <div class="menuglobal">
            <a href="<?php echo $C->SITE_URL?>dashboard/followers">
            <div class="menuoption <?php echo($D->optionactive==6?'act':'inact')?>">
                <div class="icopc"><span title="<?php echo $this->lang('dashboard_vmenu_opc_followers');?>"><img src="<?php echo $C->SITE_URL?>themes/<?php echo $C->THEME ?>/imgs/icodashboardfollower.png"></span></div>
                <div class="txtopc"><?php echo $this->lang('dashboard_vmenu_opc_followers');?></div>
                <div class="sh"></div>
            </div>
            </a>
        </div>
            
        <hr>
            
        <div class="menuglobal">
            <a href="<?php echo $C->SITE_URL?>dashboard/following">
            <div class="menuoption <?php echo($D->optionactive==7?'act':'inact')?>">
                <div class="icopc"><span title="<?php echo $this->lang('dashboard_vmenu_opc_following');?>"><img src="<?php echo $C->SITE_URL?>themes/<?php echo $C->THEME ?>/imgs/icodashboardfollowing.png"></span></div>
                <div class="txtopc"><?php echo $this->lang('dashboard_vmenu_opc_following');?></div>
                <div class="sh"></div>
            </div>
            </a>
        </div>
        
        <hr>
        
		<div class="menuglobal">
            <a href="<?php echo $C->SITE_URL?>dashboard/myinformation">
            <div class="menuoption <?php echo($D->optionactive==2?'act':'inact')?>">
                <div class="icopc"><span title="<?php echo $this->lang('dashboard_vmenu_opc_myinformation');?>"><img src="<?php echo $C->SITE_URL?>themes/<?php echo $C->THEME ?>/imgs/icomyinformation.png"></span></div>
                <div class="txtopc"><?php echo $this->lang('dashboard_vmenu_opc_myinformation');?></div>
                <div class="sh"></div>
            </div>
            </a>
		</div>        
        
        <hr>
        
        <div class="menuglobal">
            <a href="<?php echo $C->SITE_URL?>logout">
            <div class="menuoption <?php echo($D->optionactive==11?'act':'inact')?>">
                <div class="icopc"><span title="<?php echo $this->lang('dashboard_vmenu_opc_logout');?>"><img src="<?php echo $C->SITE_URL?>themes/<?php echo $C->THEME ?>/imgs/icodashboardlogout.png"></span></div>
                <div class="txtopc"><?php echo $this->lang('dashboard_vmenu_opc_logout');?></div>
                <div class="sh"></div>
            </div>
            </a>
        </div>
            
        <hr>
        
    </div>


</div>