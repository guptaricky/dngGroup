	<!--

	TABLE OF CONTENTS.
	
	Use search to find needed section.
	
	===================================================================
	
	|  01. #CSS Links                |  all CSS links and file paths  |
	|  02. #FAVICONS                 |  Favicon links and file paths  |
	|  03. #GOOGLE FONT              |  Google font link              |
	|  04. #APP SCREEN / ICONS       |  app icons, screen backdrops   |
	|  05. #BODY                     |  body tag                      |
	|  06. #HEADER                   |  header tag                    |
	|  07. #PROJECTS                 |  project lists                 |
	|  08. #TOGGLE LAYOUT BUTTONS    |  layout buttons and actions    |
	|  09. #MOBILE                   |  mobile view dropdown          |
	|  10. #SEARCH                   |  search field                  |
	|  11. #NAVIGATION               |  left panel & navigation       |
	|  12. #MAIN PANEL               |  main panel                    |
	|  13. #MAIN CONTENT             |  content holder                |
	|  14. #PAGE FOOTER              |  page footer                   |
	|  15. #SHORTCUT AREA            |  dropdown shortcuts area       |
	|  16. #PLUGINS                  |  all scripts and plugins       |
	
	===================================================================
	
	-->
	
	<!-- #BODY -->
	<!-- Possible Classes

		* 'smart-style-{SKIN#}'
		* 'smart-rtl'         - Switch theme mode to RTL
		* 'menu-on-top'       - Switch to top navigation (no DOM change required)
		* 'no-menu'			  - Hides the menu completely
		* 'hidden-menu'       - Hides the main menu but still accessable by hovering over left edge
		* 'fixed-header'      - Fixes the header
		* 'fixed-navigation'  - Fixes the main menu
		* 'fixed-ribbon'      - Fixes breadcrumb
		* 'fixed-page-footer' - Fixes footer
		* 'container'         - boxed layout mode (non-responsive: will not work with fixed-navigation & fixed-ribbon)
	-->
<body class="smart-style-0" ng-app="dngGroup">

<div class="modal fade" id="modal-alerte">
	<div class="modal-dialog">
		<div class="modal-content">
			 <form method='post' class="form-horizontal"  action="<?php echo base_url('auth/change_password'); ?>" >
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title"><span id="addnewdept">Change Password</span></h4>
			</div>
			 <div class="modal-body">
				<div class="row-fluid">
          <div class="span10" style="margin-left:100px;">
            <span class="control-group">
              <label class="control-label" for="oldpass">Old Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
              <span class="controls">
                <input type="password" class='form-control input-sm' id="oldpass" name='oldpass'  style="width: 250px;"  placeholder="Old Password" required>
              </span>
            </span>
          </div>
          </div>
		  <div class="row-fluid">
		  <div class="span10" style="margin-left:100px;">
            <span class="control-group">
              <label class="control-label" for="newpass">New Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
              <span class="controls">
                <input type="password" id="newpass" class='form-control input-sm' name='newpass'  style="width: 250px;" placeholder="New Password not less than 8 character" required>
				<span style="font-size:10px;">Password length can not be less than 8 character</span>
              </span>
            </span>
          </div>
          </div>
		  <div class="row-fluid">
		  <div class="span10" style="margin-left:100px;">
            <span class="control-group">
              <label class="control-label" for="confpass">Confirm New &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
              <span class="controls">
                <input type="password" id="confpass" class='form-control input-sm' name='confpass'  style="width: 250px;" placeholder="Confirm new Password" required>
				<input type="hidden" id="user_id" name="user_id" >
              </span>
            </span>
          </div>
        </div><br/>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-sm btn-danger" id="save" name="save">Submit </button>
                <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
			</div>
			</form>
		</div>
	</div>
</div>
		<!-- #HEADER -->
		<header id="header">
			<div id="logo-group">

				<!-- PLACE YOUR LOGO HERE -->
				<span id="logo"> <img src="<?php //echo base_url().'assets/img/logo.png'; ?>" alt="Demo"> </span>
				<!-- END LOGO PLACEHOLDER -->

				<!-- Note: The activity badge color changes when clicked and resets the number to 0
					 Suggestion: You may want to set a flag when this happens to tick off all checked messages / notifications -->
				<span id="activity" class="activity-dropdown"> <i class="fa fa-user"></i> <b class="badge"> 21 </b> </span>

				<!-- AJAX-DROPDOWN : control this dropdown height, look and feel from the LESS variable file -->
				<div class="ajax-dropdown">

					<!-- the ID links are fetched via AJAX to the ajax container "ajax-notifications" -->
					<div class="btn-group btn-group-justified" data-toggle="buttons">
						<span class="text-primary"><b>Notifications</b></span><span class="pull-right"><a href="#">Mark all as read</a></span>
					</div>

					<!-- notification content -->
					<div class="ajax-notifications custom-scroll">

						<!--<div class="alert alert-transparent">
							<h4>No New Notifications</h4>
							This blank page message helps protect your privacy, or you can show the first message here automatically.
						</div>-->
						<div class="">
							
						</div>
					</div>
					<!-- end notification content -->

					<!-- footer: refresh area -->
					<span> <a href="<?php echo base_url().'admin/DASHBOARD/emp_activity'?>">See All </a>
						<button type="button" data-loading-text="<i class='fa fa-refresh fa-spin'></i> Loading..." class="btn btn-xs btn-default pull-right">
							<i class="fa fa-refresh"></i>
						</button> </span>
					<!-- end footer -->

				</div>
				<!-- END AJAX-DROPDOWN -->
			</div>

			<!-- #PROJECTS: projects dropdown -->
			<div class="project-context hidden-xs">

				<span class="label">This Site:</span>
				<span class="project-selector dropdown-toggle" data-toggle="dropdown">Balance Rs. <b id="balance"></b> <i class="fa fa-angle-downn"></i></span>

				<!-- Suggestion: populate this list with fetch and push technique -->
				<ul class="dropdown-menu">
					<li>
						<a href="javascript:void(0);">This is the Site Overall Balance amount.</a>
					</li>
					<li>
						<a href="javascript:void(0);">Site Expenses & Income will be adjusted to this Balance only.</a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="javascript:void(0);"><i class="fa fa-power-off"></i> Exit</a>
					</li>
				</ul>
				<!-- end dropdown-menu-->

			</div>
			<!-- end projects dropdown -->
			
			<!-- #PROJECTS: projects dropdown -->
			<div class="project-context hidden-xs hidden">
				<h4 style="color:gray;font-size:20px;margin-left:450px;" class="m-l-100">Balance : </h4>
			</div>
			<!-- end projects dropdown -->
			
			<!-- #TOGGLE LAYOUT BUTTONS -->
			<!-- pulled right: nav area -->
			<div class="pull-right">
				
				<!-- collapse menu button -->
				<div id="hide-menu" class="btn-header pull-right">
					<span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
				</div>
				<!-- end collapse menu -->
				
				<!-- #MOBILE -->
				<!-- Top menu profile link : this shows only when top menu is active -->
				<ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
					<li class="">
						<a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown"> 
							<img src="img/avatars/sunny.png" alt="John Doe" class="online" />  
						</a>
						<ul class="dropdown-menu pull-right">
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"><i class="fa fa-cog"></i> Setting</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="#ajax/profile.html" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-user"></i> <u>P</u>rofile</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="toggleShortcut"><i class="fa fa-arrow-down"></i> <u>S</u>hortcut</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Full <u>S</u>creen</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="<?php echo base_url().'auth/logout';?>" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong></a>
							</li>
						</ul>
					</li>
				</ul>

				<!-- logout button -->
				<div id="logout" class="btn-header transparent pull-right">
					<span> <a href="<?php echo base_url().'auth/logout';?>" title="Sign Out" data-action="userLogout" data-logout-msg="You can improve your security further after logging out by closing this opened browser"><i class="fa fa-power-off"></i></a> </span>
				</div>
				<div id="change_password" class="btn-header transparent pull-right">
					<span><a href="#modal-alerte" data-toggle="modal" title="Change Password" ><i class="fa fa-key"></i></a></span>
				</div>
				<!-- end logout button -->

				<!-- search mobile button (this is hidden till mobile view port) -->
				<div id="search-mobile" class="btn-header transparent pull-right">
					<span> <a href="javascript:void(0)" title="Search"><i class="fa fa-search"></i></a> </span>
				</div>
				<!-- end search mobile button -->
				
				<!-- #SEARCH -->
				<!-- input: search field -->
				<form action="#ajax/search.html" class="header-search pull-right">
					<input id="search-fld" type="text" name="param" placeholder="Find reports and more">
					<button type="submit">
						<i class="fa fa-search"></i>
					</button>
					<a href="javascript:void(0);" id="cancel-search-js" title="Cancel Search"><i class="fa fa-times"></i></a>
				</form>
				<!-- end input: search field -->

				<!-- fullscreen button -->
				<div id="fullscreen" class="btn-header transparent pull-right">
					<span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>
				</div>
				<!-- end fullscreen button -->

				<!-- #Voice Command: Start Speech -->
				<!-- NOTE: Voice command button will only show in browsers that support it. Currently it is hidden under mobile browsers. 
						   You can take off the "hidden-sm" and "hidden-xs" class to display inside mobile browser-->
				<div id="speech-btn" class="btn-header transparent pull-right hidden-sm hidden-xs">
					<div> 
						<a href="javascript:void(0)" title="Voice Command" data-action="voiceCommand"><i class="fa fa-microphone"></i></a> 
						<div class="popover bottom"><div class="arrow"></div>
							<div class="popover-content">
								<h4 class="vc-title">Voice command activated <br><small>Please speak clearly into the mic</small></h4>
								<h4 class="vc-title-error text-center">
									<i class="fa fa-microphone-slash"></i> Voice command failed
									<br><small class="txt-color-red">Must <strong>"Allow"</strong> Microphone</small>
									<br><small class="txt-color-red">Must have <strong>Internet Connection</strong></small>
								</h4>
								<a href="javascript:void(0);" class="btn btn-success" onclick="commands.help()">See Commands</a> 
								<a href="javascript:void(0);" class="btn bg-color-purple txt-color-white" onclick="$('#speech-btn .popover').fadeOut(50);">Close Popup</a> 
							</div>
						</div>
					</div>
				</div>
				<!-- end voice command -->

				
				

			</div>
			<!-- end pulled right: nav area -->

		</header>
		<!-- END HEADER -->

		
<script>
		$(document).ready(function(){
			GetBalance();
		});
		
		function GetBalance(){			
			$.post('<?php echo base_url('admin/ACCOUNTS/get_balance'); ?>', '', function (response) {
				$("#balance").html(response);
			});	 
		}
</script>
<script>
$(function() {
	$(".datepicker").datepicker({changeMonth:true,changeYear:true,dateFormat: 'yy-mm-dd'});				
});
</script>