
<!--- travel ---->
<div class="travel">
	<div class="container">
		<div class="tra-top">
					<ul class="rout">
						<li class="rou">Name</li>
						<li class="ser">Email</li>
						<li class="fir">Phone Number</li>
						<li class="las">Address</li>
						<li class="dat">Action</li>
						<div class="clearfix"></div>
					</ul>
					<!--- rou-secnd ---->
					<?php foreach ($agents as $agent){ ?>
						<ul class="rou-secnd animated wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp;">
							<li class="rou">
								<h3><?php echo $agent->name?></h3>
							</li>
							<li class="ser">
								<p><?php echo $agent->email ?></p>
							</li>
							<li class="fir">
								<p><?php echo $agent->phone ?></p>
							</li>
							<li class="las">
								<p><?php echo $agent->address ?></p>
							</li>
							<li class="dat">
								<a href="<?php echo site_url('home/contact/').$agent->org_id?>" class="det">Contact</a>
							</li>
							<div class="clearfix"></div>
						</ul>
				<?php	} ?>
					<!--- /rou-secnd ---->
			</div>
	</div>
</div>
<!--- /travel ---->
