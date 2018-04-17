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
		<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-edit"></i> Property Detail <span></span></h1>
	</div>
		
</div>
<!-- widget grid -->
<section id="widget-grid" class="">

	
	<div class="row">
		
		
		<article class="col-sm-12 col-md-12 col-lg-12">
			
			<div class="jarviswidget" id="wid-id-2" data-widget-editbutton="false" data-widget-custombutton="false">
				
				<header>
					<span class="widget-icon"> <i class="fa fa-list"></i> </span>
					<h2>Property Detail</h2>			
					<div class="jarviswidget-ctrls" role="menu">  </div>				
					
				</header>

				<!-- widget div-->
				<div>
					
					<!-- widget content -->
					<div class="widget-body no-padding">
						
						<div class="table-responsive">
						<?php 
						foreach($customer as $cust){
							?>
						<table class="table table-bordered">
						<tbody>
						<tr>
						<td><?php echo "<strong>Customer Name :</strong> ".$cust['cust_fname'].' '.$cust['cust_lname']; ?></td>
						<td><?php 
						echo "<strong>Customer Contact Info :</strong> ". $cust['cust_phone1'];
						echo ($cust['cust_phone2']!='')? ', ': '';
						echo $cust['cust_phone2'];
						echo ($cust['cust_email']!='')? ', ': '';
						echo $cust['cust_email']; ?></td>
						</tr><tr>
						<td colspan='2'><?php echo "<strong>Customer Address :</strong> ".$cust['cust_address'].' '.$cust['cust_pincode']; ?></td>
						</tr><tr>
						<td><?php echo "<strong>City & State  : </strong>".$cust['cust_city']." ".$cust['cust_state']; ?></td>
						<td><?php echo "<strong>Customer Addhar No. :</strong> ".$cust['cust_aadhar']; ?></td>
						</tr><tr>
						<td><?php echo "<strong>Customer PAN No. : </strong>".$cust['cust_pan']; ?></td>
						<td><?php echo "<strong>Additional Info :</strong> ".$cust['cust_additional_info']; ?></td>
						</tr>
						</tbody>
						</table><br><br>
						<?php
						}
						foreach($propdetails as $detail){ ?>
						<table class="table table-bordered">
						<tbody>
						<tr>
						<td colspan="3"><?php echo "<strong>Property :</strong> ".$detail['prop_type'].' '.$detail['prop_no'].' '.$detail['prop_name']; ?></td>
						</tr><tr>
						<td><?php echo "<strong>Total Area :</strong> ".$detail['prop_area']; ?></td>
						<td><?php echo "<strong>Carpet Area :</strong> ".$detail['prop_carper_area']; ?></td>
						<td><?php echo "<strong>Build-Up Area : </strong>".$detail['prop_buildup_area']; ?></td>
						</tr><tr>
						<td><?php echo "<strong>Actual Price. :</strong> ".number_format($detail['prop_price']); ?></td>
						<td><?php echo "<strong>Sell Price :</strong> ".number_format($detail['prop_sell_price']); ?></td>
						<td><?php echo "<strong>Discount :</strong> ".number_format($detail['prop_discount']); ?></td>
						</tr><tr>
						<td><?php echo "<strong>Booking On :</strong> ".$detail['prop_booking_date']; ?></td>
						<td><?php echo "<strong>Booking Amount :</strong> ".number_format($detail['prop_booking_amt']); ?></td>
						<td><?php echo "<strong>Paid Amount :</strong> ".number_format($detail['prop_paid_amt']); ?></td>
						</tr><tr>
						<td><?php echo "<strong>Remaining Amount :</strong> ".number_format($detail['prop_remaining_amt']); ?></td>
						<td><?php echo "<strong>EMI Duration :</strong> ".$detail['prop_emi_duration']; ?></td>
						<td><?php echo "<strong>Installment Amount :</strong> ".number_format($detail['prop_emi_amount']); ?></td>
						</tr><tr>
						<td><?php echo "<strong>Finance By Bank :</strong> ".$detail['prop_finance_by_bank']; ?></td>
						<td><?php echo "<strong>Remark :</strong> ".$detail['prop_remark']; ?></td>
						<td><?php if($detail['prop_remaining_amt']>0){ ?>
						<button type="button" class="btn btn-primary btn-sm" onclick="ShowInstallment(<?php echo $detail['prop_detail_id']; ?>)" id="show_btn_<?php echo $detail['prop_detail_id']; ?>"> Pay Your Installment </button>
						<button type="button" class="btn btn-primary btn-sm" onclick="HideInstallment(<?php echo $detail['prop_detail_id']; ?>)" id="hide_btn_<?php echo $detail['prop_detail_id']; ?>" style="display:none;"> Close Installment Form </button>
						<?php } ?></td>
						</tr>
						<tr><td colspan="3">
						<div class="col col-12" id="inst_<?php echo $detail['prop_detail_id']; ?>" style="display:none;">
						<legend>Installment Form</legend>
						<form action="#" id="checkout-form_<?php echo $detail['prop_detail_id']; ?>" class="smart-form" novalidate="novalidate" enctype="multipart/form-data">
							<input type="hidden" name="emi_id" id="emi_id_<?php echo $detail['prop_detail_id']; ?>">
							<input type="hidden" name="emi_prop_detail_id" id="emi_prop_detail_id_<?php echo $detail['prop_detail_id']; ?>" value="<?php echo $detail['prop_detail_id']; ?>">
							<fieldset>
								<div class="row">
									<!--<section class="col col-2">
										<label class="label">Installment</label>
										<label class="input"> <i class="icon-prepend fa fa-bar-chart-o"></i>
											<input type="text" id ="emi_number_<?php //echo $detail['prop_detail_id']; ?>" name="emi_number" placeholder="Installment" >
										</label>
									</section>-->
									<section class="col col-2">
										<label class="label">Payment Date</label>
										<label class="input"> <i class="icon-prepend fa fa-bar-chart-o"></i>
											<input type="text" id ="emi_date_<?php echo $detail['prop_detail_id']; ?>" name="emi_date" class="datepicker" placeholder="Date" >
										</label>
									</section>
									<section class="col col-2">
										<label class="label">Amount</label>
										<label class="input"> <i class="icon-prepend fa fa-bar-chart-o"></i>
											<input type="number" id ="emi_amount_<?php echo $detail['prop_detail_id']; ?>" name="emi_amount" placeholder="Amount">
										</label>
									</section>
									<section class="col col-2">
										<label class="label">Payment Type</label>
										<label class="select"> 
											<select name="emi_payment_type" id="emi_payment_type_<?php echo $detail['prop_detail_id']; ?>">
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
											<input type="text" id ="emi_transaction_no_<?php echo $detail['prop_detail_id']; ?>" name="emi_transaction_no" placeholder="Transection No">
										</label>
									</section>
									<section class="col col-2">
										<label class="label">Remark</label>
										<label class="textarea"> 										
											<textarea rows="3" id="emi_remark_<?php echo $detail['prop_detail_id']; ?>" name="emi_remark" placeholder="Remark"></textarea> 
										</label>
									</section>
									<section class="col col-2">
										<label class="label">&nbsp;</label>
										<button type="button" class="btn btn-primary btn-sm" onclick="addEmi(<?php echo $detail['prop_detail_id']; ?>)" id="save_emi_btn" data-loading-text="Please Wait..."> Save </button>
									</section>	
								</div>

								
							</fieldset>


							
						</form><br>
						</div>
						</td></tr>
						<tr><td colspan="3">
						<div class="col col-12" >
						<div id="emi_data_<?php echo $detail['prop_detail_id']; ?>">
						
						</div>
						</div>
						</td></tr>
						</tbody>
						</table>
		<article class="col-sm-12 col-md-12 col-lg-3" style="display:none;">
			
			<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false">
				
				<header>
					<span class="widget-icon"> <i class="fa fa-plus"></i> </span>
					<h2>Installment Payment </h2>				
					
				</header>

				<!-- widget div-->
				<div>
					
					<!-- widget content -->
					<div class="widget-body no-padding">
						
						

					</div>
					<!-- end widget content -->
					
				</div>
				<!-- end widget div -->
				
			</div>
			<!-- end widget -->


		</article>
						<?php } ?>
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
			<?php foreach($propdetails as $ptd){ ?>
			GetEmi(<?php echo $ptd['prop_detail_id']; ?>);
			<?php } ?>
		});
		
		function ShowInstallment(detail_id){
		$("#inst_" + detail_id).show(500);
		$("#hide_btn_" + detail_id).show();
		$("#show_btn_" + detail_id).hide();
		}
		
		function HideInstallment(detail_id){
		$("#inst_" + detail_id).hide(500);
		$("#hide_btn_" + detail_id).hide();
		$("#show_btn_" + detail_id).show();
		}
		
	function GetEmi(detail_id){
		$("#emi_data_" + detail_id).html("<center><img src='<?php echo base_url('img/ajax-loader.gif'); ?>'></center>");
		var c =0;	
		var content ='';	
		content +='<table class="table table-bordered"><thead><tr><th>Installment</th><th>Amount</th><th>Date</th><th>Remark</th><th>Action</th></tr></thead><tbody>';			
		$.getJSON('<?php echo base_url('admin/ACCOUNTS/getEmi'); ?>',{'detail_id':detail_id}, function(res){
					$.each(res, function (k, v) { c++;
					if(c==1){ c= "1st"; }else if(c==2){ c= "2nd"; }else if(c==3){ c= "3rd"; }else{ c= c  +"th"; }
					  content +='<tr><td>'+ c +' Installment</td><td>'+ v.emi_amt +'</td><td>'+ v.emi_date +'</td><td>'+ v.emi_remark +'</td><td></td></tr>';
					});					
					content +='</tbody></table>';	
				$("#emi_data_" + detail_id).html(content);
			});	 
		}
	
// <a class="btn btn-info btn-xs" title="Edit" onclick="EditEmi('+ v.emi_id +')">Edit</a> <a class="btn btn-danger btn-xs" title="Edit" onclick="DeleteEmi('+ v.emi_id +','+ v.emi_prop_detail_id +')">Delete</a>
		
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
					// $("#emi_number_" + v.emi_prop_detail_id).val(v.emi_number);
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

		