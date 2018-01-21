
			
			
		
			<h2 class="name">
				<?php echo $site[0]['site_name'];?> 
				<small>Manage by <a href="javascript:void(0);"><?php echo $site[0]['site_manager_name'];?></a></small>
				<i class="fa fa-phone fa-2x text-primary"></i>
				<span class="fa fa-2x"><h5><?php echo $site[0]['site_manager_no'];?></h5></span>
 
			</h2>
			<hr>
			
			<div class="certified">
				<ul id="myTab" class="nav nav-pills">
					<li><a href="#more-information" data-toggle="tab">Flat 1<span>Available</span></a></li>
					<li><a href="#specifications" data-toggle="tab">Flat 2<span class="txt-color-blueDark">Booked</span></a></li>
					<li><a href="#reviews" data-toggle="tab">Flat 3<span class="txt-color-red">Sold Out</span></a></li>
				</ul>
				
			</div>
			<hr>
			<div id="myTabContent" class="tab-content">
					<div class="tab-pane fade active in" id="more-information">
						<br>
						<strong>Description Title</strong>
						<p>Integer egestas, orci id condimentum eleifend, nibh nisi pulvinar eros, vitae ornare massa neque ut orci. Nam aliquet lectus sed odio eleifend, at iaculis dolor egestas. Nunc elementum pellentesque augue sodales porta. Etiam aliquet rutrum turpis, feugiat sodales ipsum consectetur nec. </p>
					</div>
					<div class="tab-pane fade" id="specifications">
						<br>
						<dl class="">
								<dt>Gravina</dt>
	                            <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
	                            <dd>Donec id elit non mi porta gravida at eget metus.</dd>
	                            <dd>Eget lacinia odio sem nec elit.</dd>
	                            
	                        </dl>
					</div>
					<div class="tab-pane fade" id="reviews">
						<br>
						<form method="post" class="well padding-bottom-10" onsubmit="return false;">
							<textarea rows="2" class="form-control" placeholder="Write a review"></textarea>
							<div class="margin-top-10">
								<button type="submit" class="btn btn-sm btn-primary pull-right">
									Submit Review
								</button>
								<a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="" data-original-title="Add Location"><i class="fa fa-location-arrow"></i></a>
								<a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="" data-original-title="Add Voice"><i class="fa fa-microphone"></i></a>
								<a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="" data-original-title="Add Photo"><i class="fa fa-camera"></i></a>
								<a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="" data-original-title="Add File"><i class="fa fa-file"></i></a>
							</div>
						</form>

						
					</div>
				</div>
		

			