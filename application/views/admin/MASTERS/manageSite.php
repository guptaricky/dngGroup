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
				
<!-- widget grid -->
<section id="widget-grid" class="">

	<!-- row -->

	<div class="row">

		<div class="col-sm-12 col-md-12 col-lg-12">
			<!-- product -->
			<div class="product-content product-wrap clearfix product-deatil">
			<form class="smart-form" style="padding-left:0px !important">
			<?php 
				$group = $this->session->userdata('group');
			
				if($group == 'admin'){
				?>
				<div class="row">
				<section class="col col-4" style="padding-left:0px !important">
					<label class="select">
					<select name="site" id="site" onchange="getSite()">
						<?php foreach($sites as $st):?>
						<option value="<?php echo $st['site_id'];?>"><?php echo $st['site_name'];?></option>
						<?php endforeach; ?>
					</select> <i></i> </label>
				</section>
				</div>
			</form>	
				<?php } ?>
			
				<div class="row" id="property">
				
				</div>
			</div>
			<!-- end product -->
		</div>	

	</div>

	<!-- end row -->

</section>
<!-- end widget grid -->
<!-- end widget grid -->
	
			</div>
			
			<!-- END #MAIN CONTENT -->

		</div>
		<!-- END #MAIN PANEL -->
<script>
	function getSite(){
	var site_id = $('#site').val();
		$.ajax({
		url:"<?php echo base_url('admin/MASTERS/getSitedata'); ?>",
		type:"post",
		data:'site_id='+site_id,
		success: function(msg){
			$('#property').html(msg);
		}
	});

	}
	getSite();
</script>
		