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
		<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-edit"></i> Company Bank Account Management <span></span></h1>
	</div>
		
</div>
<!-- widget grid -->
<section id="widget-grid" class="">

	
	<div class="row">

		<article class="col-sm-12 col-md-12 col-lg-3">
			
			<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false">
				
				<header>
					<span class="widget-icon"> <i class="fa fa-plus"></i> </span>
					<h2>Add Bank </h2>				
					
				</header>

				<!-- widget div-->
				<div>
					
					<!-- widget content -->
					<div class="widget-body no-padding">
						
						<form action="#" id="checkout-form" class="smart-form" novalidate="novalidate" enctype="multipart/form-data">
								<input type="hidden" name="bank_id" id="bank_id" >
							<fieldset>
								<div class="row">
									
									<section class="col col-12" >
										<label class="select"> 
										<select id="bank_name" name="bank_name" >
										<option value="">  Select Bank </option>
											<?php foreach($banks as $bk):?>
											<option value="<?php echo $bk['bank_id'];?>"><?php echo $bk['bank_name'];?></option>
											<?php endforeach; ?>
										</select> <i></i> </label>
									</section>
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-bank"></i>
											<input type="text" name="acc_name" id="acc_name" placeholder="Bank Account Name">
										</label>
									</section>
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-bank"></i>
											<input type="text" style="text-transform:uppercase" name="bank_branch_name" id="bank_branch_name" placeholder="Bank Branch Name">
										</label>
									</section>
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-bank"></i>
											<input type="text" style="text-transform:uppercase" name="bank_ifsc_code" id="bank_ifsc_code" placeholder="Bank IFSC Code">
										</label>
									</section>
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-bank"></i>
											<input type="text" name="bank_acc_no" id="bank_acc_no" placeholder="Bank Account Number">
										</label>
									</section>	
								</div>
							</fieldset>

							<footer>
								<button type="submit" class="btn btn-primary" onclick="/*Addbank()*/" id="save_btn" data-loading-text="Please Wait..."> Add to List </button>
								<button type="reset" class="btn btn-default" id="reset"> RESET </button>
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
					<h2>Banks List</h2>			
					<div class="jarviswidget-ctrls" role="menu">  <a href="javascript:void(0);" id="reloaddata" class="button-icon jarviswidget-edit-btn" rel="tooltip" title="" data-placement="bottom" onclick="Getbank()" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>   </div>				
					
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
	Getbank();
		
	$('#checkout-form').on('submit',function(e){//bind event on form submit.
		e.preventDefault(); 
				$(".btn").button('loading');
		    $.ajax({
				url:"<?php echo base_url('admin/MASTERS/add_company_bank_accounts'); ?>",
				type:"post",
				data:new FormData(this),
				processData:false,
				contentType:false,
				cache:false,
				async:false,
				success: function(data){
					$(".btn").button('reset');
					// $('#checkout-form')[0].rese	t();
					// Getbank();
					location.reload();
				}
			});
	}); 
});
		
		function Getbank(){
		$("#result_data").html("<center><img src='<?php echo base_url('img/ajax-loader.gif'); ?>'></center>");
		var content ='';	
		content +='<table class="table table-bordered"><thead><tr><th>Bank / Branch</th><th>Bank Account Name</th><th>Account No.</th><th>IFSC Code</th><th>Action</th></tr></thead><tbody>';			
		$.getJSON('<?php echo base_url('admin/MASTERS/get_company_bank_accounts'); ?>','', function(res){
					$.each(res, function (k, v) {
					  content +='<tr><td>'+ v.bank_name +'</br>'+ v.bank_branch_name +'</td><td>'+ v.bank_acc_name +'</td><td>'+ v.bank_acc_no +'</td><td>'+ v.bank_ifsc_code +'</td><td><span style="cursor:pointer;" title="Edit" onclick="Editbank('+ v.bank_id +')"><i class="fa fa-edit"></i></span>&nbsp;<span title="Delete" style="cursor:pointer;" onclick="Deletebank('+ v.bank_id +')"><i class="fa fa-remove"></i></span></td></tr>';
					});					
					content +='</tbody></table>';	
				$("#result_data").html(content);
			});	 
		}
	
		function Editbank(id){
		$.post('<?php echo base_url('admin/MASTERS/edit_company_bank_accounts'); ?>', {'id':id}, function(response){
			var res = jQuery.parseJSON(response);
				$.each(res, function (k, v) {
					$("#bank_id").val(v.bank_id);
					$("#bank_name").val(v.bank_name);
					$("#bank_branch_name").val(v.bank_branch_name);
					$("#bank_acc_no").val(v.bank_acc_no);
					$("#bank_ifsc_code").val(v.bank_ifsc_code);
					});	
			});	 
		}	
		
		function Deletebank(id){
			var r = confirm("Are you sure you want to Delete this bank ?");
			if(r==true){
		$.ajax({  
				type: "POST",
				url: "<?php echo base_url('admin/MASTERS/delete_company_bank_accounts'); ?>",
				data: {'id':id},
				success: function(msg){
				Getbank();	
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

		