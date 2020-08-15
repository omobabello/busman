<!---rupes -->
<div class="rupes container">
		<div class="col-md-3 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
			<div class="rup-left">
                <a><i class="fa fa-3x fa-check-circle "></i></a>
			</div>
			<div class="rup-rgt">
				<h3>Search</h3>
				<h4>and Select avaliable buses</h4>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="col-md-3 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
			<div class="rup-left">
				<a><i class="fa fa-3x fa-check-circle "></i></a>
			</div>
			<div class="rup-rgt">
				<h3>Enter</h3>
				<h4>User information</h4>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="col-md-3 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
			<div class="rup-left">
                            <a><i class="fa fa-3x fa-check-circle "></i></a>
			</div>
			<div class="rup-rgt">
				<h3>Make payment</h3>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="col-md-3 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
			<div class="rup-left">
                            <a><i class="fa fa-3x fa-circle-o "></i></a>
			</div>
			<div class="rup-rgt">
				<h3>Print Ticket</h3>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
<!---/rupes ---->
<!--- selectroom ---->
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
					<div class="clearfix"></div>
				<div class="grand">
					<?php echo form_open('home/print_ticket');
                echo form_hidden('variables', $variables);
              	echo form_submit(array('class' => 'seabtn'), 'Print Ticket');
                echo form_close()?>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!--- /selectroom ---->
