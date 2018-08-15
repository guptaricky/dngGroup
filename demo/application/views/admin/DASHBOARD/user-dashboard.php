	<!-- Styles -->
	<style>
	#chartdiv {
	  width: 100%;
	  height: 500px;
	  font-size: 11px;
	}

	.amcharts-pie-slice {
	  transform: scale(1);
	  transform-origin: 50% 50%;
	  transition-duration: 0.3s;
	  transition: all .3s ease-out;
	  -webkit-transition: all .3s ease-out;
	  -moz-transition: all .3s ease-out;
	  -o-transition: all .3s ease-out;
	  cursor: pointer;
	  box-shadow: 0 0 30px 0 #000;
	}

	.amcharts-pie-slice:hover {
	  transform: scale(1.1);
	  filter: url(#shadow);
	}							
	</style>
	<!-- Resources -->
	<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
	<script src="https://www.amcharts.com/lib/3/pie.js"></script>
	<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
	<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
	<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
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


			</div>
			<!-- END RIBBON -->

			<!-- #MAIN CONTENT -->
			<div id="content">
				<div class="row">
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
						<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-home"></i> 
						<?php echo $this->Common_model->findfield('site_detail','site_id',$site,'site_name');?> <span></span></h1>
					</div>
					<!-- right side of the page with the sparkline graphs -->
					<!-- col -->
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
						<!-- sparks -->
						<ul id="sparks">
							<li class="sparks-info hide">
								<h5> Balance <span class="txt-color-blue"><i class="fa fa-rupee"></i> 47,171</span></h5>
								
							</li>
							<li class="sparks-info hide">
								<h5> Site Value <span class="txt-color-purple"><i class="fa fa-arrow-circle-up" data-rel="bootstrap-tooltip" title="Increased"></i>&nbsp;45%</span></h5>
								
							</li>
							<li class="sparks-info">
								<h5> Month Expenses <span class="txt-color-greenDark"><i class="fa fa-rupee"></i>&nbsp;<?php  print_r($this->Common_model->moneyFormatIndia($expensesthismonth[0]['totalexpensethismonth']));?></span></h5>
								
							</li>
						</ul>
						<!-- end sparks -->
					</div>
					<!-- end col -->	
				</div>
				
				<!-- widget grid -->
				<section id="widget-grid" class="">

					<div class="well padding-5">
					<div class="row">

						<!-- a blank row to get started -->
						<div class="col-sm-3 col-lg-12">
							<!-- HTML -->
							<div id="chartdiv"></div>
						</div>
					</div>
					</div>
						
					<!-- end row -->

				</section>
				<!-- end widget grid -->
		
				<!-- widget grid -->
				<section id="widget-grid" class="">
					
					<div class="row">
						<article class="col-sm-12 col-md-12 col-lg-12">
							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-1" data-widget-editbutton="false">
								<!-- widget options:
								usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

								data-widget-colorbutton="false"
								data-widget-editbutton="false"
								data-widget-togglebutton="false"
								data-widget-deletebutton="false"
								data-widget-fullscreenbutton="false"
								data-widget-custombutton="false"
								data-widget-collapsed="true"
								data-widget-sortable="false"

								-->
								

								<!-- widget div-->
								<div>

									<!-- widget edit box -->
									
									<!-- end widget edit box -->

									<!-- widget content -->
									<div class="widget-body no-padding">
									<div class="widget-body ">
										<div class="tabbable">
											<ul class="nav nav-tabs bordered" >
												<li class="active"><a href="#tab_1" style="color:#000 !important;padding:8px" data-toggle="tab" rel="tooltip" data-placement="top">Expenses</a></li>
												<li class=""><a href="#tab_2" style="color:#000 !important;padding:8px" data-toggle="tab" rel="tooltip" data-placement="top">Vendor Payments</a></li>
												<li class=""><a href="#tab_3" style="color:#000 !important;padding:8px" data-toggle="tab" rel="tooltip" data-placement="top">Receives</a></li>
											</ul>
											<div class="tab-content padding-10" >
											<div class="tab-pane in active" id="tab_1">
											<table id="datatable_fixed_column" class="table table-striped table-bordered" width="100%">
							
											<thead>
												<form id='search_form'>
												<tr>
													<th class="hasinput">
													<input type="hidden" name="site_id" value="<?php echo $this->uri->segment(4); ?>"/>
													</th>
													<th class="hasinput">
														<input type="text" class="form-control datepicker" placeholder="Filter Date" name="date" onchange="getexpenselist();"/>
													</th>
													<th class="hasinput">
													</th>
													<th class="hasinput" >
														<div class="input-group">
															<input class="form-control" placeholder="Filter Description" type="text" name="desc" onkeyup="getexpenselist();">
														</div>	
													</th>
													<th class="hasinput">
													<select class="form-control" name="category" onchange="getexpenselist();">
														<option value=""> EXPENSE CATEGORY </option>
														<?php foreach($expensesCat as $v){ ?>
														<option value="<?php echo $v['cat_id']; ?>"><?php echo $v['cat_name']; ?></option>
														<?php } ?>
														</select><i></i>
													</th>
													<th class="hasinput">
														<input type="text" class="form-control" placeholder="Filter Amount" name="amount" onkeyup="getexpenselist();"/>
													</th>
												</tr>
												</form>
												<tr>
													<th>SNO.</th>
													<th data-class="expand">Date</th>
													<th data-class="expand">Site</th>
													<th>Description</th>
													<th data-hide="phone">Category</th>
													<th style="text-align:right" data-hide="phone">Amount</th>
												</tr>
											</thead>

											<tbody id='expense_list'>
											<?php $sno=0;foreach($expenses as $exp): $sno++;?>
												<tr>
													<td><?php echo $sno;?>.</td>
													<td><?php echo date('d M, Y', strtotime($exp['ledger_payment_date']))?></td>
													<td><?php echo $this->Common_model->findfield('site_detail','site_id',$exp['ledger_site_id'],'site_short_name');?></td>
													<td><?php echo $exp['ledger_remark'];?></td>
													<td><?php echo $this->Common_model->findfield('expense_category','cat_id',$exp['ledger_vendor_id'],'cat_name');?></td>
													<td style="text-align:right"><?php echo $exp['ledger_paid_amt'];?></td>
												</tr>
											<?php endforeach ?>	
												
											</tbody>
											
											</table>

											</div>
											<div class="tab-pane in" id="tab_2">
											<table id="datatable_fixed_column" class="table table-striped table-bordered" width="100%">
						
											<thead>
												<form id='search_vendor_form'>
												<tr>
													<th class="hasinput">
													<input type="hidden" name="site_id" value="<?php echo $this->uri->segment(4); ?>"/>
													</th>
													<th class="hasinput">
													<select class="form-control" name="vendor_id" onchange="getvendorlist();">
														<option value=""> VENDOR </option>
														<?php foreach($vendorlist as $v){ ?>
														<option value="<?php echo $v['vendor_id']; ?>"><?php echo $v['vendor_name']; ?></option>
														<?php } ?>
														</select><i></i>
													</th>
													<th class="hasinput" colspan="2">
														<div class="input-group">
															<input class="form-control" placeholder="Voucher No" type="text" name="voch_no" onkeyup="getvendorlist();">
														</div>	
													</th>
													<th class="hasinput">
													<input type="text" class="form-control datepicker" placeholder="Filter Date" name="date" onchange="getvendorlist();"/>
													</th>
													<th class="hasinput" colspan="2">
														<input type="text" class="form-control" placeholder="Filter Item" name="item" onkeyup="getvendorlist();"/>
													</th>
												</tr>
												</form>
												<tr>
													<th>SNO.</th>
													<th data-class="expand">Vendor Name</th>
													<th data-class="expand">Voucher No</th>
													<th data-class="expand">Date</th>
													<th data-class="expand">Site</th>
													<th>Item</th>
													<th style="text-align:right" data-hide="phone">Total Amount</th>
													<th style="text-align:right" data-hide="phone">Balance</th>
												</tr>
											</thead>

											<tbody id='vendor_list'>
											<?php $sno=0;foreach($vendor as $ven): $sno++;?>
												<tr>
													<td><?php echo $sno;?>.</td>
													<td><?php echo $this->Common_model->findfield('vendor_master','vendor_id',$ven['ledger_vendor_id'],'vendor_name');?></td>
													<td><?php echo $ven['ledger_voucher_no']; ?></td>
													<td><?php echo date('d M, Y', strtotime($ven['ledger_payment_date']))?></td>
													<td><?php echo $this->Common_model->findfield('site_detail','site_id',$ven['ledger_site_id'],'site_short_name');?></td>
													<td><?php echo $ven['ledger_goods_name'];?></td>
													
													<td style="text-align:right"><?php echo $ven['ledger_payable_amt'];?></td>
													<td style="text-align:right"><?php echo $ven['ledger_balance_amt'];?></td>
													
												</tr>
											<?php endforeach ?>	
												
											</tbody>
										
											</table>
											</div>
											<div class="tab-pane in " id="tab_3">
											<table id="datatable_fixed_column" class="table table-striped table-bordered" width="100%">
							
											<thead>
												<form id='search_form'>
												<tr>
													<th class="hasinput">
													<input type="hidden" name="site_id" value="<?php echo $this->uri->segment(4); ?>"/>
													</th>
													<th class="hasinput">
														<input type="text" class="form-control datepicker" placeholder="Filter Date" name="date" onchange="getexpenselist();"/>
													</th>
													<th class="hasinput">
														
													</th>
													
													<th class="hasinput" >
														<div class="input-group">
															<input class="form-control" placeholder="Filter Description" type="text" name="desc" onkeyup="getexpenselist();">
														</div>	
													</th>
													<th class="hasinput">
														<input type="text" class="form-control" placeholder="Filter Amount" name="amount" onkeyup="getexpenselist();"/>
													</th>
												</tr>
												</form>
												<tr>
													<th>SNO.</th>
													<th data-class="expand">Date</th>
													<th data-class="expand">Site</th>
													<th>Description</th>
													<th style="text-align:right" data-hide="phone">Amount</th>
												</tr>
											</thead>

											<tbody id='expense_list'>
											<?php $sno=0;foreach($receives as $exp): $sno++;?>
												<tr>
													<td><?php echo $sno;?>.</td>
													<td><?php echo date('d M, Y', strtotime($exp['ledger_payment_date']))?></td>
													<td><?php echo $this->Common_model->findfield('site_detail','site_id',$exp['ledger_site_id'],'site_short_name');?></td>
													<td><?php echo $exp['ledger_remark'];?></td>
													<td style="text-align:right"><?php echo $exp['ledger_paid_amt'];?></td>
												</tr>
											<?php endforeach ?>	
												
											</tbody>
											
											</table>

											</div>
											</div>
										</div>
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
	
<!-- Chart code -->
<script>
var chart = AmCharts.makeChart("chartdiv", {
  "type": "pie",
  "startDuration": 0,
   "theme": "light",
  "addClassNames": true,
  "legend":{
   	"position":"right",
    "marginRight":100,
    "autoMargins":false
  },
  "innerRadius": "30%",
  "defs": {
    "filter": [{
      "id": "shadow",
      "width": "150%",
      "height": "150%",
      "feOffset": {
        "result": "offOut",
        "in": "SourceAlpha",
        "dx": 0,
        "dy": 0
      },
      "feGaussianBlur": {
        "result": "blurOut",
        "in": "offOut",
        "stdDeviation": 5
      },
      "feBlend": {
        "in": "SourceGraphic",
        "in2": "blurOut",
        "mode": "normal"
      }
    }]
  },
  "dataProvider": [
  <?php foreach($expensesongraph as $exp){?>
  {
	<?php  
	$category =$this->Common_model->findfield('expense_category','cat_id',$exp['ledger_vendor_id'],'cat_name');
	$paidamt =$exp['ledger_paid_amt'];
	?>
    "country": "<?php  if($category !=''){echo $category;}else{echo 'Uncategorized';} ?>",
    "Rupees": <?php echo $paidamt;?>
  },<?php } ?>],
  "valueField": "Rupees",
  "titleField": "country",
  "export": {
    "enabled": true
  }
});

chart.addListener("init", handleInit);

chart.addListener("rollOverSlice", function(e) {
  handleRollOver(e);
});

function handleInit(){
  chart.legend.addListener("rollOverItem", handleRollOver);
}

function getexpenselist(){
	var datastring = $('#search_form').serialize();
  $.ajax({  
				type: "POST",
				url: "<?php echo base_url('admin/DASHBOARD/filter_expense'); ?>",
				data: datastring,
				success: function(res){
				$('#expense_list').html(res);	
				}  
			});	
}

function getvendorlist(){
	var datastring = $('#search_vendor_form').serialize();
  $.ajax({  
				type: "POST",
				url: "<?php echo base_url('admin/DASHBOARD/filter_vendor'); ?>",
				data: datastring,
				success: function(res){
				$('#vendor_list').html(res);	
				}  
			});	
}

function handleRollOver(e){
  var wedge = e.dataItem.wedge.node;
  wedge.parentNode.appendChild(wedge);
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

		