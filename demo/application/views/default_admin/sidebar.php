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
						<a href="<?php echo base_url().'admin/DASHBOARD/dashboard'?>" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
					</li>
					<li class="">
						<a href="<?php echo base_url().'admin/MASTERS/expenseCategory'?>" title="Dashboard"><i class="fa fa-lg fa-fw fa-credit-card"></i> <span class="menu-item-parent">Expense Category</span></a>
					</li>
					<li class="">
						<a href="<?php echo base_url().'admin/EMPLOYEE/view_employee'?>" title="Dashboard"><i class="fa fa-lg fa-fw fa-group"></i> <span class="menu-item-parent">Employee</span></a>
					</li>
					<li class="">
						<a href="<?php echo base_url().'admin/CUSTOMER/view_customers'?>" title="Customers"><i class="fa fa-lg fa-fw fa-group"></i> <span class="menu-item-parent">Customers</span></a>
					</li>
					<li class="">
						<a href="<?php echo base_url().'admin/ACCOUNTS/vendor'?>" title="Add Vendors"><i class="fa fa-lg fa-fw fa-user"></i> <span class="menu-item-parent">Add Vendors</span></a>
					</li>
					<li class="">
						<a href="<?php echo base_url().'admin/DASHBOARD/users_accounts'?>" title="Users Accounts"><i class="fa fa-lg fa-fw fa-key"></i> <span class="menu-item-parent">Users Accounts</span></a>
					</li>
				</ul>
			</nav>
			
			
			

			<span class="minifyme" data-action="minifyMenu"> <i class="fa fa-arrow-circle-left hit"></i> </span>

		</aside>
		<!-- END NAVIGATION -->
		