<!--- selectroom ---->
<center><h2>YOUR TICKET</h2></center>
<div class="selectroom">
	<div class="container">
		<div class="selectroom_top">
			<div class="col-md-12 selectroom_right wow fadeInRight animated" data-wow-delay=".5s">
					<ul>
						<li>
							<h6>Travelling With</h6>
              <h4><?php echo $variables->org_name ?></h4>
						</li>
            <li>
							<h6>Booked on On</h6>
							<h4><?php echo date('F js, Y', strtotime($variables->book_date))  ?></h4>
							<h6>Book Reference: <?php echo $variables->book_code ?></h6>
						</li>
						<li>
							<h6>Travelling From</h6>
							<h4><?php echo $variables->travel_from  ?></h4>
						</li>
						<li>
							<h6>Travelling To</h6>
							<h4><?php echo $variables->travel_to  ?></h4>
						</li>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<div class="selectroom">
	<div class="container">
		<div class="selectroom_top">
			<div class="col-md-12 selectroom_right wow fadeInRight animated" data-wow-delay=".5s">
					<ul>
						<li>
							<h6>Bus</h6>
              <h4><?php echo $variables->num_plate ?></h4>
						</li>
            <li>
							<h6>Departure</h6>
							<h4><?php echo date('h:i a', strtotime($variables->travel_date))  ?></h4>
							<h6>Terminal: <?php echo $variables->dept_term ?></h6>
						</li>
						<li>
							<h6>Arrival</h6>
							<h4><?php echo date('h:i a', strtotime("+ {$variables->hours} hours", $variables->travel_date))  ?></h4>
							<h6>Terminal: <?php echo $variables->arr_term ?></h6>
						</li>
					</ul>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
