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
			<?php $paymentType = $this->uri->segment(5);?>
				<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-edit"></i> <?php echo $paymentType;?> Payment Detail <span></span></h1>
	</div>
		
</div>
<!-- widget grid -->
<section id="widget-grid" class="">

	
	<div class="row">
		
		
		<article class="col-sm-12 col-md-12 col-lg-12">
			
			<div class="jarviswidget" id="wid-id-2" data-widget-editbutton="false" data-widget-custombutton="false">
				
				<header>
					<span class="widget-icon"> <i class="fa fa-list"></i> </span>
					<h2><?php echo $paymentType;?> Payment Detail</h2>			
					<div class="jarviswidget-ctrls" role="menu">  </div>				
					
				</header>

				<!-- widget div-->
				<div>
					
					<!-- widget content -->
					<div class="widget-body no-padding">
						
						<div class="table-responsive">
						<?php 
						if($paymentType=='Vendor'){?>
						<table class="table table-bordered">
						<tbody>
						<tr>
						<td><?php echo "<strong>Site Name :</strong> </br>".$ledger[0]['site_name']; ?></td>
						<td><?php echo "<strong>Vendor Name :</strong></br> ".$ledger[0]['vendor_name']; ?></td>
						<td><?php echo "<strong>Vendor Firm Name :</strong> </br>".$ledger[0]['vendor_firm_name']; ?></td>
						<td><?php echo "<strong>Vendor Contact No. : </strong></br>".$ledger[0]['vendor_contact_no']; ?></td>
						<td><?php echo "<strong>Vendor GSTN No. :</strong> </br>".$ledger[0]['vendor_gstn_no']; ?></td>
						</tr><tr>
						<td><?php echo "<strong>Voucher No. :</strong> ".$ledger[0]['ledger_voucher_no']; ?></td>
						<td><?php echo "<strong>Item Name :</strong> ".$ledger[0]['ledger_goods_name']; ?></td>
						<td><?php echo "<strong>Quantity : </strong>".$ledger[0]['ledger_qty']." ".$ledger[0]['ledger_unit']; ?></td>
						<td><?php echo "<strong>Rate Per QTY : </strong>".$ledger[0]['ledger_rate']; ?></td>
						<td><?php echo "<strong>Total Price :</strong> ".$ledger[0]['ledger_amount']; ?></td>
						</tr><tr>
						<td><?php echo "<strong>Discount Amount :</strong> ".$ledger[0]['ledger_discount']; ?></td>
						<td><?php echo "<strong>Payable Amount : </strong>".$ledger[0]['ledger_payable_amt']; ?></td>
						<td><?php echo "<strong>Balance Amount :</strong> <span id='partial_amt_html'>".$ledger[0]['ledger_balance_amt']."</span>"; ?></td>
						<td colspan='2'><?php echo "<strong>Remark :</strong> ".$ledger[0]['ledger_remark']; ?></td>
						</tr>
						</tbody>
						</table>
						<?php }else{?>
						<table class="table table-bordered">
						<tbody>
						<tr>
						<td><?php echo "<strong>Site Name : </strong>".$ledger[0]['site_name']; ?></td>
						<td><?php echo "<strong>Expense category : </strong>".$this->Common_model->findfield('expense_category','cat_id',$ledger[0]['ledger_vendor_id'],'cat_name'); ?></td>
						<td><?php echo "<strong>Receipt No. :</strong> ".$ledger[0]['ledger_voucher_no']; ?></td>
						<td><?php echo "<strong>Date : </strong>".$ledger[0]['ledger_payment_date']; ?></td>
						</tr><tr>
						<td><?php echo "<strong>Voucher No. : </strong>".$ledger[0]['ledger_voucher_no']; ?></td>
						<td><?php echo "<strong>Payment From Account :</strong> ".$ledger[0]['ledger_goods_name']; ?></td>
						
						<td><?php echo "<strong>Amount : </strong>".$ledger[0]['ledger_amount']; ?></td>
						<td><?php echo "<strong>Mode of Payment :</strong> ".$ledger[0]['ledger_payment_type']; ?></td>
						</tr><tr>
						
						<td colspan='4'><?php echo "<strong>Remark :</strong> ".$ledger[0]['ledger_remark']; ?></td>
						</tr>
						</tbody>
						</table>
						<?php } ?>
						</div>

					</div>
					<!-- end widget content -->
					
				</div>
				<!-- end widget div -->
				
			</div>
			<!-- end widget -->


		</article>
	
		<article class="col-sm-12 col-md-12 col-lg-3">
			
			<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false">
				
				<header>
					<span class="widget-icon"> <i class="fa fa-plus"></i> </span>
					<h2><?php echo $paymentType;?> Partial Payment </h2>				
					
				</header>

				<!-- widget div-->
				<div>
					
					<!-- widget content -->
					<div class="widget-body no-padding">
					<?php	if($ledger[0]['ledger_balance_amt']>0){ ?>
						<form action="#" id="checkout-form" class="smart-form" novalidate="novalidate">
								<input type="hidden" name="partial_ledger_id" id="partial_ledger_id" value="<?php echo $ledger[0]['ledger_id']; ?>">
								<input type="hidden" name="partial_site_id" id="partial_site_id" value="<?php echo $ledger[0]['ledger_site_id']; ?>">
								<input type="hidden" name="partial_type" id="partial_type" value="<?php echo $paymentType;?>">
								<div class="row">
							<section class="col col-12">
							<fieldset>
							
									<section class="col col-12">Balance Amount:
										<label class="input"> <i class="icon-prepend fa fa-money"></i>
											<input class="form-control" type="text" name="partial_amt" id="partial_amt"  placeholder="Balance Amount" value="<?php echo $ledger[0]['ledger_balance_amt']; ?>">
										</label>
									</section>
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-money"></i>
											<input type="text" name="partial_date" id="partial_date" class="datepicker" value="<?php echo date('Y-m-d')?>">
										</label>
									</section>
									<section class="col col-12">
										<label class="select"> 
										<select name="partial_payment_type" id="partial_payment_type">
											<option value="Cash" selected>Cash</option>
											<option value="Cheque">Cheque</option>
											<option value="Bank">Bank</option>
											</select><i></i>
										</label>
									</section>
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-credit-card"></i>
											<input type="text" name="partial_cheque_dd_no" id="partial_cheque_dd_no"  placeholder="Cheque / Transaction No.">
										</label>
									</section>
									<section class="col col-12">
									<label class="textarea">					
										<textarea rows="3" name="partial_remark" id="partial_remark" placeholder="Remark"></textarea> 
									</label>
									</section>
								
							</fieldset>
									</section>
							</div>


							<footer>
								<button type="button" class="btn btn-primary" onclick="SavePayment()" id="save_btn" data-loading-text="Please Wait..."> Save </button>
							</footer>
						</form>
					<?php }else{ ?><br>
					<h4 style="text-align:center;">All Payment is Clear.</h4>
					<?php } ?>
					</div>
					<!-- end widget content -->
					
				</div>
				<!-- end widget div -->
				
			</div>
			<!-- end widget -->


		</article>
		
		<article class="col-sm-12 col-md-12 col-lg-9">
			
			<div class="jarviswidget" id="wid-id-2" data-widget-editbutton="false" data-widget-custombutton="false">
				
				<header>
					<span class="widget-icon"> <i class="fa fa-list"></i> </span>
					<h2><?php echo $paymentType;?> List</h2>			
					<div class="jarviswidget-ctrls" role="menu">  <a href="javascript:void(0);" id="reloaddata" class="button-icon jarviswidget-edit-btn" rel="tooltip" title="" data-placement="bottom" onclick="GetPartialPayment()" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>   </div>				
					
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
			GetPartialPayment();
		});
		
		function GetPartialPayment(){
		$("#result_data").html("<center><img src='<?php echo base_url('img/ajax-loader.gif'); ?>'></center>");
		var content ='';	
		var lid = $('#partial_ledger_id').val();	
		content +='<table class="table table-bordered"><thead><tr><th>Amount</th><th width="100px">Date</th><th>Mode</th><th>Tran / Cheque No.</th><th width="40%">Remark</th><th>Action</th></tr></thead><tbody>';			
		$.getJSON('<?php echo base_url('admin/ACCOUNTS/getVendor_partial_payment'); ?>','lid='+lid, function(res){
					$.each(res, function (k, v) {
					  content +='<tr><td>'+ v.partial_amt +'</td><td>'+ v.partial_date +'</td><td>'+ v.partial_payment_type +'</td><td>'+ v.partial_cheque_dd_no +'</td><td>'+ v.partial_remark +'</td><td><button class="btn btn-danger btn-xs" title="Delete" onclick="DeleteVendorLedger('+ v.partial_id +')" ><i class="fa fa-remove"></i></button></td></tr>';
					});					
					content +='</tbody></table>';	
				$("#result_data").html(content);
			});	 
		}
	

		function SavePayment(){  
				$(".btn").button('loading');
				$.post('<?php echo base_url('admin/ACCOUNTS/addVendor_partial_payment'); ?>', $('#checkout-form').serialize(), function (response) {
					$(".btn").button('reset');
					$('#checkout-form')[0].reset();
					$("#partial_amt").val(response);
					$("#partial_amt_html").html(response);
					GetPartialPayment();
				});
		}			
		
		function DeleteVendorLedger(id){
			var r = confirm("Are you sure you want to Delete this payment ?");
			if(r==true){
		$.ajax({  
				type: "POST",
				url: "<?php echo base_url('admin/ACCOUNTS/deleteVendor_partial_payment'); ?>",
				data: {'id':id},
				success: function(response){
					$("#partial_amt").val(response);
					$("#partial_amt_html").html(response);
				GetPartialPayment();	
				}  
			});	
			}else{}			
		}	
		
		function  CalculateAmt(){
			var qty = $("#ledger_qty").val();
			var rate = $("#ledger_rate").val();
			var total = parseFloat(qty) * parseFloat(rate);
			if(isNaN(total)) {
			var total = 0;
			}else{
			var total = total;
			}
			$("#ledger_amount").val(total);
			var disc = $("#ledger_discount").val();
			var payble = parseFloat(total) - parseFloat(disc);			
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

		