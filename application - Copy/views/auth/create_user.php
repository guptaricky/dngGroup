
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
				

			</div>
			<!-- END RIBBON -->

			<!-- #MAIN CONTENT -->
			<div id="content">
				<div class="row">
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
						<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-users"></i> <?php echo lang('create_user_heading');?> <span><?php echo lang('create_user_subheading');?></span></h1>
					</div>
						
				</div>
			<!-- widget grid -->
			<section id="widget-grid" class="">
				
				<div class="row">

					<article class="col-sm-12 col-md-12 col-lg-8">
						
						<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false">
							
							<header>
								<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
								<h2>Generate User Account </h2>				
								
							</header>

							<!-- widget div-->
							<div>
								
								<!-- widget content -->
								<div class="widget-body no-padding">

									<div id="infoMessage"><?php echo $message;?></div>

									<?php echo form_open("auth/create_user", array('class' => 'smart-form', 'id' => 'checkout-form'));?>

										<fieldset>
										
											<div class="row">
												<section class="col col-12 hide">
													<label class="input"> <i class="icon-prepend fa fa-user"></i>
													<?php echo form_input($emp_id);?>
													</label>
												</section>
												<section class="col col-12">
												<?php echo lang('create_user_fname_label', 'first_name');?>
													<label class="input"> <i class="icon-prepend fa fa-user"></i>
													<?php echo form_input($first_name);?>
													</label>
												</section>
												<section class="col col-12">
												<?php echo lang('create_user_lname_label', 'last_name');?>
													<label class="input"> <i class="icon-prepend fa fa-user"></i>
													<?php echo form_input($last_name);?>
													</label>
												</section>
												<section class="col col-12 ">
												<?php
												  if($identity_column!=='email') {
													  echo '<p>';
													  echo '<br />';
													  echo form_error('identity');
													  echo '</p>';
												  }
												  echo lang('create_user_identity_label', 'identity');
												  ?>
													<label class="input"> <i class="icon-prepend fa fa-user"></i>
													<?php echo form_input($identity);?>
													</label>
												</section>
												<section class="col col-12">
												<?php echo lang('create_user_company_label', 'company');?>
													<label class="input"> <i class="icon-prepend fa fa-user"></i>
													<?php echo form_input($company);?>
													</label>
												</section>
												<section class="col col-12">
												<?php echo lang('create_user_email_label', 'email');?>
													<label class="input"> <i class="icon-prepend fa fa-user"></i>
													<?php echo form_input($email);?>
													</label>
												</section>
												<section class="col col-12">
												<?php echo lang('create_user_phone_label', 'phone');?>
													<label class="input"> <i class="icon-prepend fa fa-user"></i>
													<?php echo form_input($phone);?>
													</label>
												</section>
												<section class="col col-12">
												<?php echo lang('create_user_password_label', 'password');?>
													<label class="input"> <i class="icon-prepend fa fa-user"></i>
													<?php echo form_input($password);?>
													</label>
												</section>
												<section class="col col-12">
												<?php echo lang('create_user_password_confirm_label', 'password_confirm');?>
													<label class="input"> <i class="icon-prepend fa fa-user"></i>
													<?php echo form_input($password_confirm);?>
													</label>
												</section>
											</div>

											
										</fieldset>


										<footer>
										<?php 
										echo form_submit('submit',lang('create_user_submit_btn'),"class='btn btn-primary'");
										?>
										</footer>
									<?php echo form_close();?>
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

		

