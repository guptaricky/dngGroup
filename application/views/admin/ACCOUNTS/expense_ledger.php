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
					<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-edit"></i> Expenses <span></span></h1>
				</div>
					
			</div>
			<!-- widget grid -->
			<section id="widget-grid" class="">

				<div class="row">

					<article class="col-sm-12 col-md-12 col-lg-5">
						
						<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false">
							
							<header>
								<span class="widget-icon"> <i class="fa fa-plus"></i> </span>
								<h2>Add Expense Detail </h2>
							</header>

							<!-- widget div-->
							<div>
								
								<!-- widget content -->
								<div class="widget-body no-padding">
									
									<form action="#" id="checkout-form" class="smart-form" novalidate="novalidate" enctype="multipart/form-data">
										<input type="hidden" name="ledger_id" id="ledger_id" >
										<div class="row">
										<section class="col col-12">
										<fieldset>
											<div class="row">
												<section class="col col-6">
													<label class="select"> 
														<select name="ledger_site_id" id="ledger_site_id">
														<option value=""> SELECT SITE </option>
														<?php foreach($sites as $site){ ?>
														<option value="<?php echo $site['site_id']; ?>"><?php echo $site['site_name']; ?></option>
														<?php } ?>
														</select><i></i>
													</label>
												</section>
												<section class="col col-6">
													<label class="select">
														<select name="ledger_expense_id" id="ledger_expense_id">
														<option value=""> SELECT EXPENSE CATEGORY </option>
														<?php foreach($expense as $v){ ?>
														<option value="<?php echo $v['cat_id']; ?>"><?php echo $v['cat_name']; ?></option>
														<?php } ?>
														</select><i></i>
													</label>
												</section>
											</div>
											
											
											<div class="row">
												<section class="col col-6">
													<label class="input"> <i class="icon-prepend fa fa-bar-chart-o"></i>
														<input type="text" name="ledger_voucher_no" id="ledger_voucher_no" placeholder="Receipt Number">
													</label>
												</section>
												<section class="col col-6">
													<label class="input"> <i class="icon-prepend fa fa-calendar"></i>
														<input type="text" name="ledger_payment_date" id="ledger_payment_date"  placeholder="yyyy-mm-dd" class="datepicker">
													</label>
												</section>
											</div>
											
											<div class="row">
												<section class="col col-8">
													<label class="input"> <i class="icon-prepend fa fa-mobile"></i>
														<input type="file" name="ledger_voucher_image" id="ledger_voucher_image" placeholder="Voucher Image">
													</label>
												</section>
											</div>
											<hr class="simple">
											<div class="row">
												<section class="col col-6">
												<label class="label">Amount: </label>
													<label class="input"> <i class="icon-prepend fa fa-money"></i>
														<input type="text" name="ledger_amount" id="ledger_amount" onkeyup="CalculateAmt()"  placeholder="Amount">
													</label>
												</section>
												<section class="col col-6">
												<label class="label">Discount: </label>
													<label class="input"> <i class="icon-prepend fa fa-money"></i>
														<input type="text" name="ledger_discount" id="ledger_discount" onkeyup="CalculateAmt()"  value="0.00" placeholder="Discount">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-6">
												<label class="label">Payable Amount: </label>
													<label class="input"> <i class="icon-prepend fa fa-money"></i>
														<input type="text" name="ledger_payable_amt" onkeyup="CalculateAmt()" value="0.00" id="ledger_payable_amt" placeholder="Payable Amount">
													</label>
												</section>
												<section class="col col-6">
												<label class="label">Paid Amount: </label>
													<label class="input"> <i class="icon-prepend fa fa-money"></i>
														<input type="text" name="ledger_paid_amt" id="ledger_paid_amt" onkeyup="CalculateAmt()"  placeholder="Paid Amount">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-6">
												<label class="label">Balance: </label>
													<label class="input"> <i class="icon-prepend fa fa-money"></i>
														<input type="text" name="ledger_balance_amt" id="ledger_balance_amt"  placeholder="Balance">
													</label>
												</section>
												<section class="col col-6">
												<label class="label">Payment Mode: </label>
													<label class="select"> 
														<select name="ledger_payment_type" id="ledger_payment_type">
														<option value=""> SELECT TYPE </option>
														<option value="Cash">Cash</option>
														<option value="Cheque">Cheque</option>
														<option value="Bank">Bank</option>
														</select><i></i>
													</label>
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-6">
												<label class="label">Transaction No. </label>
													<label class="input"> <i class="icon-prepend fa fa-credit-card"></i>
														<input type="text" name="ledger_cheque_dd_no" id="ledger_cheque_dd_no"  placeholder="Cheque / Transaction No.">
													</label>
												</section>
											
												<section class="col col-6">
												<label class="label">Remark: </label>
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
					
					<article class="col-sm-12 col-md-12 col-lg-7">
						
						<div class="jarviswidget" id="wid-id-2" data-widget-editbutton="false" data-widget-custombutton="false">
							
							<header>
								<span class="widget-icon"> <i class="fa fa-list"></i> </span>
								<h2>Expense List</h2>			
								<div class="jarviswidget-ctrls" role="menu">  <a href="javascript:void(0);" id="reloaddata" class="button-icon jarviswidget-edit-btn" rel="tooltip" title="" data-placement="bottom" onclick="GetVendorLedger()" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>   </div>				
								
							</header>

							<!-- widget div-->
							<div>
								
								<!-- widget content -->
								<div class="widget-body no-padding">
									
									<div class="table-responsive" id="result_data" style='max-height:500px;overflow:scroll;'>
									
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
		var site = $("#ledger_site_id").val();
		var vendor = $("#ledger_vendor_id").val();
		var voch = $("#ledger_voucher_no").val();
			if(site=='' || vendor=='' || voch==''){
				alert("Please Enter Valid Details....?");
			}else{
				$(".btn").button('loading');
		 $.ajax({
			 url:"<?php echo base_url('admin/ACCOUNTS/addExpense_ledger'); ?>",
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
		content +='<table class="table table-bordered"><thead><tr><th>Expense Category</th><th>Reciept No.</th><th>Date</th><th>Amount</th><th>Balance</th><th>Action</th></tr></thead><tbody>';			
		$.getJSON('<?php echo base_url('admin/ACCOUNTS/getExpense_ledger'); ?>','', function(res){
				$.each(res, function (k, v) {
				  content +='<tr><td>'+ v.cat_name +'</td><td>'+ v.ledger_voucher_no +'</td><td>'+ v.ledger_payment_date +'</td><td>'+ v.ledger_payable_amt +'</td><td>'+ v.ledger_balance_amt +'</td><td><button class="btn btn-info btn-xs" title="Edit" onclick="EditVendorLedger('+ v.ledger_id +')"><i class="fa fa-edit"></i></button>&nbsp;<button class="btn btn-danger btn-xs" title="Delete" onclick="DeleteVendorLedger('+ v.ledger_id +')" ><i class="fa fa-remove"></i></button>&nbsp;<a class="btn btn-primary btn-xs" href="<?php echo base_url('admin/ACCOUNTS/vendor_partial_payment'); ?>/'+ v.ledger_id +'" title="Purchase & Payment Details"><i class="fa fa-eye-open"></i> Detail</a></td></tr>';
				});					
				content +='</tbody></table>';	
			$("#result_data").html(content);
			});	 
		}
	

		// function AddVendorLedger(){  
		// var site = $("#ledger_site_id").val();
		// var vendor = $("#ledger_vendor_id").val();
		// var voch = $("#ledger_voucher_no").val();
			// if(site=='' || vendor=='' || voch==''){
				// alert("Please Enter Valid Details....?");
			// }else{
				// $(".btn").button('loading');
				// $.post('<?php echo base_url('admin/ACCOUNTS/addExpense_ledger'); ?>', $('#checkout-form').serialize(), function (response) {
					// $(".btn").button('reset');
					// $('#checkout-form')[0].reset();
					// GetVendorLedger();
				// });
			// }
		// }	
		
		function EditVendorLedger(id){
		$.post('<?php echo base_url('admin/ACCOUNTS/editExpense_ledger'); ?>', {'id':id}, function(response){
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
				url: "<?php echo base_url('admin/ACCOUNTS/deleteExpense_ledger'); ?>",
				data: {'id':id},
				success: function(msg){
				GetVendorLedger();	
				}  
			});	
			}else{}			
		}	
		
		function  CalculateAmt(){
			var total = $("#ledger_amount").val();
			var disc = $("#ledger_discount").val();
			var payble = parseFloat(total) - parseFloat(disc);			
			if(isNaN(payble)) {
			var payble = 0;
			}else{
			var payble = payble;
			}
			$("#ledger_payable_amt").val(payble);
			$("#ledger_paid_amt").val(payble);
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

		