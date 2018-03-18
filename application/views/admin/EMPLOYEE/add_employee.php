
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
		<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-users"></i> Add New Employee <span></span></h1>
	</div>
		
</div>
<!-- widget grid -->
<section id="widget-grid" class="">


	<!-- START ROW -->

	<div class="row">

		<!-- NEW COL START -->
		<article class="col-sm-12 col-md-12 col-lg-8">
			
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false">
				
				<header>
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>Employee Form </h2>				
					<div class="widget-toolbar" role="menu">
						<div class="btn-group">
							<a class="btn dropdown-toggle btn-xs btn-danger" href="<?php echo base_url().'admin/EMPLOYEE/view_employee';?>">
								Back to Employee List <i class="fa fa-reply"></i>
							</a>
						</div>
					</div>
				</header>

				<!-- widget div-->
				<div>
					
					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->
						
					</div>
					<!-- end widget edit box -->
					
					<!-- widget content -->
					<div class="widget-body no-padding">
						
						<form action="#" id="checkout-form" class="smart-form" novalidate="novalidate" enctype="multipart/form-data">
						<div class="alert alert-block alert-success hide" id="alert_check">
							<a class="close" data-dismiss="alert" href="#">×</a>
							<h4 class="alert-heading"><i class="fa fa-check-square-o"></i> Employee Saved Successfully..!!</h4>
							<p>
								You may check the saved Employee in the Employee List.
							</p>
						</div>
							<fieldset>
							<input type="hidden" name="emp_id" id="emp_id">
								<div class="row">
									<section class="col col-6">
										<label class="input"> <i class="icon-prepend fa fa-user"></i>
											<input type="text" name="fname" id="fname" placeholder="First name" style="text-transform: capitalize;">
										</label>
									</section>
									<section class="col col-6">
										<label class="input"> <i class="icon-prepend fa fa-user"></i>
											<input type="text" name="lname" id="lname" placeholder="Last name" style="text-transform: capitalize;">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-6">
										<label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
											<input type="email" name="email" id="email" placeholder="E-mail">
										</label>
									</section>
									<section class="col col-6">
										<label class="input"> <i class="icon-prepend fa fa-phone"></i>
											<input type="tel" name="phone" id="phone" placeholder="Phone" data-mask="(999) 999-9999">
										</label>
									</section>
								</div>
							</fieldset>

							<fieldset>
								<div class="row">
									
									<section class="col col-5">
										<label class="input">
											<input type="text" name="state" id="state" placeholder="State">
										</label>
									</section>
									
									<section class="col col-4">
										<label class="input">
											<input type="text" name="city" id="city" placeholder="City">
										</label>
									</section>

									<section class="col col-3">
										<label class="input">
											<input type="text" name="code" id="code" placeholder="Post code">
										</label>
									</section>
								</div>

								<section>
									<label for="address" class="input">
										<input type="text" name="address" id="address" placeholder="Address"  style="text-transform: capitalize;">
									</label>
								</section>
								<div class="row">
									
									<section class="col col-3">
										<label class="input">Designation
											<input type="text" name="designation" id="designation" placeholder="Designation">
										</label>
									</section>
									
									<section class="col col-3">
										<label class="input">Monthly Salary
											<input type="text" name="salary" id="salary" placeholder="Salary">
										</label>
									</section>

									<section class="col col-3">
										<label class="input">Security Deposited
											<input type="text" name="security" id="security" placeholder="Security">
										</label>
									</section>
									<section class="col col-3">
										<label class="input">Advance Owned
											<input type="text" name="advance" id="advance" placeholder="Advance">
										</label>
									</section>
								</div>

								<section>
									<label class="textarea"> 										
										<textarea rows="3" name="info" id="info" placeholder="Additional info"></textarea> 
									</label>
								</section>
								<div class="row">
								<section class="col col-5">
									<label class="input">
										<input type="text" name="aadhar" placeholder="Aadhar Number">
									</label>
								</section>
								
								<section class="col col-4">
									<label class="input">
										<input type="text" name="pan" placeholder="PAN"  style="text-transform: uppercase;">
									</label>
								</section>
								</div>
								
							</fieldset>
							
							<fieldset style="display:none">
								

								<section>
									<h3>Bank Details :</h3>
								</section>

								
								<div class="row">
									<section class="col col-4">
										<label class="select">
										<select name="bankname">
											<option value="0" selected="" disabled="">Select Bank</option>
											<?php foreach($banks as $bnk):?>
											<option value="<?php echo $bnk['bank_short_name'];?>"><?php echo $bnk['bank_name'];?></option>
											<?php endforeach; ?>
											
										</select> <i></i> </label>
									</section>
									<section class="col col-5">
										<label class="input">
											<input type="text" name="acc_no" placeholder="Account number" data-mask="9999-9999-9999-9999">
										</label>
									</section>
									<section class="col col-3">
										<label class="input">
											<input type="text" name="ifsc" placeholder="IFSC Code" data-mask="9999999999">
										</label>
									</section>
								</div>

								<div class="row">
									
									<section class="col col-12">
										<label class="input">
											<input type="text" name="bank_address" placeholder="Bank Address" >
										</label>
									</section>
									
								</div>
							</fieldset>
							
							<fieldset>
								

								<section>
									<h3>Allot Site:</h3>
								</section>

								
								<div class="row">
									<section class="col col-4">
										<label class="select">
										<select name="site" id="site">
											<option value="0" selected="" disabled="">Select site</option>
											<?php foreach($sites as $st):?>
											<option value="<?php echo $st['site_id'];?>"><?php echo $st['site_name'];?></option>
											<?php endforeach; ?>
											
										</select> <i></i> </label>
									</section>
								</div>
							</fieldset>
							<footer>
								<button type="button" class="btn btn-primary" onclick="addEmployee()" id="save_btn" data-loading-text="Please Wait..."> Save Employee </button>
								<button type="reset" class="btn btn-default" > Reset </button>
							</footer>
						</form>

					</div>
					<!-- end widget content -->
					
				</div>
				<!-- end widget div -->
				
			</div>
			<!-- end widget -->
			
		</article>
		<!-- END COL -->

	</div>

	<!-- END ROW -->

</section>
<!-- end widget grid -->

			</div>
			
			<!-- END #MAIN CONTENT -->

		</div>
		<!-- END #MAIN PANEL -->
<script>

		function addEmployee(){  
		
		$(".btn").button('loading');		
                   var form_data = $('#checkout-form').serialize();
				  
			$.post('<?php echo base_url('admin/EMPLOYEE/addEmployee'); ?>', form_data, function (response) {
				$(".btn").button('reset');
				// $('#checkout-form')[0].reset();
				// $('#alert_check').removeclass('hide');
				window.location.href = '<?php echo base_url(),"admin/EMPLOYEE/view_employee";?>';
			});
		}
		</script>
		<script>
		$(document).ready(function(){
			editCustomerDetail();
		
		});
		function editCustomerDetail(){
			var id = '<?php echo $this->uri->segment(4);?>';
			// alert(id);
			$.post('<?php echo base_url('admin/EMPLOYEE/editEmployeeDetail'); ?>', {'id':id}, function(response){
			var res = jQuery.parseJSON(response);
				$.each(res, function (k, v) {
					$("#emp_id").val(v.emp_id);
					$("#fname").val(v.emp_fname);
					$("#lname").val(v.emp_lname);
					$("#email").val(v.emp_email);
					$("#phone").val(v.emp_phone);
					$("#state").val(v.emp_state);
					$("#city").val(v.emp_city);
					$("#code").val(v.emp_pincode);
					$("#designation").val(v.emp_desig);
					$("#salary").val(v.emp_salary);
					$("#security").val(v.emp_security);
					$("#advance").val(v.emp_advance);
					$("#address").val(v.emp_address);
					$("#aadhar").val(v.emp_aadhar);
					$("#pan").val(v.emp_pan);
					$("#info").val(v.emp_additional_info);
					$("#site").val(v.emp_alloted_site);
					
					});	
			});
		}
</script>
		