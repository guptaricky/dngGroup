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

		<!-- You can also add more buttons to the
		ribbon for further usability

		Example below:

		<span class="ribbon-button-alignment pull-right" style="margin-right:25px">
			<a href="#" id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa fa-grid"></i> Change Grid</a>
			<span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa fa-plus"></i> Add</span>
			<button id="search" class="btn btn-ribbon" data-title="search"><i class="fa fa-search"></i> <span class="hidden-mobile">Search</span></button>
		</span> -->

	</div>
	<!-- END RIBBON -->

	<!-- #MAIN CONTENT -->
	<div id="content">
		<div class="row">
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-12">
				<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-wrench"></i> Edit User <span>> <?php echo lang('edit_user_subheading');?></span></h1>
			</div>
				
		</div>
	<!-- widget grid -->
	<section id="widget-grid" class="">

		
		<div class="row">
		
		<article class="col-sm-12 col-md-12 col-lg-12">
			
			<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false">
				
				<header>
					<span class="widget-icon"> <i class="fa fa-user"></i> </span>
					<h2><?php echo lang('edit_user_heading');?> </h2>				
					
				</header>

				<!-- widget div-->
				<div>
					
					<!-- widget content -->
					<div class="widget-body no-padding">
						<div id="infoMessage"><?php echo $message;?></div>
						<?php echo form_open(uri_string(), array('class' => 'smart-form', 'id' => 'checkout-form'));?>
							<fieldset>
							<div class="row">
								<section class="col col-6">
								<div class="row">
									<section class="col col-12">
									<?php echo lang('edit_user_fname_label', 'first_name');?>
										<label class="input"> <i class="icon-prepend fa fa-user" ></i>
											<?php echo form_input($first_name);?>
										</label>
									</section>
									<section class="col col-12">
									<?php echo lang('edit_user_lname_label', 'last_name');?>
									<label class="input"> <i class="icon-prepend fa fa-user" ></i>
										<?php echo form_input($last_name);?>
									</label>
									</section>
									<section class="col col-12">
									<?php echo lang('edit_user_company_label', 'company');?>
									<label class="input"> <i class="icon-prepend fa fa-building"></i>
										<?php echo form_input($company);?>
									</label>
									</section>
									<section class="col col-12">
									<?php echo lang('edit_user_phone_label', 'phone');?>
									<label class="input"> <i class="icon-prepend fa fa-phone"></i>
										<?php echo form_input($phone);?>
									</label>
									</section>
									<section class="col col-12">
									<?php echo lang('edit_user_password_label', 'password');?>
									<label class="input"> <i class="icon-prepend fa fa-lock"></i>
										<?php echo form_input($password);?>
									</label>
									</section>
									
									<section class="col col-12">
									<?php echo lang('edit_user_password_confirm_label', 'password_confirm');?>
									<label class="input"> <i class="icon-prepend fa fa-lock"></i>
										<?php echo form_input($password_confirm);?>
									</label>
									</section>
																
								</div>
								</section>
								<section class="col col-6">
								<label class="label"><h3>Groups :</h3></label>
								<fieldset>
								<div class="row">
									<section class="col col-12">
										<label class="checkbox"> 
											 <?php if ($this->ion_auth->is_admin()): ?>

									  <?php foreach ($groups as $group):?>
										  <label class="checkbox">
										  <?php
											  $gID=$group['id'];
											  $checked = null;
											  $item = null;
											  foreach($currentGroups as $grp) {
												  if ($gID == $grp->id) {
													  $checked= ' checked="checked"';
												  break;
												  }
											  }
										  ?>
										  <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
										  <i></i><?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
										  </label>
									  <?php endforeach?>

								  <?php endif ?>

								  <?php echo form_hidden('id', $user->id);?>
								  <?php echo form_hidden($csrf); ?>
										</label>
									</section>
									
																
								</div>
							</fieldset>
								</section>
							</div>
								
							</fieldset>
							<footer>
							<?php 
							echo form_submit('submit',lang('edit_user_submit_btn'),"class='btn btn-primary'");?>
								
							</footer>
						
							

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


