
			
		
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
					<hr
					<div class="row">
						<div class="col-lg-12" id="edit_prop_sell">
						
						</div>
						</div>
					
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
						$bank = $this->Common_model->findfield('bank_master','bank_id',$ptd['prop_finance_by_bank'],'bank_name') ;
						$sold_to = $this->Common_model->findfield('customers','cust_id',$ptd['prop_sold_to'],'cust_fname') ;
						$sold_to .= " ".$this->Common_model->findfield('customers','cust_id',$ptd['prop_sold_to'],'cust_lname');
						$prop_price = $ptd['prop_price'];
						$booking_date = date('d M Y', strtotime($ptd['prop_booking_date']));
						$detail_id = $ptd['property_detail_id'];
						?>
						<div class="tab-pane fade <?php if($i==1)//echo "in active";?>" id="<?php echo $detail_type."_".$ptd['property_id'];?>">
				<table class="table table-bordered" >
					<tbody>
						<tr>
							<td><p><strong>Sold To: </strong><?php echo $sold_to;?></p></td>
							<td><p><strong>Sold on: </strong> <?php echo $booking_date;?></p></td>
							<td><button type="button" class="btn btn-xs btn-primary pull-right" onclick="EditPropertySell(<?php echo $ptd['prop_detail_id']; ?>)"> Edit Sell Detail </button></td>
						</tr><tr>
							<td><p><strong>Booked on: </strong> <?php echo $booking_date;?></p></td>
							<td colspan="2"><p><strong>Booking Amt: </strong> <?php echo $ptd['prop_booking_amt'];?></p></td>
						</tr><tr>
							<td><p><strong>Property price: </strong> <?php echo number_format($prop_price);?></p></td>
							<td colspan="2"><p><strong>Balance: </strong><?php echo $ptd['prop_remaining_amt'];?></p></td>
						</tr><tr>
							<td><p><strong>Paid Amt: </strong><?php echo $ptd['prop_paid_amt'];?></p></td>
							<td colspan="2"><p><strong>Emi Duration: </strong> <?php echo $ptd['prop_emi_duration'];?></p></td>
						</tr><tr>
							<td><p><strong>Installment Amt: </strong> <?php echo number_format($ptd['prop_emi_amount']);?></p></td>
							<td colspan="2"><p><strong>Finance By Bank: </strong> <?php echo $bank;?></p></td>
						</tr>
					</tbody>
				</table>
							<br>
							<h4 class="alert alert-info"> <div class="row"><div class="col-lg-12"> <div class="pull-left"> Customer EMI Payment</div> <div class="pull-right">  <div><div><div></h4>
						<form action="#" id="checkout-form_<?php echo $ptd['prop_detail_id']; ?>" class="smart-form" novalidate="novalidate" enctype="multipart/form-data">
							<input type="hidden" name="emi_id" id="emi_id_<?php echo $ptd['prop_detail_id']; ?>">
							<input type="hidden" name="emi_prop_detail_id" id="emi_prop_detail_id_<?php echo $ptd['prop_detail_id']; ?>" value="<?php echo $ptd['prop_detail_id']; ?>">
							<fieldset>
								<div class="row">
									<section class="col col-2 hide">
										<label class="label">Installment</label>
										<label class="input"> <i class="icon-prepend fa fa-bar-chart-o"></i>
											<input type="text" id ="emi_number_<?php echo $ptd['prop_detail_id']; ?>" name="emi_number" placeholder="Installment" >
										</label>
									</section>
									<section class="col col-2">
										<label class="label">Payment Date</label>
										<label class="input"> <i class="icon-prepend fa fa-bar-chart-o"></i>
											<input type="text" id ="emi_date_<?php echo $ptd['prop_detail_id']; ?>" name="emi_date" class="datepicker" placeholder="Date" >
										</label>
									</section>
									<section class="col col-2">
										<label class="label">Amount</label>
										<label class="input"> <i class="icon-prepend fa fa-bar-chart-o"></i>
											<input type="number" id ="emi_amount_<?php echo $ptd['prop_detail_id']; ?>" name="emi_amount" placeholder="Amount">
										</label>
									</section>
									<section class="col col-2">
										<label class="label">Payment Type</label>
										<label class="select"> 
											<select name="emi_payment_type" id="emi_payment_type_<?php echo $ptd['prop_detail_id']; ?>">
												<option value=""> SELECT PAYMENT TYPE </option>
												<option value="Cash" selected >Cash</option>
												<option value="Cheque">Cheque</option>
												<option value="Bank">Bank</option>
											</select><i></i>
										</label>
									</section>
									<section class="col col-2">
										<label class="label">Transaction No.</label>
										<label class="input"> <i class="icon-prepend fa fa-bar-chart-o"></i>
											<input type="text" id ="emi_transaction_no_<?php echo $ptd['prop_detail_id']; ?>" name="emi_transaction_no" placeholder="Transection No">
										</label>
									</section>
									<section class="col col-2">
										<label class="label">Remark</label>
										<label class="textarea"> 										
											<textarea rows="3" id="emi_remark_<?php echo $ptd['prop_detail_id']; ?>" name="emi_remark" placeholder="Remark"></textarea> 
										</label>
									</section>
									<section class="col col-2">
										<label class="label">&nbsp;</label>
										<button type="button" class="btn btn-primary btn-sm" onclick="addEmi(<?php echo $ptd['prop_detail_id']; ?>)" id="save_emi_btn" data-loading-text="Please Wait..."> Save </button>
									</section>										
								</div>

								
							</fieldset>


							
						</form><br>
						<div class="col col-12" >
						<div id="emi_data_<?php echo $ptd['prop_detail_id']; ?>">
						
						</div>
						</div>
						<script>
		$(document).ready(function(){
			<?php foreach($propertytypedetail as $ptd){ ?>
			GetEmi(<?php echo $ptd['prop_detail_id']; ?>);
			<?php } ?>
		});
		
		function GetEmi(detail_id){
		$("#emi_data_" + detail_id).html("<center><img src='<?php echo base_url('img/ajax-loader.gif'); ?>'></center>");
		var content ='';	
		var c = 0;	
		content +='<table class="table table-bordered"><thead><tr><th>S.No.</th><th>Installment</th><th>Amount</th><th>Date</th><th>Remark</th><th>Action</th></tr></thead><tbody>';			
		$.getJSON('<?php echo base_url('admin/ACCOUNTS/getEmi'); ?>',{'detail_id':detail_id}, function(res){
					$.each(res, function (k, v) { c++;
					if(c==1){ inst= "1st"; }else if(c==2){ inst= "2nd"; }else if(c==3){ inst= "3rd"; }else{ inst= c  +"th"; }
					  content +='<tr><td>'+ c +'.</td><td>'+ inst +' Installment</td><td>'+ v.emi_amt +'</td><td>'+ v.emi_date +'</td><td>'+ v.emi_remark +'</td><td><a class="btn btn-info btn-xs" title="Edit" onclick="EditEmi('+ v.emi_id +')">Edit</a> <a class="btn btn-danger btn-xs" title="Edit" onclick="DeleteEmi('+ v.emi_id +','+ v.emi_prop_detail_id +')">Delete</a></td></tr>';
					});					
					content +='</tbody></table>';	
				$("#emi_data_" + detail_id).html(content);
			});	 
		}
	

		
		function addEmi(detail_id){  
		
		$(".btn").button('loading');		
                   var form_data = $('#checkout-form_' + detail_id).serialize();
			$.post('<?php echo base_url('admin/ACCOUNTS/addEmi'); ?>', form_data, function (response) {
				$("#emi_id_" + detail_id).val('');
				$(".btn").button('reset');
				$('#checkout-form_' + detail_id)[0].reset();
				GetEmi(detail_id);
			});
		}	
		
		function EditEmi(id){
		$.post('<?php echo base_url('admin/ACCOUNTS/editEmi'); ?>', {'id':id}, function(response){
			var res = jQuery.parseJSON(response);
				$.each(res, function (k, v) {
					$("#emi_id_" + v.emi_prop_detail_id).val(v.emi_id);
					$("#emi_prop_detail_id_" + v.emi_prop_detail_id).val(v.emi_prop_detail_id);
					$("#emi_number_" + v.emi_prop_detail_id).val(v.emi_number);
					$("#emi_amount_" + v.emi_prop_detail_id).val(v.emi_amt);
					$("#emi_date_" + v.emi_prop_detail_id).val(v.emi_date);
					$("#emi_payment_type_" + v.emi_prop_detail_id).val(v.emi_payment_type);
					$("#emi_transaction_no_" + v.emi_prop_detail_id).val(v.emi_cheque_dd_no);
					$("#emi_remark_" + v.emi_prop_detail_id).val(v.emi_remark);
					});	
			});	 
		}	
		
		function DeleteEmi(id, detail_id){
			var r = confirm("Are you sure you want to Delete this Installment ?");
			if(r==true){
		$.ajax({  
				type: "POST",
				url: "<?php echo base_url('admin/ACCOUNTS/deleteEmi'); ?>",
				data: {'id':id},
				success: function(msg){
				GetEmi(detail_id);
				$("#emi_id_" + detail_id).val('');
				$(".btn").button('reset');
				$('#checkout-form_' + detail_id)[0].reset();				
				}  
			});	
			}else{}			
		}
		
</script>
						
								<div class="table-responsive">
						
							
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
															<input class="datepicker form-control" id="fakedate" value="<?php echo $dateToday = date('d-m-Y')?>" type="text" onchange="$('#prepend_'+<?php echo $i;?>).val(this.value)">
															
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
														<select id="cust_id_<?php echo $i;?>" name="cust_id" onchange="getCustDetail(<?php echo $i;?>,this.value)">
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
															<label class="label">First Name</label>
															<label class="input"> <i class="icon-prepend fa fa-user"></i>
															<input type="text" id="fname_<?php echo $i;?>" name="fname" placeholder="First name" style="text-transform: capitalize;">
															</label>
														</section>
														<section class="col col-6">
														  <label class="label">Last Name</label>
															<label class="input"> <i class="icon-prepend fa fa-user"></i>
																<input type="text" id="lname_<?php echo $i;?>" name="lname" placeholder="Last name" style="text-transform: capitalize;">
															</label>
														</section>
													</div>

													<div class="row">
														<section class="col col-4">
														  <label class="label">Email ID</label>
															<label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
																<input type="email" id="email_<?php echo $i;?>" name="email" placeholder="E-mail">
															</label>
														</section>
														<section class="col col-4">
														  <label class="label">Contact 1</label>
															<label class="input"> <i class="icon-prepend fa fa-phone"></i>
																<input type="tel" id="phone_<?php echo $i;?>" name="phone1" placeholder="Phone" data-mask="(999) 999-9999">
															</label>
														</section>
														<section class="col col-4">
														  <label class="label">Contact 2</label>
															<label class="input"> <i class="icon-prepend fa fa-phone"></i>
																<input type="tel" id="phone_<?php echo $i;?>" name="phone2" placeholder="Phone" data-mask="(999) 999-9999">
															</label>
														</section>
													</div>
												</fieldset>

												<fieldset>
												
													<section>
														<label for="address" class="input">
														  <label class="label">Address</label>
															<input type="text" id="address_<?php echo $i;?>" name="address" placeholder="Address"  style="text-transform: capitalize;">
														</label>
													</section>
													<div class="row">
														
														<section class="col col-5">
														  <label class="label">State</label>
															<label class="input">
																<input type="text" id="state_<?php echo $i;?>" name="state" placeholder="State">
															</label>
														</section>
														
														<section class="col col-4">
														  <label class="label">City</label>
															<label class="input">
																<input type="text" id="city_<?php echo $i;?>" name="city" placeholder="City">
															</label>
														</section>

														<section class="col col-3">
														  <label class="label">Email ID</label>
															<label class="input">
																<input type="text" id="code_<?php echo $i;?>" name="code" placeholder="Post code">
															</label>
														</section>
													</div>

													

													<section>
														<label class="textarea">
														  <label class="label">Additional Info</label> 										
															<textarea rows="3" id="info_<?php echo $i;?>" name="info" placeholder="Additional info"></textarea> 
														</label>
													</section>
													<div class="row">
													<section class="col col-5">
														  <label class="label">Aadhar:</label>
														<label class="input">
															<input type="text" id="aadhar_<?php echo $i;?>" name="aadhar" placeholder="Aadhar Number">
														</label>
													</section>
													
													<section class="col col-4">
														  <label class="label">PAN:</label>
														<label class="input">
															<input type="text" id="pan_<?php echo $i;?>" name="pan" placeholder="PAN"  style="text-transform: uppercase;">
														</label>
													</section>
													</div>
												</fieldset>

												<fieldset>
													<div class="row">
														<section class="col col-6">
														  <label class="label">Property Name</label>
															<label class="input"> <i class="icon-prepend fa fa-user"></i>
																<input type="text" name="propertyname" placeholder="Property name" style="text-transform: capitalize;">
															</label>
														</section>
														
														<section class="col col-6">
														  <label class="label">Flat No.</label>
															<label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
																<input type="text" name="propertyNo" placeholder="Flat No.">
															</label>
														</section>
														
													</div>
													
												</fieldset>

												<fieldset>
													<div class="row">
														
														<section class="col col-3">
														  <label class="label">Area / sqft.</label>
															<label class="input">
																<input type="text" name="area" placeholder="Area (per square feet)">
															</label>
														</section>
														
														<section class="col col-2">
														  <label class="label">Carpet Area</label>
															<label class="input">
																<input type="text" name="carpetarea" placeholder="Carpet area">
															</label>
														</section>

														<section class="col col-2">
														  <label class="label">Build-up Area</label>
															<label class="input">
																<input type="text" name="builduparea" placeholder="Build-up Area">
															</label>
														</section>
														
														<section class="col col-5">
														  <label class="label">Property Type</label>
															<label class="input">
																<input type="text" name="propertytype" placeholder="Property Type">
															</label>
														</section>
													</div>
													<div class="row">
														
														<section class="col col-4">
														  <label class="label">Actual Price</label>
															<label class="input">
																<input type="text" id="actualprice_<?php echo $i;?>" name="actualprice" placeholder="Actual Price" onkeyup="CalculateAmt(<?php echo $i;?>)">
															</label>
														</section>

														<section class="col col-4">
														  <label class="label">Discount</label>
															<label class="input">
																<input type="text" id="discount_<?php echo $i;?>" name="discount" placeholder="Discount" onkeyup="CalculateAmt(<?php echo $i;?>)">
															</label>
														</section>
														
														<section class="col col-4">
														  <label class="label">Sell Price</label>
															<label class="input">
																<input type="text" id="sellprice_<?php echo $i;?>" name="sellprice" placeholder="Sell Price" onkeyup="CalculateAmt(<?php echo $i;?>)">
															</label>
														</section>
														
														<section class="col col-4">
														  <label class="label">Booking Amount</label>
															<label class="input">
																<input type="text" id="booking_amt_<?php echo $i;?>" name="booking_amt" placeholder="Booking Amount" onkeyup="CalculateAmt(<?php echo $i;?>)">
															</label>
														</section>
														
														<section class="col col-4">
														  <label class="label">Remaining Amount</label>
															<label class="input">
																<input type="text" id="remaining_amt_<?php echo $i;?>" name="remaining_amt" placeholder="Remaining Amount" >
															</label>
														</section>
														
														<section class="col col-4">
															<label class="label">Payment Mode: </label>
															<label class="select"> 
																<select name="payment_mode" id="payment_mode">
																<option value=""> Payment Mode </option>
																<option value="Cash" selected >Cash</option>
																<option value="Cheque">Cheque</option>
																<option value="Bank">Bank</option>
																</select><i></i>
															</label>
														</section>
														
														<section class="col col-4">
															<label class="label">EMI Duration: </label>
															<label class="select"> 
																<select name="emi_duration" id="emi_duration_<?php echo $i;?>" onchange="CalculateAmt(<?php echo $i;?>)">
																<option value=""> EMI Duration </option>
																<option value="3" > 3 Months </option>
																<option value="6" > 6 Months </option>
																<option value="9" > 9 Months </option>
																<option value="12" > 12 Months </option>
																<option value="15" > 15 Months </option>
																<option value="18" > 18 Months </option>
																<option value="21" > 21 Months </option>
																<option value="24" > 24 Months </option>
																<option value="36" > 36 Months </option>
																<option value="48" > 48 Months </option>
																<option value="60" > 60 Months </option>
																<option value="120" > 120 Months </option>
																<option value="160" > 160 Months </option>
																</select><i></i>
															</label>
														</section>
														
														<section class="col col-4">
														  <label class="label">Installment Amount</label>
															<label class="input">
																<input type="text" id="emi_amount_<?php echo $i;?>" name="emi_amount" placeholder="Emi Amount">
															</label>
														</section>
														<section class="col col-4">
															<label class="label">Finance By Bank: </label>
															<label class="select">  
																<select name="prop_finance_by_bank" id="bank_<?php echo $i;?>" >
																<option value=""> SELECT BANK </option>
																<?php foreach($this->Common_model->get_data_by_query_pdo("select * from bank_master",array()) as $bank) ?>
																<option value="<?php echo $bank['bank_id']; ?>" > <?php echo $bank['bank_name']; ?></option>
																</select><i></i>
															</label>
														</section>
														
														
													</div>

													<section>
														<label class="textarea"> 										
															<textarea rows="3" name="prop_remark" placeholder="Additional Remark"></textarea> 
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

		function  CalculateAmt(c){
			var total = $("#actualprice_" +c).val();
			var disc = $("#discount_" +c).val();
			var payble = parseFloat(total) - parseFloat(disc);			
			if(isNaN(payble)) {
				var payble = 0;
			}else{
				var payble = payble;
			}
			$("#sellprice_" +c).val(payble);
			$("#remaining_amt_" +c).val(payble);
			var paid = $("#booking_amt_" +c).val();
			var balance = parseFloat(payble) - parseFloat(paid);			
			if(isNaN(balance)) {
				var balance = 0;
			}else{
				var balance = balance;
			}
			$("#remaining_amt_" +c).val(balance);
			var emi_duration = $("#emi_duration_" +c).val();
			var emi_amt = parseFloat(balance) / parseFloat(emi_duration);			
			if(isNaN(emi_amt)) {
				var emi_amt = 0;
			}else{
				var emi_amt = emi_amt.toFixed(2);;
			}
			$("#emi_amount_" +c).val(emi_amt);
		}	

		function GetDetail(sno, prop_type, prop_no, prop_status){
			$('#edit_prop_sell').html("");
		document.getElementById('myTabContent').scrollIntoView();
		// document.getElementById('checkout-form_'+sno).scrollIntoView();
		// $("#prop_detail_print").html("");
		$("#prop_detail_print_"+sno).html(prop_type + " : <strong>" + prop_no + "</strong>");
		
		
		}
		
		function getCustDetail(sno,cust_id){
			if(cust_id!=''){
			$.post('<?php echo base_url('admin/CUSTOMER/editCustomerDetail'); ?>', {'id':cust_id}, function(response){
			var res = jQuery.parseJSON(response);
				$.each(res, function (k, v) {
					$("#fname_"+sno).val(v.cust_fname);
					$("#lname_"+sno).val(v.cust_lname);
					$("#email_"+sno).val(v.cust_email);
					$("#phone_"+sno).val(v.cust_phone);
					$("#city_"+sno).val(v.cust_city);
					$("#address_"+sno).val(v.cust_address);
					$("#aadhar_"+sno).val(v.cust_aadhar);
					$("#pan_"+sno).val(v.cust_pan);
					$("#info_"+sno).val(v.cust_additional_info);
					});	
			});	
			}else{
				$("#fname_"+sno).val('');
				$("#lname_"+sno).val('');
				$("#email_"+sno).val('');
				$("#phone_"+sno).val('');
				$("#city_"+sno).val('');
				$("#address_"+sno).val('');
				$("#aadhar_"+sno).val('');
				$("#pan_"+sno).val('');
				$("#info_"+sno).val('');
			}
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
		
		
		function EditPropertySell(id){  
		
			$("#edit_prop_sell").html("<center><img src='<?php echo base_url('img/ajax-loader.gif'); ?>'></center>");
		$.post('<?php echo base_url('admin/CUSTOMER/editPropertySell'); ?>', {'id':id}, function (response) {
				$('#edit_prop_sell').html(response);
			});
		}
		
</script>
<script>
$(function() {
	$(".datepicker").datepicker({changeMonth:true,changeYear:true,dateFormat: 'dd-mm-yy'});				
});
</script>