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
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-edit"></i> Inventory Purchase <span></span></h1>
	</div>
		
</div>
<!-- widget grid -->
<section id="widget-grid" class="">

	
	<div class="row">

		<article class="col-sm-12 col-md-12 col-lg-12">
			
			<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false">
				
				<header>
					<span class="widget-icon"> <i class="fa fa-plus"></i> </span>
					<h2>Add Inventory Purchase </h2>				
					
				</header>

				<!-- widget div-->
				<div>
					
					<!-- widget content -->
					<div class="widget-body no-padding">
						
						<form action="#" id="checkout-form" class="smart-form" novalidate="novalidate" enctype="multipart/form-data">
								<input type="hidden" name="ledger_id" id="ledger_id" >
								<div class="row">
									<section class="col col-6">
							<fieldset>
								<div class="row">
								<?php 
								// print_r($emp_site);
								$group = $this->session->userdata('group');
								?>
									<section class="col col-12 <?php if(count($emp_site)>0){echo "hide";}?>">
										<label class="select">
										<select name="ledger_site_id" id="ledger_site_id">
											<option value=""> SELECT SITE </option>
											<?php foreach($sites as $site){ ?>
											<option value="<?php echo $site['site_id']; ?>" <?php if($site['site_id']===@$emp_site[0]['emp_alloted_site']){echo "selected";}?> ><?php echo $site['site_name']; ?></option>
											<?php } ?>
											</select> <i></i> </label>
									</section>
									
									<section class="col col-12">
										<label class="select">
											<select name="ledger_vendor_id" id="ledger_vendor_id">
											<option value=""> SELECT VENDOR </option>
											<?php foreach($vendors as $v){ ?>
											<option value="<?php echo $v['vendor_id']; ?>"><?php echo $v['vendor_name']; ?></option>
											<?php } ?>
											</select>
										</label>
									</section>
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-bar-chart-o"></i>
											<input type="text" name="ledger_voucher_no" id="ledger_voucher_no" placeholder="Voucher Number">
										</label>
									</section>
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-mobile"></i>
											<input type="file" name="ledger_voucher_image" id="ledger_voucher_image" placeholder="Voucher Image">
										</label>
									</section>
									<section class="col col-12">Purchased Item Name
										<label class="input"> <i class="icon-prepend fa fa-envelope"></i>
											<input type="text" name="ledger_goods_name" id="ledger_goods_name" placeholder="Purchased Item Name">
										</label>
									</section>
									<section class="col col-12">UNIT eg: kg, Bags
										<label class="input"> <i class="icon-prepend fa fa-credit-card"></i>
											<input type="text" name="ledger_unit" id="ledger_unit" placeholder="UNIT eg: kg, Bags">
										</label>
									</section>
									<section class="col col-12">Quantity
										<label class="input"> <i class="icon-prepend fa fa-credit-card"></i>
											<input type="text" name="ledger_qty" id="ledger_qty" onkeyup="CalculateAmt()" placeholder="Quantity">
										</label>
									</section>
									
									<section class="col col-12">Rate Per Unit
										<label class="input"> <i class="icon-prepend fa fa-gears"></i>
											<input type="text" name="ledger_rate" id="ledger_rate" onkeyup="CalculateAmt()"  placeholder="Rate Per Unit">
										</label>
									</section>
									<section class="col col-12">Total Price
										<label class="input"> <i class="icon-prepend fa fa-money"></i>
											<input type="text" name="ledger_amount" id="ledger_amount" onkeyup="CalculateAmt()"  placeholder="Total Price">
										</label>
									</section>
									<section class="col col-12">Loading-Unloading (Extra charges)
										<label class="input"> <i class="icon-prepend fa fa-money"></i>
											<input type="text" name="extra_amount" id="extra_amount" onkeyup="CalculateAmt()"  placeholder="Extra Charges" value="0.00">
										</label>
									</section>
								</div>

								
							</fieldset>
									</section>
									<section class="col col-6">
								<fieldset>
								<div class="row">
									<section class="col col-12">Discount
										<label class="input"> <i class="icon-prepend fa fa-money"></i>
											<input type="text" name="ledger_discount" id="ledger_discount" onkeyup="CalculateAmt()"  placeholder="Discount" value="0.00">
										</label>
									</section>
									<section class="col col-12">Payable Amount
										<label class="input"> <i class="icon-prepend fa fa-money"></i>
											<input type="text" name="ledger_payable_amt" onkeyup="CalculateAmt()" id="ledger_payable_amt"  placeholder="Payable Amount">
										</label>
									</section>
									<section class="col col-12">Down Payment
										<label class="input"> <i class="icon-prepend fa fa-money"></i>
											<input type="text" name="ledger_paid_amt" id="ledger_paid_amt" onkeyup="CalculateAmt()"  placeholder="Down Payment">
										</label>
									</section>
									<section class="col col-12">Balance
										<label class="input"> <i class="icon-prepend fa fa-money"></i>
											<input type="text" name="ledger_balance_amt" id="ledger_balance_amt"  placeholder="Balance">
										</label>
									</section>
									<section class="col col-12">Payment Date
										<label class="input"> <i class="icon-prepend fa fa-calendar"></i>
											<input type="text" name="ledger_payment_date" id="ledger_payment_date"  placeholder="yyyy-mm-dd" class="datepicker" value="<?php echo date('Y-m-d');?>">
										</label>
									</section>
									<section class="col col-12">Mode of Payment
										<label class="select">
										<select name="ledger_payment_type" id="ledger_payment_type">
											<option value=""> SELECT TYPE </option>
											<option value="Cash" selected>Cash</option>
											<option value="Cheque">Cheque</option>
											<option value="Bank">Bank</option>
											</select><i></i>
										</label>
									</section>
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-credit-card"></i>
											<input type="text" name="ledger_cheque_dd_no" id="ledger_cheque_dd_no"  placeholder="Cheque / Transaction No.">
										</label>
									</section>
									<section class="col col-12">
									<label class="textarea">					
										<textarea rows="3" name="ledger_remark" id="ledger_remark" placeholder="Remark"></textarea> 
									</label>
									</section>	
								</div>

								
							</fieldset>
							</section>
							</div>


							<footer>
								<button type="submit" class="btn btn-primary" onclick="/*AddVendorLedger()*/" id="save_btn" data-loading-text="Please Wait..."> Add to List </button>
								<button type="reset" class="btn btn-default" > RESET </button>
							</footer>
						</form>

					</div>
					<!-- end widget content -->
					
				</div>
				<!-- end widget div -->
				
			</div>
			<!-- end widget -->


		</article>
		
		<article class="col-sm-12 col-md-12 col-lg-12">
			
			<div class="jarviswidget" id="wid-id-2" data-widget-editbutton="false" data-widget-custombutton="false">
				
				<header>
					<span class="widget-icon"> <i class="fa fa-list"></i> </span>
					<h2>Vendors Payments</h2>			
					<div class="jarviswidget-ctrls" role="menu">  <a href="javascript:void(0);" id="reloaddata" class="button-icon jarviswidget-edit-btn" rel="tooltip" title="" data-placement="bottom" onclick="GetVendorLedger()" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>   </div>				
					
				</header>

				<!-- widget div-->
				<div>
					
					<!-- widget content -->
					<div class="widget-body no-padding">
						
						<div class="table-responsive" id="result_data" style='height:500px;overflow:scroll;'>
						
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
<script>
$(document).ready(function(){
	GetVendorLedger();
		
	$('#checkout-form').on('submit',function(e){//bind event on form submit.
		e.preventDefault(); 
		var balance = parseFloat($("#balance").html());
		var ledger_amount = parseFloat($("#ledger_paid_amt").val());
		// alert(balance);
		// alert(ledger_amount);
		var site = $("#ledger_site_id").val();
		var vendor = $("#ledger_vendor_id").val();
		var voch = $("#ledger_voucher_no").val();
			if(site=='' || vendor=='' || voch==''){
				alert("Please Enter Valid Details....?");
			}
			// else if(balance < ledger_amount ){
				// alert("Insufficient Site Balance..!!");
			// }
			else{
				$(".btn").button('loading');
			 $.ajax({
				 url:"<?php echo base_url('admin/ACCOUNTS/addVendor_ledger'); ?>",
				 type:"post",
				 data:new FormData(this),
				 processData:false,
				 contentType:false,
				 cache:false,
				 async:false,
				  success: function(data){
					$(".btn").button('reset');
					$('#checkout-form')[0].reset();
					GetVendorLedger();
				  }
				});
		}
	});  
});
		
		function GetVendorLedger(){
		$("#result_data").html("<center><img src='<?php echo base_url('img/ajax-loader.gif'); ?>'></center>");
		var content ='';	
		content +='<table class="table table-bordered"><thead><tr><th>Site name</th><th>Vendor name</th><th>Voucher No.</th><th>Date</th><th>Item</th><th>Total Amount</th><th>Balance</th><th>Action</th></tr></thead><tbody>';			
		$.getJSON('<?php echo base_url('admin/ACCOUNTS/getVendor_ledger'); ?>','', function(res){
					$.each(res, function (k, v) {
					  content +='<tr><td>'+ v.site_name +'</td><td>'+ v.vendor_name +'</td><td>'+ v.ledger_voucher_no +'</td><td>'+ v.ledger_payment_date +'</td><td>'+ v.ledger_goods_name +'</td><td>'+ v.ledger_payable_amt +'</td><td>'+ v.ledger_balance_amt +'</td><td><button class="btn btn-info btn-xs" title="Edit" onclick="EditVendorLedger('+ v.ledger_id +')"><i class="fa fa-edit"></i></button>&nbsp;<button class="btn btn-danger btn-xs" title="Delete" onclick="DeleteVendorLedger('+ v.ledger_id +')" ><i class="fa fa-remove"></i></button>&nbsp;<a class="btn btn-primary btn-xs" href="<?php echo base_url('admin/ACCOUNTS/vendor_partial_payment'); ?>/'+ v.ledger_id +'" title="Purchase & Payment Details"><i class="fa fa-eye-open"></i> Detail</a></td></tr>';
					});					
					content +='</tbody></table>';	
				$("#result_data").html(content);
			});	
			GetBalance();
		}
	

		// function AddVendorLedger(){  
		// var site = $("#ledger_site_id").val();
		// var vendor = $("#ledger_vendor_id").val();
		// var voch = $("#ledger_voucher_no").val();
			// if(site=='' || vendor=='' || voch==''){
				// alert("Please Enter Valid Details....?");
			// }else{
				// $(".btn").button('loading');
				// $.post('<?php echo base_url('admin/ACCOUNTS/addVendor_ledger'); ?>', $('#checkout-form').serialize(), function (response) {
					// $(".btn").button('reset');
					// $('#checkout-form')[0].reset();
					// GetVendorLedger();
				// });
			// }
		// }	
		
		function EditVendorLedger(id){
		$.post('<?php echo base_url('admin/ACCOUNTS/editVendor_ledger'); ?>', {'id':id}, function(response){
			var res = jQuery.parseJSON(response);
				$.each(res, function (k, v) {
					$("#ledger_id").val(v.ledger_id);
					$("#ledger_site_id").val(v.ledger_site_id);
					$("#ledger_vendor_id").val(v.ledger_vendor_id);
					$("#ledger_voucher_no").val(v.ledger_voucher_no);
					$("#ledger_voucher_image").val(v.ledger_voucher_image);
					$("#ledger_goods_name").val(v.ledger_goods_name);
					$("#ledger_unit").val(v.ledger_unit);
					$("#ledger_qty").val(v.ledger_qty);
					$("#ledger_rate").val(v.ledger_rate);
					$("#ledger_amount").val(v.ledger_amount);
					$("#extra_amount").val(v.ledger_extra_amount);
					$("#ledger_discount").val(v.ledger_discount);
					$("#ledger_payable_amt").val(v.ledger_payable_amt);
					$("#ledger_paid_amt").val(v.ledger_paid_amt);
					$("#ledger_balance_amt").val(v.ledger_balance_amt);
					$("#ledger_payment_date").val(v.ledger_payment_date);
					$("#ledger_payment_type").val(v.ledger_payment_type);
					$("#ledger_cheque_dd_no").val(v.ledger_cheque_dd_no);
					$("#ledger_remark").val(v.ledger_remark);
					});	
			});	 
		}	
		
		function DeleteVendorLedger(id){
			var r = confirm("Are you sure you want to Delete this vendor ?");
			if(r==true){
		$.ajax({  
				type: "POST",
				url: "<?php echo base_url('admin/ACCOUNTS/deleteVendor_ledger'); ?>",
				data: {'id':id},
				success: function(msg){
				GetVendorLedger();	
				}  
			});	
			}else{}			
		}	
		
		function  CalculateAmt(){
			var qty = $("#ledger_qty").val();
			var rate = $("#ledger_rate").val();
			var extra_amount = $("#extra_amount").val();
			var total = parseFloat(qty) * parseFloat(rate);
			if(isNaN(total)) {
			var total = 0;
			}else{
			var total = total;
			}
			$("#ledger_amount").val(total);
			var disc = $("#ledger_discount").val();
			var payble = parseFloat(total) +  parseFloat(extra_amount) - parseFloat(disc);			
			if(isNaN(payble)) {
			var payble = 0;
			}else{
			var payble = payble;
			}
			$("#ledger_payable_amt").val(payble);
			var paid = $("#ledger_paid_amt").val();
			var balance = parseFloat(payble) - parseFloat(paid);			
			if(isNaN(balance)) {
			var balance = 0;
			}else{
			var balance = balance;
			}
			$("#ledger_balance_amt").val(balance);
		}	
</script>
<script type="text/javascript">
	/* DO NOT REMOVE : GLOBAL FUNCTIONS!
	 *
	 * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
	 *
	 * // activate tooltips
	 * $("[rel=tooltip]").tooltip();
	 *
	 * // activate popovers
	 * $("[rel=popover]").popover();
	 *
	 * // activate popovers with hover states
	 * $("[rel=popover-hover]").popover({ trigger: "hover" });
	 *
	 * // activate inline charts
	 * runAllCharts();
	 *
	 * // setup widgets
	 * setup_widgets_desktop();
	 *
	 * // run form elements
	 * runAllForms();
	 *
	 ********************************
	 *
	 * pageSetUp() is needed whenever you load a page.
	 * It initializes and checks for all basic elements of the page
	 * and makes rendering easier.
	 *
	 */

	 var flot_updating_chart, flot_statsChart, flot_multigraph, calendar;

	pageSetUp();
	
	/*
	 * PAGE RELATED SCRIPTS
	 */

	// pagefunction
	
	var pagefunction = function() {
			
		$(".js-status-update a").click(function () {
		    var selText = $(this).text();
		    var $this = $(this);
		    $this.parents('.btn-group').find('.dropdown-toggle').html(selText + ' <span class="caret"></span>');
		    $this.parents('.dropdown-menu').find('li').removeClass('active');
		    $this.parent().addClass('active');
		});
		
		/*
		 * TODO: add a way to add more todo's to list
		 */
		
		// initialize sortable
		
	    $("#sortable1, #sortable2").sortable({
	        handle: '.handle',
	        connectWith: ".todo",
	        update: countTasks
	    }).disableSelection();
		
		
		// check and uncheck
		$('.todo .checkbox > input[type="checkbox"]').click(function () {
		    var $this = $(this).parent().parent().parent();
		
		    if ($(this).prop('checked')) {
		        $this.addClass("complete");
		
		        // remove this if you want to undo a check list once checked
		        //$(this).attr("disabled", true);
		        $(this).parent().hide();
		
		        // once clicked - add class, copy to memory then remove and add to sortable3
		        $this.slideUp(500, function () {
		            $this.clone().prependTo("#sortable3").effect("highlight", {}, 800);
		            $this.remove();
		            countTasks();
		        });
		    } else {
		        // insert undo code here...
		    }
		
		})
		// count tasks
		function countTasks() {
		
		    $('.todo-group-title').each(function () {
		        var $this = $(this);
		        $this.find(".num-of-tasks").text($this.next().find("li").size());
		    });
		
		}
		
		
	}

	// end destroy
	
	// run pagefunction on load
	pagefunction();
	
	
</script>
			</div>
			
			<!-- END #MAIN CONTENT -->

		</div>
		<!-- END #MAIN PANEL -->

		