
			
		
			<h2 class="name">
				<?php echo $site[0]['site_name'];?> 
				<small>Manage by <a href="javascript:void(0);"><?php echo $site[0]['site_manager_name'];?></a></small>
				<i class="fa fa-phone fa-2x text-primary"></i>
				<span class="fa fa-2x"><h5><?php echo $site[0]['site_manager_no'];?></h5></span>
 
			</h2>
			<hr>
			
			<?php 
			
			// print_r($propertytype);die;
			if(count($propertytype)>0){?>
			<section>
			
			<div class="widget-body ">
			<div class="tabbable">
			<ul class="nav nav-tabs bordered" >
			<?php 
			$sno=0;
			foreach($propertytype as $pt): $sno++;?>
				<li class="<?php if($sno==1)echo "active";?>"><a href="#tab_<?php echo $sno;?>" data-toggle="tab" rel="tooltip" data-placement="top"><?php echo $pt['detail_type'];?></a></li>
				<?php endforeach ?>
				
			</ul>
			
			<div class="tab-content padding-10" >
			<?php 
			$sno1=0;
			foreach($propertytype as $pt): $sno1++;
			$data['sitedetail'] = $this->Common_model->get_data_by_query_pdo("select * from site_other_detail where detail_site_id=? and detail_type = ?",array($site[0]['site_id'],$pt['detail_type']));
			?>
				<div class="tab-pane <?php if($sno1==1)echo "in active";?>" id="tab_<?php echo $sno1;?>">
					<div class="certified">
						<ul id="myTab" class="nav nav-pills">
						<?php 
						$prop = explode(',',$data['sitedetail'][0]['detail_site_nos']);
						for($i=0;$i<count($prop);$i++){?>
						<li><a href="#<?php echo $prop[$i];?>" data-toggle="tab"><?php echo $prop[$i];?><span>Available</span></a></li>
						<?php } ?>
						</ul>
					</div>
					<hr>
					<div id="myTabContent" class="tab-content">
					<?php 
						for($i=0;$i<count($prop);$i++){?>
						<div class="tab-pane fade <?php if($i==0)echo "in active";?>" id="<?php echo $prop[$i];?>">
							<br>
							<strong>Description Title</strong>
							<p>Integer egestas, orci id condimentum eleifend, nibh nisi pulvinar eros, vitae ornare massa neque ut orci. Nam aliquet lectus sed odio eleifend, at iaculis dolor egestas. Nunc elementum pellentesque augue sodales porta. Etiam aliquet rutrum turpis, feugiat sodales ipsum consectetur nec. </p>
						</div>
					<?php } ?>
						
					</div>
				</div>
				<?php endforeach ?>
			</div>
			</div><hr class="simple" />
			</div>
			</section>
			<?php }else{?>
			<section>
			
			<div class="widget-body ">
			<div class="alert alert-danger fade in">
				<button class="close" data-dismiss="alert">
					×
				</button>
				<strong><h2>No Site Details Available..!!</h2></strong> 
			</div>
			
			</div>
			<?php } ?>