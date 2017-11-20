
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
		<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-home"></i> Sites <span>> Choose your sites</span></h1>
	</div>
		
</div>
<!-- widget grid -->
<section id="widget-grid" class="">

	
	<div class="row">

		<!-- a blank row to get started -->
		<div class="col-sm-6 col-lg-4">

			<!-- your contents here -->
			<div class="panel panel-default">
				<div class="panel-body status">
					<div class="who clearfix">
						<h1 class="text-primary" style="">Site 1</h1>
						<span class="from"><b>Location:</b> Vijay Nagar</span>
					</div>
					<div class="image"><img src="<?php echo base_url().'assets/img/sites/site1.jpg'; ?>" alt="img">
					</div>
				</div>
			</div>


		</div>
		<!-- a blank row to get started -->
		<div class="col-sm-6 col-lg-4">

			<!-- your contents here -->
			<div class="panel panel-default">
				<div class="panel-body status">
					<div class="who clearfix">
						<h1 class="text-primary" style="">Site 2</h1>
						<span class="from"><b>Location:</b> Vijay Nagar</span>
					</div>
					<div class="image img-responsive"><img src="<?php echo base_url().'assets/img/sites/site2.jpg'; ?>" alt="img">
					</div>
				</div>
			</div>


		</div>
		<!-- a blank row to get started -->
		<div class="col-sm-6 col-lg-4">

			<!-- your contents here -->
			<div class="panel panel-default">
				<div class="panel-body status">
					<div class="who clearfix">
						<h1 class="text-primary" style="">Site 3</h1>
						<span class="from"><b>Location:</b> Vijay Nagar</span>
					</div>
					<div class="image"><img src="<?php echo base_url().'assets/img/sites/site3.jpg'; ?>" alt="img">
					</div>
				</div>
			</div>


		</div>

	<!-- end row -->

</section>
<!-- end widget grid -->

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

		