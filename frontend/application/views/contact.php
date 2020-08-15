<!--- agent ---->
<div class="agent">
	<div class="container">
		<div class="col-md-12 agent-left wow fadeInDown animated" data-wow-delay=".5s">

			<?php echo form_open('home/send_mail') ?>
			<?php echo validation_errors()  ?>
				<p>Agent mail : <?php echo $agent->email ?> </p>
				<input type="text" placeholder="Your name" name='name' value="<?php echo set_value('name')?>">
				<input type="text" placeholder="Your email" name='email' value="<?php echo set_value('email')?>">
				<textarea placeholder="Address" name='message'><?php echo set_value('message')?></textarea>
				<?php
						echo form_hidden('agent_email', $agent->email);
						echo form_hidden('org_id', $agent->org_id);
				?>
                                <div class="sub">
                                    <?php echo form_submit('','Submit') ?>
				</div>
			<?php echo form_close(); ?>
		</div>
			<div class="clearfix"></div>
	</div>
</div>
<!--- /agent ---->
