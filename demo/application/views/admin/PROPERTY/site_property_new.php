<div class="modal fade" id="property_form">
	<div class="modal-dialog modal-lg">
		<div class="modal-content" style="padding:10px" id="modal-form">
			<form action="#" id="checkout-form" class="smart-form" novalidate="novalidate" enctype="multipart/form-data">
					
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title"><span id="addnewdept">Sell Property</span></h4>
			</div>
			<div class="modal-body">
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
					<select id="cust_id" name="cust_id" onchange="getCustDetail(this.value)">
					<option value="">  Select Customer if Registered </option>
						<?php foreach($customer as $cust):?>
						<option value="<?php echo $cust['cust_id'];?>"><?php echo $cust['cust_fname'].' '.$cust['cust_lname'];?></option>
						<?php endforeach; ?>
					</select> <i></i> </label>
				</section>
			</div>
			<div class="row">
				<section class="col col-6">
					<input class="form-control" name="prop_detail_id" id="prop_detail_id" type="hidden">
					<input class="form-control" name="prop_id" id="prop_id" type="hidden">
					<input class="form-control" id="prepend" name="bookingDate" value="<?php echo $dateToday = date('d-m-Y')?>" type="hidden">
					<label class="label">First Name</label>
					<label class="input"> <i class="icon-prepend fa fa-user"></i>
					<input type="text" id="fname" name="fname" placeholder="First name" style="text-transform: capitalize;">
					</label>
				</section>
				<section class="col col-6">
				  <label class="label">Last Name</label>
					<label class="input"> <i class="icon-prepend fa fa-user"></i>
						<input type="text" id="lname" name="lname" placeholder="Last name" style="text-transform: capitalize;">
					</label>
				</section>
			</div>

			<div class="row">
					<section class="col col-4">
					  <label class="label">Email ID</label>
						<label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
							<input type="email" id="email" name="email" placeholder="E-mail">
						</label>
					</section>
					<section class="col col-4">
					  <label class="label">Contact 1</label>
						<label class="input"> <i class="icon-prepend fa fa-phone"></i>
							<input type="tel" id="phone1" name="phone1" placeholder="Phone" data-mask="(999) 999-9999">
						</label>
					</section>
					<section class="col col-4">
					  <label class="label">Contact 2</label>
						<label class="input"> <i class="icon-prepend fa fa-phone"></i>
							<input type="tel" id="phone2" name="phone2" placeholder="Phone" data-mask="(999) 999-9999">
						</label>
					</section>
				</div>
			</fieldset>

			<fieldset>
			
				<section>
					<label for="address" class="input">
					  <label class="label">Address</label>
						<input type="text" id="address" name="address" placeholder="Address"  style="text-transform: capitalize;">
					</label>
				</section>
				<div class="row">
					
					<section class="col col-5">
					  <label class="label">State</label>
						<label class="input">
							<input type="text" id="state" name="state" placeholder="State">
						</label>
					</section>
					
					<section class="col col-4">
					  <label class="label">City</label>
						<label class="input">
							<input type="text" id="city" name="city" placeholder="City">
						</label>
					</section>

					<section class="col col-3">
					  <label class="label">Postal Code</label>
						<label class="input">
							<input type="text" id="code" name="code" placeholder="Post code">
						</label>
					</section>
				</div>

				

				<section>
					<label class="textarea">
					  <label class="label">Additional Info</label> 										
						<textarea rows="3" id="info" name="info" placeholder="Additional info"></textarea> 
					</label>
				</section>
				<div class="row">
				<section class="col col-5">
					  <label class="label">Aadhar:</label>
					<label class="input">
						<input type="text" id="aadhar" name="aadhar" placeholder="Aadhar Number">
					</label>
				</section>
				
				<section class="col col-4">
					  <label class="label">PAN:</label>
					<label class="input">
						<input type="text" id="pan" name="pan" placeholder="PAN"  style="text-transform: uppercase;">
					</label>
				</section>
				</div>
			</fieldset>

			<fieldset>
				<div class="row">
					<section class="col col-6">
					  <label class="label">Property Name</label>
						<label class="input"> <i class="icon-prepend fa fa-user"></i>
							<input type="text" id="propertyname" name="propertyname" placeholder="Property name" style="text-transform: capitalize;">
						</label>
					</section>
					
					<section class="col col-6">
					  <label class="label">Flat No.</label>
						<label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
							<input type="text" id="propertyNo" name="propertyNo" placeholder="Flat No.">
						</label>
					</section>
					
				</div>
				
			</fieldset>

			<fieldset>
				<div class="row">
					
					<section class="col col-3">
					  <label class="label">Area / sqft.</label>
						<label class="input">
							<input type="text" id="area" name="area" placeholder="Area (per square feet)">
						</label>
					</section>
					
					<section class="col col-2">
					  <label class="label">Carpet Area</label>
						<label class="input">
							<input type="text" id="carpetarea" name="carpetarea" placeholder="Carpet area">
						</label>
					</section>

					<section class="col col-2">
					  <label class="label">Build-up Area</label>
						<label class="input">
							<input type="text" id="builduparea" name="builduparea" placeholder="Build-up Area">
						</label>
					</section>
					
					<section class="col col-3">
					  <label class="label">Property Type</label>
						<label class="input">
							<input type="text" id="propertytype" name="propertytype" placeholder="Property Type">
						</label>
					</section>
					
					<section class="col col-2">
					  <label class="label">Booking Date</label>
						<label class="input">
							<input type="text" id="booking_date" name="booking_date" class="datepicker" placeholder="dd-mm-yyyy">
						</label>
					</section>
				</div>
				<div class="row">
					
					<section class="col col-4">
					  <label class="label">Actual Price</label>
						<label class="input">
							<input type="text" id="actualprice" name="actualprice" placeholder="Actual Price" onkeyup="CalculateAmt()">
						</label>
					</section>

					<section class="col col-4">
					  <label class="label">Discount</label>
						<label class="input">
							<input type="text" id="discount" name="discount" placeholder="Discount" onkeyup="CalculateAmt()">
						</label>
					</section>
					
					<section class="col col-4">
					  <label class="label">Sell Price</label>
						<label class="input">
							<input type="text" id="sellprice" name="sellprice" placeholder="Sell Price" onkeyup="CalculateAmt()">
						</label>
					</section>
					
					<section class="col col-4">
					  <label class="label">Booking Amount</label>
						<label class="input">
							<input type="text" id="booking_amt" name="booking_amt" placeholder="Booking Amount" onkeyup="CalculateAmt()">
						</label>
					</section>
					
					<section class="col col-4">
					  <label class="label">Remaining Amount</label>
						<label class="input">
							<input type="text" id="remaining_amt" name="remaining_amt" placeholder="Remaining Amount" >
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
							<select name="emi_duration" id="emi_duration" onchange="CalculateAmt()">
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
							<input type="text" id="emi_amount" name="emi_amount" placeholder="Emi Amount">
						</label>
					</section>
					<section class="col col-4">
						<label class="label">Finance By Bank: </label>
						<label class="select"> 
							<select name="prop_finance_by_bank" id="bank" >
							<option value=""> SELECT BANK </option>
							<?php foreach($banks as $bnk){ ?>
							<option value="<?php echo $bnk['bank_id']; ?>" > <?php echo $bnk['bank_name']; ?></option>
							<?php } ?>
							</select><i></i>
						</label>
					</section>
					
					
				</div>

				<section>
					<label class="textarea"> 										
						<textarea rows="3" name="prop_remark" id="prop_remark" placeholder="Additional Remark"></textarea> 
					</label>
				</section>
				
				
			</fieldset>

			</div>
			<div class="modal-footer">
			</br>
				<button type="button" class="btn btn-sm btn-success" onclick="addCustomer()" id="save_btn" data-loading-text="Please Wait..."> Submit </button>
				<button type="reset" class="btn btn-sm btn-default" > Reset </button>
				<a href="javascript:;" class="btn btn-sm btn-primary" data-dismiss="modal">Close</a>
			</div>
			</form>
		</div>
		<div class="modal-content" style="padding:10px" id="modal-data">
			<table class="table table-bordered" >
				<tbody>
					<tr>
						<td><p><strong>Sold To: </strong> <span id="sold_to">N/A</span></p></td>
						<td><p><strong>Sold on: </strong> <span id="sold_on">N/A</span></p></td>
						<td><button type="button" class="btn btn-xs btn-primary pull-right" onclick="EditPropertySell()"> Edit Sell Detail </button></td>
					</tr><tr>
						<td><p><strong>Booked on: </strong> <span id="booked_on">N/A</span></p></td>
						<td colspan="2"><p><strong>Booking Amt: </strong> <span id="bookingamt">0.00</span></p></td>
					</tr><tr>
						<td><p><strong>Property price: </strong> <span id="prop_price">N/A</span></p></td>
						<td colspan="2"><p><strong>Balance: </strong><span id="balance">0.00</span></p></td>
					</tr><tr>
						<td><p><strong>Paid Amt: </strong><span id="paid_amt">0.00</span></p></td>
						<td colspan="2"><p><strong>Emi Duration: </strong> <span id="emi_dura">N/A</span></p></td>
					</tr><tr>
						<td><p><strong>Installment Amt: </strong> <span id="install_amt">N/A</span></p></td>
						<td colspan="2"><p><strong>Finance By Bank: </strong> <span id="fin_bank">N/A</span></p></td>
					</tr>
				</tbody>
			</table>
			<div class="col col-4">
			<legend>Installment Detail</legend>
			<div id="installment"></div>
			<legend>Installment Form</legend>
			<div id="installment_form">
			<form action="#" id="installment-form" class="smart-form" novalidate="novalidate" enctype="multipart/form-data">
							<input type="hidden" name="emi_id" id="emi_id">
							<input type="hidden" name="emi_prop_detail_id" id="emi_prop_detail_id">
							<fieldset>
								<div class="row">
									<section class="col col-2 hide">
										<label class="label">Installment</label>
										<label class="input"> <i class="icon-prepend fa fa-bar-chart-o"></i>
											<input type="text" id ="emi_number" name="emi_number" placeholder="Installment" >
										</label>
									</section>
									<section class="col col-2">
										<label class="label">Payment Date</label>
										<label class="input"> <i class="icon-prepend fa fa-bar-chart-o"></i>
											<input type="text" id ="emi_date" name="emi_date" class="datepicker" placeholder="Date" >
										</label>
									</section>
									<section class="col col-2">
										<label class="label">Amount</label>
										<label class="input"> <i class="icon-prepend fa fa-bar-chart-o"></i>
											<input type="number" id ="emi_amount" name="emi_amount" placeholder="Amount">
										</label>
									</section>
									<section class="col col-2">
										<label class="label">Payment Type</label>
										<label class="select"> 
											<select name="emi_payment_type" id="emi_payment_type">
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
											<input type="text" id ="emi_transaction_no" name="emi_transaction_no" placeholder="Transection No">
										</label>
									</section>
									<section class="col col-2">
										<label class="label">Remark</label>
										<label class="textarea"> 										
											<textarea rows="3" id="emi_remark" name="emi_remark" placeholder="Remark"></textarea> 
										</label>
									</section>
									<section class="col col-2">
										<label class="label">&nbsp;</label>
										<button type="button" class="btn btn-primary btn-sm" onclick="addEmi()" id="save_emi_btn" data-loading-text="Please Wait..."> Save </button>
									</section>										
								</div>

								
							</fieldset>


							
						</form><br>
						
			</div>
			</div>
		</div>
	</div>
</div>
			
		
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
				<li class="<?php if($sno==1)echo "active";?>" ><a href="#tab_<?php echo $sno;?>" style="padding:10px" data-toggle="tab" rel="tooltip" data-placement="top"><?php echo $pt['detail_type'];?></a></li>
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
						<li style="margin:5px;width:10%">
						<a 
						href="#property_form"
						data-toggle="modal"
						onclick="GetDetail('<?php echo $prop_count;?>',
						'<?php echo $detail_type;?>',
						'<?php echo $ptd['property_sno'];?>',
						'<?php echo $ptd['property_status'];?>',
						'<?php echo $ptd['property_id'];?>',
						'<?php echo $ptd['prop_detail_id'];?>')">
						<?php echo $ptd['property_sno'];?>
						<span style="color:<?php if($ptd['property_status'] == 'Sold'){echo 'red';}elseif($ptd['property_status']=='Cancelled'){echo 'green';}elseif($ptd['property_status']=='Available'){echo '';}?>"><?php echo $ptd['property_status'];?></span>
						</a>
						</li>
						<?php } } ?>
						</ul>
					</div>
					<hr>
					
					
					<div id="myTabContent" class="tab-content">
					
						
						
					</div>
				</div>
				<?php endforeach;?>
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
			</section>
			<?php } ?>
			
	<script>

	function CalculateAmt(){
			var total = $("#actualprice").val();
			var disc = $("#discount").val();
			var payble = parseFloat(total) - parseFloat(disc);			
			if(isNaN(payble)) {
				var payble = 0;
			}else{
				var payble = payble;
			}
			$("#sellprice").val(payble);
			$("#remaining_amt").val(payble);
			var paid = $("#booking_amt").val();
			var balance = parseFloat(payble) - parseFloat(paid);			
			if(isNaN(balance)) {
				var balance = 0;
			}else{
				var balance = balance;
			}
			$("#remaining_amt").val(balance);
			var emi_duration = $("#emi_duration").val();
			var emi_amt = parseFloat(balance) / parseFloat(emi_duration);			
			if(isNaN(emi_amt)) {
				var emi_amt = 0;
			}else{
				var emi_amt = emi_amt.toFixed(2);;
			}
			$("#emi_amount").val(emi_amt);
		}	
		
	function GetEmi(detail_id){
		$("#installment").html("<center><img src='<?php echo base_url('img/ajax-loader.gif'); ?>'></center>");
		var content ='';	
		var c = 0;	
		content +='<table class="table table-bordered"><thead><tr><th>S.No.</th><th>Installment</th><th>Amount</th><th>Date</th><th>Remark</th><th>Action</th></tr></thead><tbody>';			
		$.getJSON('<?php echo base_url('admin/ACCOUNTS/getEmi'); ?>',{'detail_id':detail_id}, function(res){
					$.each(res, function (k, v) { c++;
					if(c==1){ inst= "1st"; }else if(c==2){ inst= "2nd"; }else if(c==3){ inst= "3rd"; }else{ inst= c  +"th"; }
					  content +='<tr><td>'+ c +'.</td><td>'+ inst +' Installment</td><td>'+ v.emi_amt +'</td><td>'+ v.emi_date +'</td><td>'+ v.emi_remark +'</td><td><button type="button" id="emi_btn" class="btn btn-danger btn-sm" onclick="DeleteEmi('+ v.emi_id +','+ detail_id +')"><i class="fa fa-trash-o"></i></button></td></tr>';
					});					
					content +='</tbody></table>';	
				$("#installment").html(content);
			});	 
		}

	function GetDetail(sno, prop_type, prop_no, prop_status, prop_id, prop_detail_id){
			// alert(prop_status);
			// alert(prop_id);
		(prop_id != '') ? $("#prop_id").val(prop_id) : '';
		(prop_detail_id != '') ? $("#prop_detail_id").val(prop_detail_id) : '';
		(prop_detail_id != '') ? $("#emi_prop_detail_id").val(prop_detail_id) : '';
		if(prop_status=='Available'){
			// $('#checkout-form').reset();
			$('#checkout-form')[0].reset();
			$('#modal-form').show();
			$('#modal-data').hide();
		}
		else{
			$('#modal-form').hide();
			$('#modal-data').show();
		}
		$.post('<?php echo base_url('admin/MASTERS/getPropDetail'); ?>', {'prop_id':prop_id}, function(response){
			var res = jQuery.parseJSON(response);
				$.each(res, function (k, v) {
					(v.cust_fname != '') ? $("#sold_to").html(v.cust_fname +' '+ v.cust_lname).css("text-transform", "uppercase") : '';
					(v.prop_entrydt != '') ? $("#sold_on").html(v.prop_entrydt) : $("#sold_on").css("color", "red");
					(v.prop_booking_date != '') ? $("#booked_on").html(v.prop_booking_date) : $("#booked_on").css("color", "red");
					(v.prop_booking_amt != 0) ? $("#bookingamt").html(v.prop_booking_amt) : $("#bookingamt").css("color", "red");
					(v.prop_price != 0) ? $("#prop_price").html(v.prop_price) : $("#prop_price").css("color", "red");
					(v.prop_remaining_amt != 0) ? $("#balance").html(v.prop_remaining_amt) : $("#balance").css("color", "red");
					(v.prop_paid_amt != 0) ? $("#paid_amt").html(v.prop_paid_amt) : $("#paid_amt").css("color", "red");
					(v.prop_emi_duration != 0) ? $("#emi_dura").html(v.prop_emi_duration) : $("#emi_dura").css("color", "red");
					(v.prop_emi_amount != 0) ? $("#install_amt").html(v.prop_emi_amount) : $("#install_amt").css("color", "red");
					(v.prop_finance_by_bank != '') ? $("#fin_bank").html(v.prop_finance_by_bank) : $("#fin_bank").css("color", "red");
					});	
			});
		GetEmi(prop_detail_id);
		// $('#edit_prop_sell').html("");
		// document.getElementById('myTabContent').scrollIntoView();
		// document.getElementById('checkout-form_'+sno).scrollIntoView();
		// $("#prop_detail_print").html("");
		// $("#prop_detail_print_"+sno).html(prop_type + " : <strong>" + prop_no + "</strong>");
		
		}
		
	function getCustDetail(cust_id){
			if(cust_id!=''){
			$.post('<?php echo base_url('admin/CUSTOMER/editCustomerDetail'); ?>', {'id':cust_id}, function(response){
			var res = jQuery.parseJSON(response);
				$.each(res, function (k, v) {
					// (v.cust_id != '' ? $("#cust_id").val(v.cust_id) : '';
					(v.cust_fname != '' ? $("#fname").val(v.cust_fname) : $("#fname").css("border-color", "red"));
					(v.cust_lname != '' ? $("#lname").val(v.cust_lname) : $("#lname").css("border-color", "red"));
					(v.cust_email != '' ? $("#email").val(v.cust_email) : $("#email").css("border-color", "red"));
					(v.cust_phone1 != '' ? $("#phone1").val(v.cust_phone1) : $("#phone1").css("border-color", "red"));
					(v.cust_phone2 != '' ? $("#phone2").val(v.cust_phone2) : $("#phone2").css("border-color", "red"));
					(v.cust_city != '' ? $("#city").val(v.cust_city) : $("#city").css("border-color", "red"));
					(v.cust_state != '' ? $("#state").val(v.cust_state) : $("#state").css("border-color", "red"));
					(v.cust_pincode != '' ? $("#code").val(v.cust_pincode) : $("#code").css("border-color", "red"));
					(v.cust_address != '' ? $("#address").val(v.cust_address) : $("#address").css("border-color", "red"));
					(v.cust_aadhar != 0 || v.cust_aadhar != ''? $("#aadhar").val(v.cust_aadhar) : $("#aadhar").css("border-color", "red"));
					(v.cust_pan != '' ? $("#pan").val(v.cust_pan) : $("#pan").css("border-color", "red"));
					(v.cust_additional_info != '' ? $("#info").val(v.cust_additional_info) : $("#info").css("border-color", "red"));
					});	
			});	
			}else{
				$("#fname").val('');
				$("#lname").val('');
				$("#email").val('');
				$("#phone1").val('');
				$("#phone2").val('');
				$("#city").val('');
				$("#state").val('');
				$("#code").val('');
				$("#address").val('');
				$("#aadhar").val('');
				$("#pan").val('');
				$("#info").val('');
			}
		}
		
		
	function addCustomer(){  
		
		// var prop_id = $("#prop_id").val();
		// alert(prop_id);		
		$(".btn").button('loading');
            var form_data = $('#checkout-form').serialize();
			$.post('<?php echo base_url('admin/CUSTOMER/addCustomerSellProperty'); ?>', form_data, function (response) {
				$(".btn").button('reset');
				$('#checkout-form')[0].reset();
				$('#alert_check').removeClass('hide');
				 $('#property_form').modal('hide');
			}) .done(function() {
				
				setTimeout(function(){ getSite(); }, 1000);
				 // $('#property_form').removeClass('modal-backdrop');
				 // $('#property_form').addClass('modal');
				// getSite();
				
			  });
	}
		
		
	function EditPropertySell(){  
		var prop_id =$("#prop_id").val();
		// alert(prop_id);
		// $('#modal-form').show();
		$('#modal-data').hide();
		// $("#modal-form").html("<center><img src='<?php echo base_url('img/ajax-loader.gif'); ?>'></center>");
		// $.post('<?php echo base_url('admin/CUSTOMER/editPropertySell'); ?>', {'id':id}, function (response) {
			// $('#modal-form').show();
				// $('#modal-form').html(response);
			// });
		$.post('<?php echo base_url('admin/MASTERS/getPropDetail'); ?>', {'prop_id':prop_id}, function(response){
			var res = jQuery.parseJSON(response);
			$('#modal-form').show();
			$.each(res, function (k, v) {
				$("#cust_id").val(v.cust_id);
				(v.cust_fname != '') ? $("#fname").val(v.cust_fname) : '';
				(v.cust_lname != '') ? $("#lname").val(v.cust_lname) : '';
				(v.cust_email != '') ? $("#email").val(v.cust_email) : $("#email").css("border-color", "red");
				(v.cust_phone1 != '') ? $("#phone1").val(v.cust_phone1) : $("#phone1").css("border-color", "red");
				(v.cust_phone2 != '') ? $("#phone2").val(v.cust_phone2) : $("#phone2").css("border-color", "red");
				(v.cust_city != '') ? $("#city").val(v.cust_city) : $("#city").css("border-color", "red");
				(v.cust_state != '') ? $("#state").val(v.cust_state) : $("#state").css("border-color", "red");
				(v.cust_pincode != '') ? $("#code").val(v.cust_pincode) : $("#code").css("border-color", "red");
				(v.cust_address != '') ? $("#address").val(v.cust_address) : $("#address").css("border-color", "red");
				(v.cust_aadhar != 0) || v.cust_aadhar != ''? $("#aadhar").val(v.cust_aadhar) : $("#aadhar").css("border-color", "red");
				(v.cust_pan != '') ? $("#pan").val(v.cust_pan) : $("#pan").css("border-color", "red");
				(v.cust_additional_info != '') ? $("#info").val(v.cust_additional_info) : $("#info").css("border-color", "red");
				(v.prop_name != '') ? $("#propertyname").val(v.prop_name) : $("#propertyname").css("border-color", "red");
				(v.prop_no != '') ? $("#propertyNo").val(v.prop_no) : $("#propertyNo").css("border-color", "red");
				(v.prop_area != '') ? $("#area").val(v.prop_area) : $("#area").css("border-color", "red");
				(v.prop_carper_area != '') ? $("#carpetarea").val(v.prop_carper_area) : $("#carpetarea").css("border-color", "red");
				(v.prop_buildup_area != '') ? $("#builduparea").val(v.prop_buildup_area) : $("#builduparea").css("border-color", "red");
				(v.prop_type != '') ? $("#propertytype").val(v.prop_type) : $("#propertytype").css("border-color", "red");
				(v.prop_booking_date != '') ? $("#booking_date").val(v.prop_booking_date) : $("#booking_date").css("border-color", "red");
				(v.prop_price != '') ? $("#actualprice").val(v.prop_price) : $("#actualprice").css("border-color", "red");
				(v.prop_discount != '') ? $("#discount").val(v.prop_discount) : $("#discount").css("border-color", "red");
				//(v.cust_additional_info != '') ? $("#discount").val(v.cust_additional_info) : $("#discount").css("border-color", "red");
				(v.prop_sell_price != '') ? $("#sellprice").val(v.prop_sell_price) : $("#sellprice").css("border-color", "red");
				(v.prop_paid_amt != '') ? $("#booking_amt").val(v.prop_paid_amt) : $("#booking_amt").css("border-color", "red");
				(v.prop_remaining_amt != '') ? $("#remaining_amt").val(v.prop_remaining_amt) : $("#remaining_amt").css("border-color", "red");
				(v.prop_payment_mode != '') ? $("#payment_mode").val(v.prop_payment_mode) : $("#payment_mode").css("border-color", "red");
				(v.prop_emi_duration != '') ? $("#emi_duration").val(v.prop_emi_duration) : $("#emi_duration").css("border-color", "red");
				(v.prop_emi_amount != '') ? $("#emi_amount").val(v.prop_emi_amount) : $("#emi_amount").css("border-color", "red");
				(v.prop_finance_by_bank != '') ? $("#bank").val(v.prop_finance_by_bank) : $("#bank").css("border-color", "red");
				(v.prop_remark != '') ? $("#prop_remark").val(v.prop_remark) : $("#prop_remark").css("border-color", "red");
				});	
			});
	}
		
</script>
<script>
$(function() {
	$(".datepicker").datepicker({changeMonth:true,changeYear:true,dateFormat: 'dd-mm-yy'});				
});
</script>
<script>
		$(document).ready(function(){
			<?php foreach($propertytypedetail as $ptd){ ?>
			//GetEmi(<?php echo $ptd['prop_detail_id']; ?>);
			<?php } ?>
		});
		
			
		function addEmi(){  
		
		$(".btn").button('loading');		
                   var detail_id = $('#emi_prop_detail_id').val();
                   var form_data = $('#installment-form').serialize();
			$.post('<?php echo base_url('admin/ACCOUNTS/addEmi'); ?>', form_data, function (response) {
				$("#emi_id").val('');
				$(".btn").button('reset');
				$('#installment-form')[0].reset();
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
				}  
			});	
			}else{}			
		}
		
</script>
						