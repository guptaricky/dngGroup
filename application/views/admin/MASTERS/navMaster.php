
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
		<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-edit"></i> Manage Navigations<span></span></h1>
	</div>
		
</div>
<!-- widget grid -->
<section id="widget-grid" class="">

	
	<div class="row">

		<article class="col-sm-12 col-md-12 col-lg-3">
			
			<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false">
				
				<header>
					<span class="widget-icon"> <i class="fa fa-link"></i> </span>
					<h2>Generate Link </h2>				
					
				</header>

				<!-- widget div-->
				<div>
					
					<!-- widget content -->
					<div class="widget-body no-padding">
						
						<form action="#" id="checkout-form" class="smart-form" novalidate="novalidate">

							<fieldset>
								<div class="row">
									<section class="col col-12">
										<label class="input"> <i class="icon-prepend fa fa-edit"></i>
											<input type="text" name="linkname" placeholder="Link Name">
										</label>
									</section>
									<section class="col col-12">
									<label class="input"> <i class="icon-prepend fa fa-desktop"></i>									
										<input type="text" name="linkicon" placeholder="Select Icon">
									</label>
									</section>
									<section class="col col-12">
									<label class="input"> <i class="icon-prepend fa fa-link"></i> 										
										<input type="text" name="linkurl" placeholder="URL">
									</label>
									</section>
									<section class="col col-12">
										<label class="select">
											<select name="linkuser">
												<option value="1" selected="">Admin</option>
												<option value="2">Super Admin</option>
												<option value="3">User</option>
											</select> <i></i> </label>
									</section>									
								</div>
							</fieldset>
							<footer>
								<button type="button" class="btn btn-primary" onclick="generateLink()" >
									Generate link
								</button>
							</footer>
						</form>

					</div>
					<!-- end widget content -->
					
				</div>
				<!-- end widget div -->
				
			</div>
			<!-- end widget -->


		</article>
		
		<article class="col-sm-12 col-md-12 col-lg-9" ng-app="myApp" ng-controller="myCtrl" data-ng-init="init()" >
			<div class="jarviswidget" id="wid-id-2" data-widget-editbutton="false" data-widget-custombutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>Navigation List</h2>				
					<div class="jarviswidget-ctrls" role="menu">  <a href="javascript:void(0);" id="reloaddata" class="button-icon jarviswidget-edit-btn" rel="tooltip" title="" data-placement="bottom" ng-click="init()" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>   </div>
				</header>

				<!-- widget div-->
				<div>
					
					<!-- widget content -->
					<div class="widget-body no-padding">
						
						<div class="table-responsive">
						<div ng-show="showLoader">
							<img src="<?php echo base_url().'assets/img/splash/loading.gif'?>">
						</div>
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Navigation Name</th>
										<th>Url</th>
										<th>Icon</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr ng-repeat="x in names">
										<td>{{ x.nav_name }}</td>
										<td>{{ x.nav_url }}</td>
										<td>{{ x.nav_icon }}</td>
										<td></td>
									</tr>
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
<script>
	var app = angular.module('myApp', []);
	app.controller('myCtrl', function($scope,$http) {
		
		$scope.init = function () {
		$scope.showLoader = true;
		$http.get("<?php echo base_url('admin/MASTERS/getNavigations'); ?>")
		.then(function (response) {
			console.log(response.data);
			$scope.names = response.data;
			$scope.showLoader = false;
			});
	}
	});
</script>
<script>
		function generateLink(){
			
		var datastr = $('#checkout-form').serialize();	
		$.ajax({  
				type: "POST",
				url: "<?php echo base_url('admin/MASTERS/generateLink'); ?>",
				data: datastr,
				success: function(msg){
					
				}
			}).done(function (msg) {
				$('#reloaddata').trigger('click');
			});	 
		}
</script>


<script>
	
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

	
	/*
	 * PAGE RELATED SCRIPTS
	 */

	// pagefunction
	


	// end destroy
	
	// run pagefunction on load

	
	
</script>
			</div>
			
			<!-- END #MAIN CONTENT -->

		</div>
		<!-- END #MAIN PANEL -->

		