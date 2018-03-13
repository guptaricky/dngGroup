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
		<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-edit"></i> Account Detail <span></span></h1>
	</div>
		
</div>
<!-- widget grid -->
<section id="widget-grid" class="">

	
	<div class="row">

		<article class="col-sm-12 col-md-12 col-lg-3">
			
			<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false">
				
				<header>
					<span class="widget-icon"> <i class="fa fa-plus"></i> </span>
					<h2>Add Account </h2>				
					
				</header>

				<!-- widget div-->
				<div>
					
					<!-- widget content -->
					<div class="widget-body no-padding">
						
						<form action="#" id="checkout-form" class="smart-form" novalidate="novalidate" enctype="multipart/form-data">
								<input type="hidden" name="acc_id" id="acc_id" >
								<div class="row">
									<section class="col col-12">
							<fieldset>
								<div class="row">
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-bar-chart-o"></i>
											<input type="text" name="acc_name" id="acc_name" placeholder="Account Name">
										</label>
									</section>
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-mobile"></i>
											<input type="text" name="acc_short_name" id="acc_short_name" placeholder="Account Short Name">
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
					<h2> Accounts </h2>			
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
GetAccounts();
		
	$('#checkout-form').on('submit',function(e){//bind event on form submit.
		e.preventDefault(); 
		
			$(".btn").button('loading');
		 $.ajax({
			 url:"<?php echo base_url('admin/ACCOUNTS/insert_account'); ?>",
			 type:"post",
			 data:new FormData(this),
			 processData:false,
			 contentType:false,
			 cache:false,
			 async:false,
			  success: function(data){
					$(".btn").button('reset');
					$('#checkout-form')[0].reset();
					GetAccounts();
			  }
			});
	});  
});
		<!--<button class="btn btn-danger btn-xs" title="Delete" onclick="DeleteAccount('+ v.acc_id +')" ><i class="fa fa-remove"></i></button>-->
		function GetAccounts(){
		$("#result_data").html("<center><img src='<?php echo base_url('img/ajax-loader.gif'); ?>'></center>");
		var content ='';	
		content +='<table class="table table-bordered"><thead><tr><th>Account Name</th><th>Account Short Name</th><th>Balance</th><th>Action</th></tr></thead><tbody>';			
		$.getJSON('<?php echo base_url('admin/ACCOUNTS/get_account'); ?>','', function(data){
					$.each(data, function (k, v) {
					  content +='<tr><td>'+ v.acc_name +'</td><td>'+ v.acc_short_name +'</td><td>'+ v.acc_balance +'</td><td><button class="btn btn-info btn-xs" title="Edit" onclick="EditAccount('+ v.acc_id +')"><i class="fa fa-edit"></i></button>&nbsp;&nbsp;<a class="btn btn-primary btn-xs" href="<?php echo base_url('admin/ACCOUNTS/acc_statement'); ?>/'+ v.acc_id +'" title="Account Transaction Details"><i class="fa fa-eye-open"></i> Transactions</a>&nbsp;<a class="btn btn-info btn-xs" href="<?php echo base_url('admin/ACCOUNTS/account_balance'); ?>/'+ v.acc_id +'" title="Account Balance Details"><i class="fa fa-eye-open"></i> Add Balance</a></td></tr>';
					});					
					content +='</tbody></table>';	
				$("#result_data").html(content);
			});	 
		}
	

	
		
		function EditAccount(id){
		$.post('<?php echo base_url('admin/ACCOUNTS/edit_account'); ?>', {'id':id}, function(response){
			var res = jQuery.parseJSON(response);
				$.each(res, function (k, v) {
					$("#acc_id").val(v.transfer_id);
					$("#acc_name").val(v.acc_name);
					$("#acc_short_name").val(v.acc_short_name);
					});	
			});	 
		}	
		
		function DeleteAccount(id){
			var r = confirm("Are you sure you want to Delete this Account ?");
			if(r==true){
		$.ajax({  
				type: "POST",
				url: "<?php echo base_url('admin/ACCOUNTS/delete_account'); ?>",
				data: {'id':id},
				success: function(msg){
				GetAccounts();	
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

		