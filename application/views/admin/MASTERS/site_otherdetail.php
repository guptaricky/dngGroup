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
		<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-edit"></i> Site Other Details <span></span></h1>
	</div>
		
</div>
<!-- widget grid -->
<section id="widget-grid" class="">

	
	<div class="row">

		<article class="col-sm-12 col-md-12 col-lg-3">
			
			<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false">
				
				<header>
					<span class="widget-icon"> <i class="fa fa-plus"></i> </span>
					<h2>Add Site Other Details</h2>				
					
				</header>

				<!-- widget div-->
				<div>
					
					<!-- widget content -->
					<div class="widget-body no-padding">
						
						<form action="#" id="checkout-form" class="smart-form" novalidate="novalidate" enctype="multipart/form-data">
								<input type="hidden" name="detail_id" id="detail_id" >
							<fieldset>
								<div class="row">
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-user"></i>
											<select name="detail_site_id" class="form-control col col-12" id="detail_site_id" >
												<option value=""> SELECT SITE </option>
												<?php foreach($sites as $site){ ?>
												<option value="<?php echo $site['site_id']; ?>"><?php echo $site['site_name']; ?></option>
												<?php } ?>
											</select>											
										</label>
									</section>
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-image"></i>
											<select name="detail_sector" class="form-control col col-12"  id="detail_sector" >
												<option value="">SELECT SECTOR</option>
												<option value="Sector 1">Sector 1</option>
												<option value="Sector 2">Sector 2</option>
											</select>
										</label>
									</section>
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-user"></i>
											<select name="detail_type" class="form-control col col-12" id="detail_type">
												<option value="">SELECT PROPERTY TYPE</option>
												<option value="Plots">Plots</option>
												<option value="Flats">Flats</option>
												<option value="Houses">Houses</option>
											</select>
										</label>
									</section>
									<section class="col col-12" hidden>
										<label class="input"> <i class="icon-prepend fa fa-mobile"></i>
											<input type="text" name="detail_no_of_units" id="detail_no_of_units" placeholder="No of Units">
										</label>
									</section>
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-mobile"></i>
											<input type="text" name="detail_area" id="detail_area" onkeyup="getPrice()" placeholder="Area in sqft">
										</label>
									</section>
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-mobile"></i>
											<input type="text" name="detail_rate" id="detail_rate" onkeyup="getPrice()" placeholder="Rate Per sqft">
										</label>
									</section>
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-mobile"></i>
											<input type="text" name="detail_price" id="detail_price" placeholder="Total Price">
										</label>
									</section>
									<section class="col col-12">
									<label class="textarea">					
										<textarea rows="3" name="detail_site_nos" id="detail_site_nos" placeholder="Property Numbers eg: 101,102,103,...."></textarea> 
									</label>
									</section>
								</div>
							</fieldset>

							<footer>
								<button type="button" class="btn btn-primary" onclick="Addsiteotherdetails()" id="save_btn" data-loading-text="Please Wait..."> Add to List </button>
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
					<h2>Sites Other Detail List</h2>			
					<div class="jarviswidget-ctrls" role="menu">  <a href="javascript:void(0);" id="reloaddata" class="button-icon jarviswidget-edit-btn" rel="tooltip" title="" data-placement="bottom" onclick="Getsitedetails()" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>   </div>				
					
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
			Getsitedetails();
		});
		
		function Getsitedetails(){
		$("#result_data").html("<center><img src='<?php echo base_url('img/ajax-loader.gif'); ?>'></center>");
		var content ='';	
		content +="<table class='table table-bordered'><thead><tr><th>Site name</th><th>Sector</th><th>Property Type</th><th>Area in sqft</th><th>Rate / sqft</th><th>Total Price</th><th>Action</th></tr></thead><tbody>";			
		$.getJSON('<?php echo base_url('admin/MASTERS/get_site_otherdetail'); ?>','', function(res){
					$.each(res, function (k, v) {
					  content +='<tr><td>'+ v.site_name +'</td><td>'+ v.detail_sector +'</td><td>'+ v.detail_type +'</td><td>'+ v.detail_area +'</td><td>'+ v.detail_rate +'</td><td>'+ v.detail_price +'</td><td><span style="cursor:pointer;" title="Edit" onclick="Editsiteotherdetails('+ v.detail_id +')"><i class="fa fa-edit"></i></span>&nbsp;<span title="Delete" style="cursor:pointer;" onclick="Deletesiteotherdetails('+ v.detail_id +')"><i class="fa fa-remove"></i></span></td></tr>';
					});					
					content +='</tbody></table>';	
				$("#result_data").html(content);
			});	 
		}
	

		function Addsiteotherdetails(){        
		$(".btn").button('loading');		
                   var form_data = $('#checkout-form').serialize();
			$.post('<?php echo base_url('admin/MASTERS/add_site_otherdetail'); ?>', form_data, function (response) {
				$(".btn").button('reset');
				$('#checkout-form')[0].reset();
				Getsitedetails();
			});
		}	
		
		function Editsiteotherdetails(id){
		$.post('<?php echo base_url('admin/MASTERS/edit_site_otherdetail'); ?>', {'id':id}, function(response){
			var res = jQuery.parseJSON(response);
				$.each(res, function (k, v) {
					$("#detail_id").val(v.detail_id);
					$("#detail_site_id").val(v.detail_site_id);
					$("#detail_sector").val(v.detail_sector);
					$("#detail_type").val(v.detail_type);
					$("#detail_no_of_units").val(v.detail_no_of_units);
					$("#detail_area").val(v.detail_area);
					$("#detail_rate").val(v.detail_rate);
					$("#detail_price").val(v.detail_price);
					$("#detail_site_nos").val(v.detail_site_nos);
					});	
			});	 
		}	
		
		function Deletesiteotherdetails(id){
			var r = confirm("Are you sure you want to Delete these site Details ?");
			if(r==true){
		$.ajax({  
				type: "POST",
				url: "<?php echo base_url('admin/MASTERS/delete_site_otherdetail'); ?>",
				data: {'id':id},
				success: function(msg){
				Getsitedetails();	
				}  
			});	
			}else{}			
		}	
		
		function getPrice(){
			var area = $("#detail_area").val();
			var rate = $("#detail_rate").val();
			var total = parseFloat(area) * parseFloat(rate);
			if(isNaN(total)) {
			$("#detail_price").val(0);
			}else{
			$("#detail_price").val(total);
			}
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

		