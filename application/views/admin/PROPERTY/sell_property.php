
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
		<h1 class="page-title txt-color-blueDark"><i class="fa fa-fw fa-suitcase"></i> Sell Property <span></span></h1>
	</div>
		
</div>
<!-- widget grid -->
<section id="widget-grid" class="">


	<!-- START ROW -->

	<div class="row">

		<!-- NEW COL START -->
		<article class="col-sm-12 col-md-12 col-lg-12">
			
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false">
				
				<header>
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>Property Sell Form </h2>				
					<div class="widget-toolbar" role="menu">
						<div class="btn-group">
							<a class="btn dropdown-toggle btn-xs btn-danger" href="<?php echo base_url().'admin/CUSTOMER/view_customers';?>">
								Back to Customer List <i class="fa fa-reply"></i>
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
						<div class="widget-body-toolbar">
							
							<div class="row">
								
								<div class="col-xs-9 col-sm-5 col-md-9 col-lg-9">
									
									<h4>Customer No. <strong>001</strong></h4>
										
								</div>
								<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-right">
									
									<div class="input-group">
										<span class="input-group-addon"><i class="">Booking Date</i></span>
										<input class="form-control" id="prepend" placeholder="dd-mm-yyyy" type="text">
									</div>
								</div>
								
							</div>
							
								

						</div>
						<form action="#" id="checkout-form" class="smart-form" novalidate="novalidate" enctype="multipart/form-data">
						<div class="alert alert-block alert-success hide" id="alert_check">
							<a class="close" data-dismiss="alert" href="#">×</a>
							<h4 class="alert-heading"><i class="fa fa-check-square-o"></i> Customer Saved Successfully..!!</h4>
							<p>
								You may check the saved Customes in the Customer List.
							</p>
						</div>
							
							<fieldset>
								<div class="row">
									<section class="col col-6">
										<label class="input"> <i class="icon-prepend fa fa-user"></i>
											<input type="text" name="fname" placeholder="Property name" style="text-transform: capitalize;">
										</label>
									</section>
									<section class="col col-6">
										
									</section>
								</div>

								<div class="row">
									<section class="col col-6">
										<label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
											<input type="email" name="email" placeholder="Flat No.">
										</label>
									</section>
									<section class="col col-6">
										<label class="input"> <i class="icon-prepend fa fa-user"></i>
											<input type="tel" name="phone" placeholder="Customer's Full Name" data-mask="(999) 999-9999">
										</label>
									</section>
								</div>
								
								<div class="row">
									<section class="col col-6">
										<label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
											<input type="email" name="email" placeholder="E-mail">
										</label>
									</section>
									<section class="col col-6">
										<label class="input"> <i class="icon-prepend fa fa-user"></i>
											<input type="tel" name="phone" placeholder="Contact No." data-mask="(999) 999-9999">
										</label>
									</section>
								</div>
							</fieldset>

							<fieldset>
								<div class="row">
									
									<section class="col col-3">
										<label class="input">
											<input type="text" name="state" placeholder="Area (per square feet)">
										</label>
									</section>
									
									<section class="col col-2">
										<label class="input">
											<input type="text" name="city" placeholder="Carpet area">
										</label>
									</section>

									<section class="col col-2">
										<label class="input">
											<input type="text" name="code" placeholder="Build-up Area">
										</label>
									</section>
									
									<section class="col col-5">
										<label class="input">
											<input type="text" name="code" placeholder="Property Type">
										</label>
									</section>
								</div>
								<div class="row">
									
									<section class="col col-4">
										<label class="input">
											<input type="text" name="state" placeholder="Actual Price">
										</label>
									</section>
									
									<section class="col col-4">
										<label class="input">
											<input type="text" name="city" placeholder="Sell Price">
										</label>
									</section>

									<section class="col col-4">
										<label class="input">
											<input type="text" name="code" placeholder="Discount">
										</label>
									</section>
									
								</div>

								<section>
									<label class="textarea"> 										
										<textarea rows="3" name="info" placeholder="Additional Remark"></textarea> 
									</label>
								</section>
								<h4 class="alert alert-info"> Payment Description of 10% </h4>
								<div class="table-responsive">
						
							
							<table class="table table-bordered">
							<thead>
							  <tr>
								<th>S.No.</th>
								<th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Booking Date</th>
								<th><i class="fa fa-fw fa-phone text-muted hidden-md hidden-sm hidden-xs"></i> Amount</th>
								<th><i class="fa fa-fw fa-map-marker txt-color-blue hidden-md hidden-sm hidden-xs"></i> 1st</th>
								<th><i class="fa fa-fw fa-edit txt-color-blue hidden-md hidden-sm hidden-xs"></i> 2nd</th>
								<th><i class="fa fa-fw fa-edit txt-color-blue hidden-md hidden-sm hidden-xs"></i> 3rd</th>
								<th><i class="fa fa-fw fa-edit txt-color-blue hidden-md hidden-sm hidden-xs"></i> 4th</th>
							  </tr>
							</thead>
							<tbody>
							  
							  <tr align="left">
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							  </tr>
							  
							</tbody>
						  </table>
							
						</div>
								
							</fieldset>

							<footer>
								<button type="button" class="btn btn-primary" onclick="addCustomer()" id="save_btn" data-loading-text="Please Wait..."> Submit </button>
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

		function addCustomer(){  
		
		$(".btn").button('loading');		
                   var form_data = $('#checkout-form').serialize();
				  
			$.post('<?php echo base_url('admin/CUSTOMER/addCustomer'); ?>', form_data, function (response) {
				$(".btn").button('reset');
				$('#checkout-form')[0].reset();
				$('#alert_check').removeclass('hide');
				
			});
		}
</script>
		