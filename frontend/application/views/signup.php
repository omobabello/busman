<!--- agent ---->
<div class="agent">
	<div class="container">
		<div class="col-md-12 agent-left wow fadeInDown animated" data-wow-delay=".5s">
			<div class="ag-bt">
				<h3 class="regist" href="#">Register Now</h3>
			</div>
			<?php echo form_open('home/register') ?>
                                 <input type="text" placeholder="Organization" name='name' value="<?php echo set_value('name')?>">
                                 <?php echo form_error('name') ?>
				<input type="text" placeholder="Email" name='email' value="<?php echo set_value('email')?>">
                                <?php echo form_error('email') ?>
				<input type="text" placeholder="Phone" name='phone' value="<?php echo set_value('phone')?>">
                                <?php echo form_error('phone') ?>
                                <input type='password' placeholder ='Password' name='password' value="<?php echo set_value('password')?>" />
                                <?php echo form_error('password') ?>
                                <input type='password' placeholder="Confirm Password" name="repass" />
                                <?php echo form_error('repass') ?>
                                <?php echo form_dropdown(array('name' => 'region', 'class' => 'grayTextNormal'), $regions) ?>
                                <?php echo form_error('region') ?>
				<input type="text" placeholder="City" name='city' value="<?php echo set_value('city')?>">
                                <?php echo form_error('city') ?>
				<textarea placeholder="Address" name='address' value="<?php echo set_value('address')?>"></textarea>
				<?php echo form_error('address') ?>
                                <div class="sub">
                                    <?php echo form_submit('','Register & Start Now') ?>
				</div>
			<?php echo form_close(); ?>
		</div>
			<div class="clearfix"></div>
	</div>
</div>
<!--- /agent ---->