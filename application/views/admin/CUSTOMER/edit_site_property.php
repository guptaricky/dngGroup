<?php if(!empty($property)){ 
foreach($property as $prop){}
?>
<div class="row">
	<form action="#" id="edit_prop_form" class="smart-form" novalidate="novalidate" enctype="multipart/form-data">
		<fieldset>
			<input type="hidden" id="cust_id" name="cust_id" value="<?php echo $prop['cust_id']; ?>">
			<div class="row">
				<section class="col col-6">
					<input class="form-control" name="prop_detail_id" value="<?php echo $prop['prop_detail_id']; ?>" type="hidden">
					<input class="form-control" name="prop_id" value="<?php echo $prop['prop_id']; ?>" type="hidden">
					<input class="form-control" id="prepend" name="bookingDate" value="<?php echo !empty($prop['prop_booking_date'])? $prop['prop_booking_date']:''; ?>" type="hidden">
					<label class="label">First Name </label>
					<label class="input"> <i class="icon-prepend fa fa-user"></i>
					<input type="text" id="fname" name="fname" placeholder="First name" style="text-transform: capitalize;" value="<?php echo !empty($prop['cust_fname'])? $prop['cust_fname']:''; ?>">
					</label>
				</section>
				<section class="col col-6">
					<label class="label">Last Name </label>
					<label class="input"> <i class="icon-prepend fa fa-user"></i>
						<input type="text" id="lname" name="lname" placeholder="Last name" style="text-transform: capitalize;" value="<?php echo !empty($prop['cust_lname'])? $prop['cust_lname']:''; ?>">
					</label>
				</section>
			</div>

			<div class="row">
				<section class="col col-6">
					<label class="label">Email ID </label>
					<label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
						<input type="email" id="email" name="email" placeholder="E-mail" value="<?php echo !empty($prop['cust_email'])? $prop['cust_email']:''; ?>">
					</label>
				</section>
				<section class="col col-6">
					<label class="label">Contact 1</label>
					<label class="input"> <i class="icon-prepend fa fa-phone"></i>
						<input type="tel" id="phone" name="phone" placeholder="Phone1" data-mask="(999) 999-9999" value="<?php echo !empty($prop['cust_phone'])? $prop['cust_phone']:''; ?>">
					</label>
				</section>
				<section class="col col-6">
					<label class="label">Contact 2</label>
					<label class="input"> <i class="icon-prepend fa fa-phone"></i>
						<input type="tel" id="phone" name="phone" placeholder="Phone2" data-mask="(999) 999-9999" value="<?php echo !empty($prop['cust_phone'])? $prop['cust_phone']:''; ?>">
					</label>
				</section>
			</div>
		</fieldset>

		<fieldset>
		
			<section>
				<label class="label">Address </label>
				<label for="address" class="input">
					<input type="text" id="address" name="address" placeholder="Address"  style="text-transform: capitalize "value="<?php echo !empty($prop['cust_address'])? $prop['cust_address']:''; ?>"/>
				</label>
			</section>
			<div class="row">
				
				<section class="col col-5">
					<label class="label">State </label>
					<label class="input">
						<input type="text" id="state" name="state" placeholder="State" value="<?php echo !empty($prop['cust_state'])? $prop['cust_state']:''; ?>">
					</label>
				</section>
				
				<section class="col col-4">
					<label class="label">City </label>
					<label class="input">
						<input type="text" id="city" name="city" placeholder="City" value="<?php echo !empty($prop['cust_city'])? $prop['cust_city']:''; ?>">
					</label>
				</section>

				<section class="col col-3">
					<label class="label">Pincode </label>
					<label class="input">
						<input type="text" id="code" name="code" placeholder="Post code" value="<?php echo !empty($prop['cust_pincode'])? $prop['cust_pincode']:''; ?>">
					</label>
				</section>
			</div>

			

			<section>
				<label class="label">Additional Info </label>
				<label class="textarea"> 										
					<textarea rows="3" id="info" name="info" placeholder="Additional info"><?php echo !empty($prop['cust_additional_info'])? $prop['cust_additional_info']:''; ?></textarea> 
				</label>
			</section>
			<div class="row">
			<section class="col col-5">
				<label class="label">Aadhar:</label>
				<label class="input">
					<input type="text" id="aadhar" name="aadhar" placeholder="Aadhar Number" value="<?php echo !empty($prop['cust_aadhar'])? $prop['cust_aadhar']:''; ?>">
				</label>
			</section>
			
			<section class="col col-4">
				<label class="label">PAN:</label>
				<label class="input">
					<input type="text" id="pan" name="pan" placeholder="PAN"  style="text-transform: uppercase;" value="<?php echo !empty($prop['cust_pan'])? $prop['cust_pan']:''; ?>">
				</label>
			</section>
			</div>
		</fieldset>

		<fieldset>
			<div class="row">
				<section class="col col-6">
					<label class="label">Property Name </label>
					<label class="input"> <i class="icon-prepend fa fa-user"></i>
						<input type="text" name="propertyname" placeholder="Property name" style="text-transform: capitalize;" value="<?php echo !empty($prop['prop_name'])? $prop['prop_name']:''; ?>">
					</label>
				</section>
				
				<section class="col col-6">
				<label class="label">Flat No. </label>
					<label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
						<input type="text" name="propertyNo" placeholder="Flat No." value="<?php echo !empty($prop['prop_no'])? $prop['prop_no']:''; ?>">
					</label>
				</section>
				
			</div>
			
		</fieldset>

		<fieldset>
			<div class="row">
				
				<section class="col col-3">
					<label class="label">Area </label>
					<label class="input">
						<input type="text" name="area" placeholder="Area (per square feet)" value="<?php echo !empty($prop['prop_area'])? $prop['prop_area']:''; ?>">
					</label>
				</section>
				
				<section class="col col-2">
					<label class="label">Carpet Area </label>
					<label class="input">
						<input type="text" name="carpetarea" placeholder="Carpet area" value="<?php echo !empty($prop['prop_carper_area'])? $prop['prop_carper_area']:''; ?>">
					</label>
				</section>

				<section class="col col-2">
					<label class="label">Build-up Area </label>
					<label class="input">
						<input type="text" name="builduparea" placeholder="Build-up Area" value="<?php echo !empty($prop['prop_buildup_area'])? $prop['prop_buildup_area']:''; ?>">
					</label>
				</section>
				
				<section class="col col-5">
					<label class="label">Property Type </label>
					<label class="input">
						<input type="text" name="propertytype" placeholder="Property Type" value="<?php echo !empty($prop['prop_type'])? $prop['prop_type']:''; ?>">
					</label>
				</section>
			</div>
			<div class="row">
				
				<section class="col col-4">
					<label class="label">Actual Price </label>
					<label class="input">
						<input type="text" id="actualprice" name="actualprice" placeholder="Actual Price" onkeyup="CalculateAmt()" value="<?php echo !empty($prop['prop_price'])? $prop['prop_price']:''; ?>">
					</label>
				</section>

				<section class="col col-4">
					<label class="label">Discount </label>
					<label class="input">
						<input type="text" id="discount" name="discount" placeholder="Discount" onkeyup="CalculateAmt()" value="<?php echo !empty($prop['prop_discount'])? $prop['prop_discount']:''; ?>">
					</label>
				</section>
				
				<section class="col col-4">
					<label class="label">Sell Price </label>
					<label class="input">
						<input type="text" id="sellprice" name="sellprice" placeholder="Sell Price" onkeyup="CalculateAmt()" value="<?php echo !empty($prop['prop_sell_price'])? $prop['prop_sell_price']:''; ?>">
					</label>
				</section>
				
				<section class="col col-4">
					<label class="label">Booking Amount </label>
					<label class="input">
						<input type="text" id="booking_amt" name="booking_amt" placeholder="Booking Amount" onkeyup="CalculateAmt()" value="<?php echo !empty($prop['prop_booking_amt'])? $prop['prop_booking_amt']:''; ?>">
					</label>
				</section>
				
				<section class="col col-4">
					<label class="label">Remaining Amount </label>
					<label class="input">
						<input type="text" id="remaining_amt" name="remaining_amt" placeholder="Remaining Amount" value="<?php echo !empty($prop['prop_remaining_amt'])? $prop['prop_remaining_amt']:''; ?>">
					</label>
				</section>
				
				<section class="col col-4">
					<label class="label">Payment Mode: </label>
					<label class="select"> 
						<select name="payment_mode" id="payment_mode">
						<option value="" > Payment Mode </option>
						<option value="Cash" <?php echo ($prop['prop_payment_mode']=='Cash')? 'selected':''; ?>>Cash</option>
						<option value="Cheque" <?php echo ($prop['prop_payment_mode']=='Cheque')? 'selected':''; ?>>Cheque</option>
						<option value="Bank" <?php echo ($prop['prop_payment_mode']=='Bank')? 'selected':''; ?>>Bank</option>
						</select><i></i>
					</label>
				</section>
				
				<section class="col col-4">
					<label class="label">EMI Duration: </label>
					<label class="select"> 
						<select name="emi_duration" id="emi_duration" onchange="CalculateAmt()">
						<option value=""> EMI Duration </option>
						<option value="6" <?php echo ($prop['prop_emi_duration']=='6')? 'selected':''; ?>> 6 Months </option>
						<option value="12" <?php echo ($prop['prop_emi_duration']=='12')? 'selected':''; ?>> 12 Months </option>
						<option value="24" <?php echo ($prop['prop_emi_duration']=='24')? 'selected':''; ?>> 24 Months </option>
						<option value="36" <?php echo ($prop['prop_emi_duration']=='36')? 'selected':''; ?>> 36 Months </option>
						<option value="48" <?php echo ($prop['prop_emi_duration']=='48')? 'selected':''; ?>> 48 Months </option>
						<option value="60" <?php echo ($prop['prop_emi_duration']=='60')? 'selected':''; ?>> 60 Months </option>
						<option value="120" <?php echo ($prop['prop_emi_duration']=='120')? 'selected':''; ?>> 120 Months </option>
						<option value="160" <?php echo ($prop['prop_emi_duration']=='160')? 'selected':''; ?>> 160 Months </option>
						</select><i></i>
					</label>
				</section>
				
				<section class="col col-4">
					<label class="label">Installment Amount </label>
					<label class="input">
						<input type="text" id="emi_amount" name="emi_amount" placeholder="Installment Amount" value="<?php echo !empty($prop['prop_emi_amount'])? $prop['prop_emi_amount']:''; ?>">
					</label>
				</section>
				<section class="col col-4">
					<label class="label">Finance By Bank: </label>
					<label class="select"> 
						<?php $banks = $this->Common_model->get_data_by_query("select * from bank_master"); ?>
						<select name="prop_finance_by_bank" id="bank_<?php echo $i;?>" >
							<option value=""> SELECT BANK </option>
							<?php foreach($banks as $bank) {?>
							<option value="<?php echo $bank['bank_id']; ?>"  <?php echo ($prop['prop_finance_by_bank']==$bank['bank_id'])? 'selected':''; ?>> <?php echo $bank['bank_name']; ?></option><?php } ?>
						</select><i></i>
					</label>
				</section>
				
			
			</div>
			<section>
				<label class="textarea"> 										
					<textarea rows="3" name="prop_remark" placeholder="Additional Remark"><?php echo $prop['prop_remark']; ?></textarea> 
				</label>
			</section>

			
			
		</fieldset>

		<footer>
			<button type="button" class="btn btn-primary" onclick="updateCustomer()" id="save_btn" data-loading-text="Please Wait..."> Submit </button>
			<!--<button type="reset" class="btn btn-default" > Reset </button>-->
		</footer>
	</form>
</div>
<?php } ?>


<script>
		function  CalculateAmt(){
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


function updateCustomer(){  
		$(".btn").button('loading');
            var form_data = $('#edit_prop_form').serialize();
			$.post('<?php echo base_url('admin/CUSTOMER/updateCustomerSellProperty'); ?>', form_data, function (response) {
				$(".btn").button('reset');
				window.location.reload();
			});
		}
		
</script>