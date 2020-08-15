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
				<a><i class="fa fa-3x fa-check-circle-o "></i></a>
			</div>
			<div class="rup-rgt">
				<h3>Enter</h3>
				<h4>User information</h4>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="col-md-3 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
			<div class="rup-left">
                            <a><i class="fa fa-3x fa-circle-o "></i></a>
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
                            <h2>Your Information</h2>
				<p class="dow"></p>
				<p>Travelling from <span><?php echo $variables['from'] ?></span> to  <span><?php echo $variables['to'] ?></span> On <?php echo date("F j, Y", strtotime($variables['date'])); ?></p>
					<ul>
						<li>
							<h6>Departure</h6>
							<h4><?php echo date("F jS", strtotime($variables['date'])) ?></h4>
							<h6><?php echo date("h:i A", strtotime($variables['deptime'])) ?></h6>
						</li>
						<li>
							<h6>Arrival</h6>
                                                        <?php
                                                        $date = $variables['date'];
                                                        $dept = $variables['deptime'];
                                                        $time = $variables['time'];
                                                        ?>
                                                        <h4><?php echo date("F jS", strtotime("+ $time ", strtotime("$date $dept"))) ?></h4>
							<h6><?php echo date("h:i A", strtotime("+ $time ", strtotime("$date $dept"))) ?></h6>
						</li>
						<li>
							<h6>Price</h6>
							<h4><?php echo "&#8373;". $variables['price'] ?></h4>
						</li>
						<li>
							<h6>Charges</h6>
							<?php $charges = round($variables['price']  * 0.025, 2, PHP_ROUND_HALF_UP) ?>
							<h4><?php echo "&#8373;". $charges ?></h4>
						</li>
					</ul>
						<div class="clearfix"></div>
				<div class="grand">
					<p>Grand Total</p>
					<h3>GHC <?php echo "&#8373;". ($variables['price'] + $charges); $variables['fullprice'] = $variables['price'] + $charges?></h3>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="selectroom_top">
			<h2>Travels</h2>
                        <?php echo validation_errors("<p class='error'>", '</p>'); ?>
			<div class="selectroom-info animated wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp;">
                            <?php echo form_open('home/make_payment') ?>
                            <ul>
					<li class="mr">
						<label class="inputLabel">Title</label>
						<select id="country" onchange="change_country(this.value)" class="frm-field required sect">
							<option value="null">MR</option>
							<option value="null">MS</option>
						</select>
					</li>
					<li class="col-md-5">
						<label class="inputLabel">Full Name</label>
                                                <input class="name" type="text" value="<?php echo set_value('name') ?>" name="name">
					</li>
					<li class="nam">
						<label class="inputLabel">Email</label>
                                                <input class="Email" type="text" value="<?php echo set_value('email') ?>" name="email">
					</li>
					<li class="nam">
						<label class="inputLabel">Mobile Number</label>
						<input class="number" type="text" value="<?php echo set_value('phone') ?>" name="phone">
					</li>
					<li class="spe">
                                            <?php
                                            echo form_hidden('variables', $variables);
                                            echo form_submit(array('class' => 'seabtn'), 'Proceed to Payment')?>
                                        </li>
					<div class="clearfix"></div>
				</ul>
                            <?php echo form_close() ?>
			</div>

		</div>
	</div>
</div>
<!--- /selectroom ---->
