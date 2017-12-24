
		<!-- #MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				<span class="ribbon-button-alignment"> 
					<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh" rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true" data-reset-msg="Would you like to RESET all your saved widgets and clear LocalStorage?"><i class="fa fa-refresh"></i></span> 
				</span>

				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<!-- This is auto generated -->
				</ol>
				<!-- end breadcrumb -->

			</div>
			<!-- END RIBBON -->

			<!-- #MAIN CONTENT -->
			<div id="content">
				<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-users"></i> Manage Users <span></span></h1>
	</div>
		
</div>
<!-- widget grid -->
<section id="widget-grid" class="">

	
	<div class="row">

		
		<article class="col-sm-12 col-md-12 col-lg-12">
			
			<div class="jarviswidget" id="wid-id-2" data-widget-editbutton="false" data-widget-custombutton="false">
				
				<header>
					<span class="widget-icon"> <i class="fa fa-users"></i> </span>
					<h2>Users List</h2>				
					
				</header>
				
				
				<!-- widget div-->
				<div>
					
					<!-- widget content -->
					<div class="widget-body no-padding">
						<div class="widget-body-toolbar">
							
							<div class="row">
								
								<div class="col-sm-12 text-right">
									<a class="btn btn btn-primary" href="<?php echo base_url().'auth/create_user'?>">
										<i class="fa fa-plus"></i> Create User
									</a>
									<a class="btn btn btn-success" href="<?php echo base_url().'auth/create_group'?>">
										<i class="fa fa-plus"></i> Create Group
									</a>
								</div>
							</div>
								

						</div>
						<div class="table-responsive">
						
							
							<table class="table table-bordered">
							<thead>
							  <tr>
								<th ><?php echo lang('index_fname_th');?></th>
								<th ><?php echo lang('index_lname_th');?></th>
								<th ><?php echo lang('index_email_th');?></th>
								<th ><?php echo lang('index_groups_th');?></th>
								<th ><?php echo lang('index_status_th');?></th>
								<th ><?php echo lang('index_action_th');?></th>
							  </tr>
							</thead>
							<tbody>
							  <?php foreach ($users as $user):?>
							  <tr align="left">
								<td	><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
								<td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
								<td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
								<td style="text-transform:uppercase"><?php foreach ($user->groups as $group):?>
								  <?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
								  <?php endforeach ?></td>
								<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
								  </td>
								<td data-title="Action"><?php echo anchor("auth/edit_user/".$user->id, 'Edit') ;?></td>
							  </tr>
							  <?php endforeach;?>
							</tbody>
						  </table>
							
						</div>

					</div>
					<!-- end widget content -->
					
				</div>
				<!-- end widget div -->
				
			</div>
			<!-- end widget -->


		</article>
	</div>

	<!-- end row -->

</section>
<!-- end widget grid -->

			</div>
			
			<!-- END #MAIN CONTENT -->

		</div>
		<!-- END #MAIN PANEL -->

		