<?php 
	$users = $this->session->userdata;
	
	// print_r($users);
	// die;
	// foreach ($users as $user){}
?>
<!-- #NAVIGATION -->
		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS/SASS variables -->
		<aside id="left-panel">

			<!-- User info -->
			<div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as is --> 
					
					<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
						<img src="<?php echo base_url().'assets/img/avatars/male.png'; ?>" alt="me" class="online" /> 
						<span>
							<?php 
							$username =  $this->Common_model->findfield("users",'id',$users['user_id'],'username');
							// echo $user->username;
							echo $username;
							// echo $users['user_id'];
							// die;
							?>
						</span>
						<i class="fa fa-angle-down"></i>
					</a> 
					
				</span>
			</div>
			<!-- end user info -->

			<!-- NAVIGATION : This navigation is also responsive

			To make this navigation dynamic please make sure to link the node
			(the reference to the nav > ul) after page load. Or the navigation
			will not initialize.
			-->
			<nav>
				<!-- 
				NOTE: Notice the gaps after each icon usage <i></i>..
				Please note that these links work a bit different than
				traditional href="" links. See documentation for details.
				-->

				<ul>
					<li ng-repeat="" class="top-menu-invisible">
						<a href="<?php echo base_url().'admin/DASHBOARD/user_dashboard'?>" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
					</li>
					<li class="">
						<a href="<?php echo base_url().'admin/MASTERS/site_otherdetail'?>" title="Dashboard"><i class="fa fa-lg fa-fw fa-building"></i> <span class="menu-item-parent">Manage Site Details</span></a>
					</li>
					<li class="">
						<a href="<?php echo base_url().'admin/CUSTOMER/view_customers'?>" title="Dashboard"><i class="fa fa-lg fa-fw fa-group"></i> <span class="menu-item-parent">Customers</span></a>
					</li>
					<li class="">
						<a href="<?php echo base_url().'admin/ACCOUNTS/expense_ledger'?>" title="Dashboard"><i class="fa fa-lg fa-fw fa-edit"></i> <span class="menu-item-parent">Expenses</span></a>
					</li>
					<li class="">
						<a href="<?php echo base_url().'admin/ACCOUNTS/receive_ledger'?>" title="Dashboard"><i class="fa fa-lg fa-fw fa-credit-card"></i> <span class="menu-item-parent">Receive Payment</span></a>
					</li>
					<li class="">
						<a href="<?php echo base_url().'admin/ACCOUNTS/vendor_ledger'?>" title="Dashboard"><i class="fa fa-lg fa-fw fa-rupee"></i> <span class="menu-item-parent">Vendor's Payment</span></a>
					</li>
					<li class="">
						<a href="<?php echo base_url().'admin/MASTERS/manageSite_new'?>" title="Dashboard"><i class="fa fa-lg fa-fw fa-suitcase"></i> <span class="menu-item-parent">Property Sell</span></a>
					</li>
					<li class="">
						<a href="<?php echo base_url().'admin/ACCOUNTS/reports'?>" title="Dashboard"><i class="fa fa-lg fa-fw fa-link"></i> <span class="menu-item-parent">Reports</span></a>
					</li>
				</ul>
			</nav>
			<a href="http://dngbuilder.com" target="_blank" class="btn btn-primary nav-demo-btn"><i class="fa fa-info-circle"></i> www.dngbuilder.com</a>
			
			

			<span class="minifyme" data-action="minifyMenu"> <i class="fa fa-arrow-circle-left hit"></i> </span>

		</aside>
		<!-- END NAVIGATION -->
		