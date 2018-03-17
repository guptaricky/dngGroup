
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
		<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-list"></i> All Transactions <span></span></h1>
	</div>
		
</div>
<!-- widget grid -->
<section id="widget-grid" class="">

	
	<div class="row">

		
		<article class="col-sm-12 col-md-12 col-lg-12">
			
			<div class="jarviswidget" id="wid-id-2" data-widget-editbutton="false" data-widget-custombutton="false">
				
				<header>
					<span class="widget-icon"> <i class="fa fa-list"></i> </span>
					<h2>Transactions</h2>				
					
				</header>
				
				
				<!-- widget div-->
				<div>
					
					<!-- widget content -->
					<div class="widget-body no-padding">
						<div class="table-responsive">
						
							
							<table class="table table-bordered">
							<thead>
							  <tr>
								<th>S.No.</th>
								<th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Ref No.</th>
								<th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> From</th>
								<th><i class="fa fa-fw fa-calendar txt-color-blue hidden-md hidden-sm hidden-xs"></i> Date</th>
								<th><i class="fa fa-fw fa-edit txt-color-blue hidden-md hidden-sm hidden-xs"></i> Purpose</th>
								<th><i class="fa fa-fw fa-money txt-color-blue hidden-md hidden-sm hidden-xs"></i> Payment Mode</th>
								<th><i class="fa fa-fw fa-map-marker txt-color-blue hidden-md hidden-sm hidden-xs"></i> Cheque / DD</th>
								<th><i class="fa fa-fw fa-money txt-color-blue hidden-md hidden-sm hidden-xs"></i> Amount</th>
							  </tr>
							</thead>
							<tbody>
							  <?php $sno=0;foreach ($transactions as $ctm):$sno++;?>
							  <tr align="left">
								<td><?php echo $sno;?>.</td>
								<td><?php echo sprintf("%04d",$ctm['transfer_id']);?></td>
								<td><?php echo ucwords(strtolower($this->Common_model->findfield('accounts','acc_id',$ctm['transfer_from'],'acc_name')));?></td>
								<td><?php echo $ctm['transfer_date'];?></td>
								<td><?php echo $ctm['transfer_perpose'];?></td>
								<td><?php echo $ctm['transfer_payment_type'];?></td>
								<td><?php if( $ctm['transfer_cheque_dd_no']==''){echo 'N/A';}else{echo $ctm['transfer_cheque_dd_no'];}?></td>
								<td><?php echo $ctm['transfer_amt'];?></td>
								
							  </tr>
							  <?php endforeach;?>
							</tbody>
						  </table>
							
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

			</div>
			
			<!-- END #MAIN CONTENT -->

		</div>
		<!-- END #MAIN PANEL -->

		