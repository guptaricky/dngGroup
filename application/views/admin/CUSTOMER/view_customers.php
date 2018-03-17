
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
		<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-users"></i> Existing Customers <span></span></h1>
	</div>
		
</div>
<!-- widget grid -->
<section id="widget-grid" class="">

	
	<div class="row">

		
		<article class="col-sm-12 col-md-12 col-lg-12">
			
			<div class="jarviswidget" id="wid-id-2" data-widget-editbutton="false" data-widget-custombutton="false">
				
				<header>
					<span class="widget-icon"> <i class="fa fa-users"></i> </span>
					<h2>Customer List</h2>				
					<div class="widget-toolbar" role="menu">
						<div class="btn-group">
							<a class="btn dropdown-toggle btn-xs btn-danger hide" href="<?php echo base_url().'admin/CUSTOMER/add_customers'?>">
								<i class="fa fa-plus"></i> Add New Customer 
							</a>
						</div>
					</div>
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
								<th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Name</th>
								<th><i class="fa fa-fw fa-map-marker txt-color-blue hidden-md hidden-sm hidden-xs"></i> Address</th>
								<th><i class="fa fa-fw fa-map-marker txt-color-blue hidden-md hidden-sm hidden-xs"></i> Tower No. / Flat</th>
								<th><i class="fa fa-fw fa-edit txt-color-blue hidden-md hidden-sm hidden-xs"></i> Actions</th>
							  </tr>
							</thead>
							<tbody>
							  <?php $sno=0;foreach ($customers as $ctm):$sno++;?>
							  <tr align="left">
								<td><?php echo $sno;?>.</td>
								<td><?php echo ucwords(strtolower($ctm['cust_fname'].' '.$ctm['cust_lname']));?></br><i class="fa fa-phone"></i> <?php echo $ctm['cust_phone'];?></td>
								<td><?php echo $ctm['cust_address'];?></td>
								<td><?php echo $ctm['cust_additional_info'];?></td>
								<td data-title="Action">
								<button class="btn btn-primary btn-xs hide" id="add_tab">Send sms</button>
								<a href="<?php echo base_url().'admin/PROPERTY/sell_property';?>" class="btn btn-warning btn-xs hide">Property Sell</a>
								<a href="<?php echo base_url().'admin/CUSTOMER/add_customers/'.$ctm['cust_id'];?>" class="btn btn-warning btn-xs">View / Edit</a>
								</td>
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

		