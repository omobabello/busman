
<div class="container">
	<div class="col-md-12 bann-info wow fadeInRight animated" data-wow-delay=".5s">
		<h2>Online Tickets with Zero Booking Fees</h2>
                <?php echo form_open('home/search') ?>
		<div class="ban-top">
			<div class="bnr-left">
				<label class="inputLabel">From</label>
                                <?php echo form_dropdown('cityfrom', $cities) ?>
                        </div>
			<div class="bnr-left">
				<label class="inputLabel">To</label>
                                <?php echo form_dropdown('cityto', $cities) ?>
                        </div>
                        <div class="bnr-left">
				<label class="inputLabel">Date of Travel</label>
                                <input class="date" id="datepicker" type="text" name='date' placeholder="dd-mm-yyyy">
			</div>
				<div class="clearfix"></div>
				<!---start-date-piker---->
				<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.css') ?>" />
				<script src="<?php echo base_url('assets/js/jquery-ui.js') ?>"></script>
					<script>
						$(function() {
						$( "#datepicker,#datepicker1" ).datepicker({minDate:0, maxDate:'+1m'});
						});
					</script>
			<!---/End-date-piker---->
				<div class="clearfix"></div>

		</div>
                <div class="ban-bottom">
                    <?php echo validation_errors() ?>
                </div>
		<div class="sear">
				<button class="seabtn">Search Buses</button>
                        <?php echo form_close() ?>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<!--- /banner ---->
<!--- rupes ---->
<div class="container">
	<div class="rupes">
		<div class="col-md-3 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
			<div class="rup-left">
                            <a><i class="fa fa-3x fa-search "></i></a>
			</div>
			<div class="rup-rgt">
				<h3>Search</h3>
				<h4>and Select avaliable buses</h4>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="col-md-3 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
			<div class="rup-left">
				<a><i class="fa fa-3x fa-pencil "></i></a>
			</div>
			<div class="rup-rgt">
				<h3>Enter</h3>
				<h4>User information</h4>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="col-md-3 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
			<div class="rup-left">
                            <a><i class="fa fa-3x fa-credit-card "></i></a>
			</div>
			<div class="rup-rgt">
				<h3>Make payment</h3>
				<h4>Using Credit Card or Mobile Money</h4>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="col-md-3 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
			<div class="rup-left">
                            <a><i class="fa fa-3x fa-print "></i></a>
			</div>
			<div class="rup-rgt">
				<h3>Print Ticket</h3>
				<h4>or save as PDF file on your mobile</h4>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!--- /rupes ---->
