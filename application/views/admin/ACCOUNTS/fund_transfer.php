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
		<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-edit"></i> Fund Transfer Detail <span></span></h1>
	</div>
		
</div>
<!-- widget grid -->
<section id="widget-grid" class="">

	
	<div class="row">

		<article class="col-sm-12 col-md-12 col-lg-3">
			
			<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false">
				
				<header>
					<span class="widget-icon"> <i class="fa fa-plus"></i> </span>
					<h2>Add Fund Transfer Detail </h2>				
					
				</header>

				<!-- widget div-->
				<div>
					
					<!-- widget content -->
					<div class="widget-body no-padding">
						
						<form action="#" id="checkout-form" class="smart-form" novalidate="novalidate" enctype="multipart/form-data">
								<input type="hidden" name="transfer_id" id="transfer_id" >
								<div class="row">
									<section class="col col-12">
							<fieldset>
								<div class="row">
									<section class="col col-12">
										<label class="select"> 
											<select name="transfer_from" id="transfer_from">
											<option value=""> Transfer From </option>
											<?php foreach($account as $acc){ ?>
											<option value="<?php echo $acc['acc_id']; ?>"><?php echo $acc['acc_name']; ?></option>
											<?php } ?>
											</select><i></i>
										</label>
									</section>
									<section class="col col-12">
										<label class="select"> 
											<select name="transfer_to" id="transfer_to" >
											<option value=""> Transfer To </option>
											<?php foreach($sites as $site){ ?>
											<option value="<?php echo $site['site_id']; ?>"><?php echo $site['site_name']; ?></option>
											<?php } ?>
											</select><i></i>
										</label>
									</section>
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-bar-chart-o"></i>
											<input type="text" name="transfer_perpose" id="transfer_perpose" placeholder="Purpose of Transfer">
										</label>
									</section>
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-mobile"></i>
											<input type="file" name="transfer_receipt" id="transfer_receipt" placeholder="Receipt Image">
										</label>
									</section>
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-money"></i>
											<input type="text" name="transfer_amt" id="transfer_amt" placeholder="Transfer Amount">
										</label>
									</section>
									
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-calendar"></i>
											<input type="text" name="transfer_date" id="transfer_date"  placeholder="yyyy-mm-dd" class="datepicker">
										</label>
									</section>
									<section class="col col-12">
										<label class="select"> 
										<select name="transfer_payment_type" id="transfer_payment_type">
											<option value=""> SELECT TYPE </option>
											<option value="Cash">Cash</option>
											<option value="Cheque">Cheque</option>
											<option value="Bank">Bank</option>
											</select><i></i>
										</label>
									</section>
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-credit-card"></i>
											<input type="text" name="transfer_cheque_dd_no" id="transfer_cheque_dd_no"  placeholder="Cheque / Transaction No.">
										</label>
									</section>
									<section class="col col-12">
									<label class="textarea">					
										<textarea rows="3" name="transfer_remark" id="transfer_remark" placeholder="Remark"></textarea> 
									</label>
									</section>	
								</div>
							</fieldset>
						</section>
							</div>


							<footer>
								<button type="submit" class="btn btn-primary" id="save_btn" data-loading-text="Please Wait..."> Add to List </button>
								<!--<button type="button" class="btn btn-primary" onclick="AddFundTransfer()" id="save_btn" data-loading-text="Please Wait..."> Add to List </button>-->
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
		
		<article class="col-sm-12 col-md-12 col-lg-9">
			
			<div class="jarviswidget" id="wid-id-2" data-widget-editbutton="false" data-widget-custombutton="false">
				
				<header>
					<span class="widget-icon"> <i class="fa fa-list"></i> </span>
					<h2> Fund Transfer List</h2>			
					<div class="jarviswidget-ctrls" role="menu">  <a href="javascript:void(0);" id="reloaddata" class="button-icon jarviswidget-edit-btn" rel="tooltip" title="" data-placement="bottom" onclick="GetFundTransfer()" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>   </div>				
					
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
GetFundTransfer();
		
	$('#checkout-form').on('submit',function(e){//bind event on form submit.
		e.preventDefault(); 
		var transfer_from = $("#transfer_from").val();
		var transfer_to = $("#transfer_to").val();
		if(transfer_from=='' || transfer_to==''){
			alert("Please Enter Valid Details....?");
		}else{
			$(".btn").button('loading');
		 $.ajax({
			 url:"<?php echo base_url('admin/ACCOUNTS/add_fund_transfer'); ?>",
			 type:"post",
			 data:new FormData(this),
			 processData:false,
			 contentType:false,
			 cache:false,
			 async:false,
			  success: function(data){
					$(".btn").button('reset');
					$('#checkout-form')[0].reset();
					GetFundTransfer();
			  }
			});
		}
	});  
});
		
		function GetFundTransfer(){
		$("#result_data").html("<center><img src='<?php echo base_url('img/ajax-loader.gif'); ?>'></center>");
		var content ='';	
		content +='<table class="table table-bordered"><thead><tr><th>Transfer From</th><th>Transfer To</th><th>Transfer Amount</th><th>Date</th><th>Purpose</th><th>Remark</th><th>Action</th></tr></thead><tbody>';			
		$.getJSON('<?php echo base_url('admin/ACCOUNTS/get_fund_transfer'); ?>','', function(data){
					$.each(data.list, function (k, v) {
					  content +='<tr><td>'+ v.transfer_from +'</td><td>'+ v.transfer_to +'</td><td>'+ v.transfer_amt +'</td><td>'+ v.transfer_date +'</td><td>'+ v.transfer_perpose +'</td><td>'+ v.transfer_remark +'</td><td><button class="btn btn-info btn-xs" title="Edit" onclick="EditFundTransfer('+ v.transfer_id +')"><i class="fa fa-edit"></i></button>&nbsp;<button class="btn btn-danger btn-xs" title="Delete" onclick="DeleteFundTransfer('+ v.transfer_id +')" ><i class="fa fa-remove"></i></button></td></tr>';
					});					
					content +='</tbody></table>';	
				$("#result_data").html(content);
			});	 
		}
	

		// function AddFundTransfer(){  
		// var transfer_from = $("#transfer_from").val();
		// var transfer_to = $("#transfer_to").val();
			// if(transfer_from=='' || transfer_from==''){
				// alert("Please Enter Valid Details....?");
			// }else{
				// $(".btn").button('loading');
				// $.post('<?php echo base_url('admin/ACCOUNTS/add_fund_transfer'); ?>', $('#checkout-form').serialize(), function (response) {
					// $(".btn").button('reset');
					// $('#checkout-form')[0].reset();
					// GetFundTransfer();
				// });
			// }
		// }	
		
		function EditFundTransfer(id){
		$.post('<?php echo base_url('admin/ACCOUNTS/edit_fund_transfer'); ?>', {'id':id}, function(response){
			var res = jQuery.parseJSON(response);
				$.each(res, function (k, v) {
					$("#transfer_id").val(v.transfer_id);
					$("#transfer_from").val(v.transfer_from);
					$("#transfer_to").val(v.transfer_to);
					$("#transfer_perpose").val(v.transfer_perpose);
					$("#transfer_date").val(v.transfer_date);
					$("#transfer_amt").val(v.transfer_amt);
					$("#transfer_payment_type").val(v.transfer_payment_type);
					$("#transfer_cheque_dd_no").val(v.transfer_cheque_dd_no);
					$("#transfer_remark").val(v.transfer_remark);
					});	
			});	 
		}	
		
		function DeleteFundTransfer(id){
			var r = confirm("Are you sure you want to Delete this Record ?");
			if(r==true){
		$.ajax({  
				type: "POST",
				url: "<?php echo base_url('admin/ACCOUNTS/delete_fund_transfer'); ?>",
				data: {'id':id},
				success: function(msg){
				GetFundTransfer();	
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

		