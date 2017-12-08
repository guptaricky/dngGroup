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
		<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-edit"></i> Inventory Perchase <span></span></h1>
	</div>
		
</div>
<!-- widget grid -->
<section id="widget-grid" class="">

	
	<div class="row">

		<article class="col-sm-12 col-md-12 col-lg-5">
			
			<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false">
				
				<header>
					<span class="widget-icon"> <i class="fa fa-plus"></i> </span>
					<h2>Add Inventory Perchase </h2>				
					
				</header>

				<!-- widget div-->
				<div>
					
					<!-- widget content -->
					<div class="widget-body no-padding">
						
						<form action="#" id="checkout-form" class="smart-form" novalidate="novalidate">
								<input type="hidden" name="ledger_id" id="ledger_id" >
								<div class="row">
									<section class="col col-6">
							<fieldset>
								<div class="row">
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-user"></i>
											<select name="ledger_vendor_id" id="ledger_vendor_id">
											<option value=""> SELECT SITE </option>
											<?php foreach($sites as $site){ ?>
											<option value="<?php echo $v['site_id']; ?>"><?php echo $v['site_name']; ?></option>
											<?php } ?>
											</select>
										</label>
									</section>
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-user"></i>
											<select name="ledger_vendor_id" id="ledger_vendor_id">
											<option value=""> SELECT VENDOR </option>
											<?php foreach($vendor as $v){ ?>
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
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-envelope"></i>
											<input type="text" name="ledger_goods_name" id="ledger_goods_name" placeholder="Purchased Item Name">
										</label>
									</section>
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-credit-card"></i>
											<input type="text" name="ledger_unit" id="ledger_unit" placeholder="UNIT of Item">
										</label>
									</section>
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-credit-card"></i>
											<input type="text" name="ledger_qty" id="ledger_qty" placeholder="Quantity">
										</label>
									</section>
									
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-gears"></i>
											<input type="text" name="ledger_rate" id="ledger_rate"  placeholder="Quantity">
										</label>
									</section>
								</div>

								
							</fieldset>
									</section>
									<section class="col col-6">
								<fieldset>
								<div class="row">
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-money"></i>
											<input type="text" name="ledger_amount" id="ledger_amount"  placeholder="Total Price">
										</label>
									</section>
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-handshake-o"></i>
											<input type="text" name="ledger_discount" id="ledger_discount"  placeholder="Discount">
										</label>
									</section>
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-money"></i>
											<input type="text" name="ledger_payable_amt" id="ledger_payable_amt"  placeholder="Payable Amount">
										</label>
									</section>
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-money"></i>
											<input type="text" name="ledger_paid_amt" id="ledger_paid_amt"  placeholder="Down Payment">
										</label>
									</section>
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-money"></i>
											<input type="text" name="ledger_balance_amt" id="ledger_balance_amt"  placeholder="Balance">
										</label>
									</section>
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-sort-down"></i>
										<select name="ledger_payment_type" id="ledger_payment_type">
											<option value=""> SELECT TYPE </option>
											<option value="Cash">Cash</option>
											<option value="Cheque">Cheque</option>
											<option value="Bank">Bank</option>
											</select>
										</label>
									</section>
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-credit-card"></i>
											<input type="text" name="ledger_cheque_dd_no" id="ledger_cheque_dd_no"  placeholder="Cheque / Transection No.">
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
								<button type="button" class="btn btn-primary" onclick="AddVendor()" id="save_btn" data-loading-text="Please Wait..."> Add to List </button>
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
					<h2>Vendors List</h2>			
					<div class="jarviswidget-ctrls" role="menu">  <a href="javascript:void(0);" id="reloaddata" class="button-icon jarviswidget-edit-btn" rel="tooltip" title="" data-placement="bottom" onclick="GetVendor()" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>   </div>				
					
				</header>

				<!-- widget div-->
				<div>
					
					<!-- widget content -->
					<div class="widget-body no-padding">
						
						<div class="table-responsive" id="result_data">
						
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
			GetVendor();
		});
		
		function GetVendor(){
		$("#result_data").html("<center><img src='<?php echo base_url('img/ajax-loader.gif'); ?>'></center>");
		var content ='';	
		content +='<table class="table table-bordered"><thead><tr><th>Vendor name</th><th>Firm name</th><th>Contact No.</th><th>Email ID</th><th>TIN No.</th><th>GSTN No.</th><th>Action</th></tr></thead><tbody>';			
		$.getJSON('<?php echo base_url('admin/ACCOUNTS/getVendor'); ?>','', function(res){
					$.each(res, function (k, v) {
					  content +='<tr><td>'+ v.vendor_name +'</td><td>'+ v.vendor_firm_name +'</td><td>'+ v.vendor_contact_no +'</td><td>'+ v.vendor_email_id +'</td><td>'+ v.vendor_tin_no +'</td><td>'+ v.vendor_gstn_no +'</td><td><span style="cursor:pointer;" title="Edit" onclick="EditVendor('+ v.vendor_id +')"><i class="fa fa-edit"></i></span>&nbsp;<span title="Delete" style="cursor:pointer;" onclick="DeleteVendor('+ v.vendor_id +')"><i class="fa fa-remove"></i></span></td></tr>';
					});					
					content +='</tbody></table>';	
				$("#result_data").html(content);
			});	 
		}
	

		function AddVendor(){        
		$(".btn").button('loading');
			$.post('<?php echo base_url('admin/ACCOUNTS/addVendor'); ?>', $('#checkout-form').serialize(), function (response) {
				$(".btn").button('reset');
				$('#checkout-form')[0].reset();
				GetVendor();
			});
		}	
		
		function EditVendor(id){
		$.post('<?php echo base_url('admin/ACCOUNTS/editVendor'); ?>', {'id':id}, function(response){
			var res = jQuery.parseJSON(response);
				$.each(res, function (k, v) {
					$("#vendor_id").val(v.vendor_id);
					$("#vendor_name").val(v.vendor_name);
					$("#vendor_firm_name").val(v.vendor_firm_name);
					$("#vendor_contact_no").val(v.vendor_contact_no);
					$("#vendor_email_id").val(v.vendor_email_id);
					$("#vendor_gstn_no").val(v.vendor_gstn_no);
					$("#vendor_tin_no").val(v.vendor_tin_no);
					$("#vendor_address").val(v.vendor_address);
					$("#vendor_benificiary_name").val(v.vendor_benificiary_name);
					$("#vendor_bank_name").val(v.vendor_bank_name);
					$("#vendor_branch_name").val(v.vendor_branch_name);
					$("#vendor_acc_no").val(v.vendor_acc_no);
					$("#vendor_ifsc_code").val(v.vendor_ifsc_code);
					});	
			});	 
		}	
		
		function DeleteVendor(id){
			var r = confirm("Are you sure you want to Delete this vendor ?");
			if(r==true){
		$.ajax({  
				type: "POST",
				url: "<?php echo base_url('admin/ACCOUNTS/deleteVendor'); ?>",
				data: {'id':id},
				success: function(msg){
				GetVendor();	
				}  
			});	
			}else{}			
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

		