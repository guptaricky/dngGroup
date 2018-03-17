
			
		
			<h2 class="name">
				<?php echo $site[0]['site_name'];?> 
				<small>Manage by <a href="javascript:void(0);"><?php echo $site[0]['site_manager_name'];?></a></small>
				<i class="fa fa-phone fa-2x text-primary"></i>
				<span class="fa fa-2x"><h5><?php echo $site[0]['site_manager_no'];?></h5></span>
 
			</h2>
			<hr>
			
			<?php 
			
			// print_r($propertytype);die;
			if(count($propertytype)>0){?>
			<section>
			
			<div class="widget-body ">
			<div class="tabbable">
			<ul class="nav nav-tabs bordered" >
			<?php 
			$sno=0;
			foreach($propertytype as $pt): $sno++;?>
				<li class="<?php if($sno==1)echo "active";?>"><a href="#tab_<?php echo $sno;?>" data-toggle="tab" rel="tooltip" data-placement="top"><?php echo $pt['detail_type'];?></a></li>
			<?php endforeach ?>
				
			</ul>
			
			<div class="tab-content padding-10" >
			<?php 
			$sno1=0;
			foreach($propertytype as $pt): $sno1++;
			// $data['sitedetail'] = $this->Common_model->get_data_by_query_pdo("select * from site_other_detail where detail_site_id=? and detail_type = ?",array($site[0]['site_id'],$pt['detail_type']));
			?>
				<div class="tab-pane <?php if($sno1==1)echo "in active";?>" id="tab_<?php echo $sno1;?>">
					<div class="certified">
						<ul id="myTab" class="nav nav-pills">
						<?php 
						// $prop = explode(',',$data['sitedetail'][0]['detail_site_nos']);
						// for($i=0;$i<count($prop);$i++){
						$prop_count = 0;	
						foreach($propertytypedetail as $ptd){ $prop_count++;
							$detail_id = $ptd['property_detail_id'];
							$data['sitedetail'] = $this->Common_model->get_data_by_query_pdo("select * from site_other_detail where detail_id=?",array($detail_id));
							$detail_type = $data['sitedetail'][0]['detail_type'];
							if($pt['detail_type'] == $detail_type){
						?>
						<li><a href="#<?php echo $detail_type."_".$ptd['property_id'];?>" data-toggle="tab" onclick="GetDetail('<?php echo $prop_count;?>','<?php echo $detail_type;?>','<?php echo $ptd['property_sno'];?>','<?php echo $ptd['property_status'];?>')"><?php echo $ptd['property_sno'];?><span style="color:<?php if($ptd['property_status'] == 'Sold'){echo 'red';}elseif($ptd['property_status']=='Cancelled'){echo 'green';}elseif($ptd['property_status']=='Available'){echo '';}?>"><?php echo $ptd['property_status'];?></span></a></li>
						<?php } } ?>
						</ul>
					</div>
					<hr>
					<div id="myTabContent" class="tab-content">
					<?php 
						// for($i=0;$i<count($prop);$i++){
							
						$i=0;foreach($propertytypedetail as $ptd){$i++;
						$detail_id = $ptd['property_detail_id'];
						$data['sitedetail'] = $this->Common_model->get_data_by_query_pdo("select * from site_other_detail where detail_id=?",array($detail_id));
						
						$detail_type = $data['sitedetail'][0]['detail_type'];
						// echo $pt['detail_type'];
						// echo $detail_type;
						if($pt['detail_type'] == $detail_type){
						if($ptd['property_status']=='Sold'){
						$sold_to = $this->Common_model->findfield('customers','cust_id',$ptd['prop_sold_to'],'cust_fname') ;
						$sold_to .= " ".$this->Common_model->findfield('customers','cust_id',$ptd['prop_sold_to'],'cust_lname') ;
						$prop_price = $ptd['prop_price'];
						$booking_date = date('d M Y', strtotime($ptd['prop_booking_date']));
						$detail_id = $ptd['property_detail_id'];
						?>
						<div class="tab-pane fade <?php if($i==1)//echo "in active";?>" id="<?php echo $detail_type."_".$ptd['property_id'];?>">
							<p><strong>Booked on: </strong> <?php echo $booking_date;?></p>
							<p><strong>Sold To: </strong><?php echo $sold_to;?></p>
							<p><strong>Sold on: </strong> <?php echo $booking_date;?></p>
							<p><strong>Property price </strong> <?php echo number_format($prop_price);?></p>
							<br>
							<h4 class="alert alert-info"> Payment Description</h4>
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
						</div>
						<?php }
						elseif($ptd['property_status']=='Cancelled'){	?>
						<div class="tab-pane fade <?php if($i==1)//echo "in active";?>" id="<?php echo $detail_type."_".$ptd['property_id'];?>">
							
							<p><strong>Booked To: </strong><?php echo $ptd['property_sold_to'];?></p>
							<p><strong>Cancelled on - </strong> 27 Aug 2014:</p>
							<p><strong>Cancelled By : </strong> </p>
							
							<br>
							<button type="button" class="btn btn-sm btn-primary">
								Proceed for Payment
							</button>
							
						</div>
						<?php } 
						elseif($ptd['property_status']=='Available'){	?>
						<div class="tab-pane fade <?php if($i==1)//echo "in active";?>" id="<?php echo $detail_type."_".$ptd['property_id'];?>">
							
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
														
														<h4 id="prop_detail_print_<?php echo $i;?>"></h4>
														<!--<h4 id="prop_detail_print">Customer No. <strong>000</strong></h4>-->
															
													</div>
													<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-right">
														
														<div class="input-group">
															<span class="input-group-addon"><i class="">Booking Date</i></span>
															<input class="datepicker form-control" name="" value="<?php echo $dateToday = date('d-m-Y')?>" type="text" onchange="">
															
														</div>
													</div>
													
												</div>
												
											</div>
											<form action="#" id="checkout-form_<?php echo $i;?>" class="smart-form" novalidate="novalidate" enctype="multipart/form-data">
											<div class="alert alert-block alert-success hide" id="alert_check">
												<a class="close" data-dismiss="alert" href="#">×</a>
												<h4 class="alert-heading"><i class="fa fa-check-square-o"></i> Customer Saved Successfully..!!</h4>
												<p>
													You may check the saved Customes in the Customer List.
												</p>
											</div>
												<fieldset>
												<div class="row">
													<section class="col col-12" style="padding-left:15px !important">
														<label class="select">
														<select id="cust_id_<?php echo $i;?>" name="cust_id" onchange="getCustDetail(this.value)">
														<option value="">  Select Customer if Registerd </option>
															<?php foreach($customer as $cust):?>
															<option value="<?php echo $cust['cust_id'];?>"><?php echo $cust['cust_fname'].' '.$cust['cust_lname'];?></option>
															<?php endforeach; ?>
														</select> <i></i> </label>
													</section>
												</div>
													<div class="row">
														<section class="col col-6">
															<input class="form-control" name="prop_id" value="<?php echo $ptd['property_id']; ?>" type="hidden">
															<input class="form-control" id="prepend_<?php echo $i;?>" name="bookingDate" value="<?php echo $dateToday = date('d-m-Y')?>" type="hidden">
															<label class="input"> <i class="icon-prepend fa fa-user"></i>
															<input type="text" id="fname_<?php echo $i;?>" name="fname" placeholder="First name" style="text-transform: capitalize;">
															</label>
														</section>
														<section class="col col-6">
															<label class="input"> <i class="icon-prepend fa fa-user"></i>
																<input type="text" id="lname_<?php echo $i;?>" name="lname" placeholder="Last name" style="text-transform: capitalize;">
															</label>
														</section>
													</div>

													<div class="row">
														<section class="col col-6">
															<label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
																<input type="email" id="email_<?php echo $i;?>" name="email" placeholder="E-mail">
															</label>
														</section>
														<section class="col col-6">
															<label class="input"> <i class="icon-prepend fa fa-phone"></i>
																<input type="tel" id="phone_<?php echo $i;?>" name="phone" placeholder="Phone" data-mask="(999) 999-9999">
															</label>
														</section>
													</div>
												</fieldset>

												<fieldset>
													<div class="row">
														
														<section class="col col-5">
															<label class="input">
																<input type="text" id="state_<?php echo $i;?>" name="state" placeholder="State">
															</label>
														</section>
														
														<section class="col col-4">
															<label class="input">
																<input type="text" id="city_<?php echo $i;?>" name="city" placeholder="City">
															</label>
														</section>

														<section class="col col-3">
															<label class="input">
																<input type="text" id="code_<?php echo $i;?>" name="code" placeholder="Post code">
															</label>
														</section>
													</div>

													<section>
														<label for="address" class="input">
															<input type="text" id="address_<?php echo $i;?>" name="address" placeholder="Address"  style="text-transform: capitalize;">
														</label>
													</section>

													<section>
														<label class="textarea"> 										
															<textarea rows="3" id="info_<?php echo $i;?>" name="info" placeholder="Additional info"></textarea> 
														</label>
													</section>
													<div class="row">
													<section class="col col-5">
														<label class="input">
															<input type="text" id="aadhar_<?php echo $i;?>" name="aadhar" placeholder="Aadhar Number">
														</label>
													</section>
													
													<section class="col col-4">
														<label class="input">
															<input type="text" id="pan_<?php echo $i;?>" name="pan" placeholder="PAN"  style="text-transform: uppercase;">
														</label>
													</section>
													</div>
												</fieldset>

												<fieldset>
													<div class="row">
														<section class="col col-6">
															<label class="input"> <i class="icon-prepend fa fa-user"></i>
																<input type="text" name="propertyname" placeholder="Property name" style="text-transform: capitalize;">
															</label>
														</section>
														<section class="col col-6">
															
														</section>
													</div>

													<div class="row">
														<section class="col col-6">
															<label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
																<input type="text" name="propertyNo" placeholder="Flat No.">
															</label>
														</section>
														
													</div>
													
												</fieldset>

												<fieldset>
													<div class="row">
														
														<section class="col col-3">
															<label class="input">
																<input type="text" name="area" placeholder="Area (per square feet)">
															</label>
														</section>
														
														<section class="col col-2">
															<label class="input">
																<input type="text" name="carpetarea" placeholder="Carpet area">
															</label>
														</section>

														<section class="col col-2">
															<label class="input">
																<input type="text" name="builduparea" placeholder="Build-up Area">
															</label>
														</section>
														
														<section class="col col-5">
															<label class="input">
																<input type="text" name="propertytype" placeholder="Property Type">
															</label>
														</section>
													</div>
													<div class="row">
														
														<section class="col col-4">
															<label class="input">
																<input type="text" name="actualprice" placeholder="Actual Price">
															</label>
														</section>
														
														<section class="col col-4">
															<label class="input">
																<input type="text" name="sellprice" placeholder="Sell Price">
															</label>
														</section>

														<section class="col col-4">
															<label class="input">
																<input type="text" name="discount" placeholder="Discount">
															</label>
														</section>
														
													</div>

													<section>
														<label class="textarea"> 										
															<textarea rows="3" name="remark" placeholder="Additional Remark"></textarea> 
														</label>
													</section>
													
													
												</fieldset>

												<footer>
													<button type="button" class="btn btn-primary" onclick="addCustomer('<?php echo $i;?>')" id="save_btn" data-loading-text="Please Wait..."> Submit </button>
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
						</div>
						
						<?php } ?>
						<?php } ?>
						<?php } ?>
						
					</div>
				</div>
				<?php endforeach ?>
			</div>
			</div><hr class="simple" />
			</div>
			</section>
			<?php }else{?>
			<section>
			
			<div class="widget-body ">
			<div class="alert alert-danger fade in">
				<button class="close" data-dismiss="alert">
					×
				</button>
				<strong><h2>No Site Details Available..!!</h2></strong> 
			</div>
			
			</div>
			<?php } ?>
			
<script>

		function GetDetail(sno, prop_type, prop_no, prop_status){
		// document.getElementById('checkout-form_'+sno).scrollIntoView();
		// $("#prop_detail_print").html("");
		$("#prop_detail_print_"+sno).html(prop_type + " : <strong>" + prop_no + "</strong>");
		
		
		}
		
		
		function addCustomer(sno){  
		
		// var prop_id = $("#prop_id").val();
		// alert('#checkout-form_'+sno);		
		$(".btn").button('loading');
            var form_data = $('#checkout-form_'+sno).serialize();
			$.post('<?php echo base_url('admin/CUSTOMER/addCustomerSellProperty'); ?>', form_data, function (response) {
				$(".btn").button('reset');
				$('#checkout-form_'+sno)[0].reset();
				$('#alert_check').removeclass('hide');
			});
		}
		
</script>
<script>
$(function() {
	$(".datepicker").datepicker({changeMonth:true,changeYear:true,dateFormat: 'dd-mm-yy'});				
});
</script>