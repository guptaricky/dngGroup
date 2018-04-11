
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
		<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-list"></i> Reports <span></span></h1>
	</div>
		
</div>
<!-- widget grid -->
<section id="widget-grid" class="">
<!-- row -->
	<div class="row">
		<article class="col-sm-12">
			<!-- new widget -->
			<div class="jarviswidget" id="wid-id-0" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
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
				<header>
					<span class="widget-icon"> <i class="glyphicon glyphicon-stats txt-color-darken"></i> </span>
					<h2>Reports </h2>

					<ul class="nav nav-tabs pull-right in" id="myTab">
						<li class="active">
							<a data-toggle="tab" href="#s1"><i class="fa fa-clock-o"></i> <span class="hidden-mobile hidden-tablet">Expenses</span></a>
						</li>

						<!--<li>
							<a data-toggle="tab" href="#s2"><i class="fa fa-facebook"></i> <span class="hidden-mobile hidden-tablet">Vendors Payments</span></a>
						</li>

						<li>
							<a data-toggle="tab" href="#s3"><i class="fa fa-dollar"></i> <span class="hidden-mobile hidden-tablet">Overall</span></a>
						</li>-->
					</ul>

				</header>

				<!-- widget div-->
				<div class="no-padding">
					<!-- widget edit box -->
					<div class="jarviswidget-editbox">

						test
					</div>
					<!-- end widget edit box -->

					<div class="widget-body">
						<!-- content -->
						<div id="myTabContent" class="tab-content">
							<div class="tab-pane fade active in" id="s1">
								<div class="widget-body-toolbar bg-color-white">

									<form class="form-inline" role="form">
										<?php 
										$group = $this->session->userdata('group');
										if($group == 'admin'){
										?>
										<div class="form-group">
											<label class="sr-only" >Show From</label>
											<select class="form-control input-sm" name="ledger_site_id" id="ledger_site_id" onchange="ledgerSiteWise()">
											<option value=""> All </option>
											<?php foreach($sites as $site){ ?>
											<option value="<?php echo $site['site_id']; ?>" ><?php echo $site['site_name']; ?></option>
											<?php } ?>
											</select><i></i>
										</div>
										<?php }
										?>
										
										<div class="form-group">
											<label class="sr-only" for="s123">Show From</label>
											<input type="text" class="form-control input-sm datepicker" id="s123" placeholder="Show From">
										</div>
										<div class="form-group">
											<input type="text" class="form-control input-sm datepicker" id="s124" placeholder="To">
										</div>

										<div class="btn-group hidden-phone">
											<a class="btn btn-primary" onclick="ledgerSiteWise()" > Search <span class="fa fa-search"> </span> </a>
										</div>
										
										<div class="btn-group hidden-phone pull-right">
											<a class="btn dropdown-toggle btn-xs btn-default" data-toggle="dropdown"><i class="fa fa-cog"></i> More <span class="caret"> </span> </a>
											<ul class="dropdown-menu pull-right">
												<li>
													<a href="javascript:void(0);"><i class="fa fa-file-text-alt"></i> Export to Excel</a>
												</li>
												<li>
													<a href="javascript:void(0);"><i class="fa fa-question-sign"></i> Help</a>
												</li>
											</ul>
										</div>

									</form>

								</div>
								<div class="padding-10">
									<div class="table-responsive">
						
							
							<table class="table table-bordered">
							<thead>
							  <tr>
								<th>S.No.</th>
								<th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Ref No.</th>
								<th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Site</th>
								<th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Type</th>
								<th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Mode</th>
								<th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Date</th>
								<th><i class="fa fa-fw fa-calendar txt-color-blue hidden-md hidden-sm hidden-xs"></i> Credit</th>
								<th><i class="fa fa-fw fa-edit txt-color-blue hidden-md hidden-sm hidden-xs"></i> Debit</th>
							  </tr>
							</thead>
							<tbody id="ledger">
							  <?php $sno=0;
							  $creditTotal = 0;
							  $debitTotal = 0;
							  foreach ($transactions as $ctm):$sno++;?>
							  <tr align="left" title="<?php echo $ctm['partial_remark'];?>">
								<td><?php echo $sno;?>.</td>
								<td><?php echo sprintf("%04d",$ctm['partial_id']);?></td>
								<td><?php echo $this->Common_model->findfield('site_detail', 'site_id', $ctm['partial_site_id'], 'site_name');?></td>
								<td><?php echo $ctm['partial_type'];?></td>
								<td><?php echo $ctm['partial_payment_type'];?></td>
								<td><?php echo $ctm['partial_date'];?></td>
								<td align="right"><?php if($ctm['partial_type']=='Income'){echo $ctm['partial_amt'];$creditTotal += $ctm['partial_amt'];}?></td>
								<td align="right"><?php if($ctm['partial_type']=='Expense' || $ctm['partial_type']=='Vendor' ){echo $ctm['partial_amt'];$debitTotal += $ctm['partial_amt'];}?></td>
							  </tr>
							  <?php endforeach;?>
							  <tr align="left">
								<td colspan="5" ></td>
								<td align="right"><b>Total : </b></td>
								<td align="right"><b><?php echo number_format($creditTotal,2);?></b></td>
								<td align="right"><b><?php echo number_format($debitTotal,2);?></b></td>
							  </tr>
							</tbody>
						  </table>
							
						</div>
								</div>
							</div>
							<!-- end s1 tab pane -->

							<div class="tab-pane fade" id="s2">
								<div class="widget-body-toolbar bg-color-white">

									<form class="form-inline" role="form">

										<div class="form-group">
											<label class="sr-only" for="s123">Show From</label>
											<input type="email" class="form-control input-sm" id="s123" placeholder="Show From">
										</div>
										<div class="form-group">
											<input type="email" class="form-control input-sm" id="s124" placeholder="To">
										</div>

										<div class="btn-group hidden-phone pull-right">
											<a class="btn dropdown-toggle btn-xs btn-default" data-toggle="dropdown"><i class="fa fa-cog"></i> More <span class="caret"> </span> </a>
											<ul class="dropdown-menu pull-right">
												<li>
													<a href="javascript:void(0);"><i class="fa fa-file-text-alt"></i> Export to PDF</a>
												</li>
												<li>
													<a href="javascript:void(0);"><i class="fa fa-question-sign"></i> Help</a>
												</li>
											</ul>
										</div>

									</form>

								</div>
								<div class="padding-10">
									<div id="statsChart" class="chart-large has-legend-unique"></div>
								</div>

							</div>
							<!-- end s2 tab pane -->

							<div class="tab-pane fade" id="s3">

								<div class="widget-body-toolbar bg-color-white smart-form" id="rev-toggles">

									<div class="inline-group">

										<label for="gra-0" class="checkbox">
											<input type="checkbox" name="gra-0" id="gra-0" checked="checked">
											<i></i> Target </label>
										<label for="gra-1" class="checkbox">
											<input type="checkbox" name="gra-1" id="gra-1" checked="checked">
											<i></i> Actual </label>
										<label for="gra-2" class="checkbox">
											<input type="checkbox" name="gra-2" id="gra-2" checked="checked">
											<i></i> Signups </label>
									</div>

									<div class="btn-group hidden-phone pull-right">
										<a class="btn dropdown-toggle btn-xs btn-default" data-toggle="dropdown"><i class="fa fa-cog"></i> More <span class="caret"> </span> </a>
										<ul class="dropdown-menu pull-right">
											<li>
												<a href="javascript:void(0);"><i class="fa fa-file-text-alt"></i> Export to PDF</a>
											</li>
											<li>
												<a href="javascript:void(0);"><i class="fa fa-question-sign"></i> Help</a>
											</li>
										</ul>
									</div>

								</div>

								<div class="padding-10">
									<div id="flotcontainer" class="chart-large has-legend-unique"></div>
								</div>
							</div>
							<!-- end s3 tab pane -->
						</div>

						<!-- end content -->
					</div>

				</div>
				<!-- end widget div -->
			</div>
			<!-- end widget -->

		</article>
	</div>

	<!-- end row -->

</section>
<!-- end widget grid -->

			</div>
			
			<!-- END #MAIN CONTENT -->

		</div>
		<!-- END #MAIN PANEL -->
<script>
	function ledgerSiteWise(){
		var site_id = $('#ledger_site_id').val();
		var fromdate = $('#s123').val();
		var todate = $('#s124').val();
		$("#ledger").html('<center><img src="<?php echo base_url().'../assets/img/loading_spinner.gif'; ?>" /> </center>');
		$.ajax({  
			type: "POST",
			url: "<?php echo base_url('admin/ACCOUNTS/ledgerSiteWise'); ?>",
			data: {'site_id':site_id,'fromdate':fromdate,'todate':todate},
			success: function(msg){
				$('#ledger').html(msg);
			}  
		});	
	}
</script>
		