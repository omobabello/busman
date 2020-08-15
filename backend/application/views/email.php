<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<div class="row">
						<div class="form-grids row widget-shadow" data-example-id="basic-forms">
						<div class="form-title">
							<h4>Send Message :</h4>
						</div>
						<div class="form-three widget-shadow">
							<form class="form-horizontal" method="post" action="<?php echo site_url('home/mail') ?>">
                  <?php echo form_hidden('list', $list) ?>
								<div class="form-group">
									<label for="disabledinput" class="col-sm-2 control-label">To</label>
									<div class="col-sm-8">
										<input disabled="" type="text" class="form-control1" id="disabledinput" value="<?php echo implode(',', array_column($list,'email')) ?>" placeholder="Disabled Input">
									</div>
								</div>
								<div class="form-group">
									<label for="inputPassword" class="col-sm-2 control-label">Subject</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="" id="inputPassword" placeholder="Subject">
									</div>
								</div>

								<div class="form-group">
									<label for="txtarea1" class="col-sm-2 control-label">Textarea</label>
									<div class="col-sm-8"><textarea name="message"  cols="50" rows="7" height='150' class="form-control1"></textarea></div>
								</div>

                <div class="form-group">
									<div class="col-sm-8"><input type="submit" class="btn btn-info" value='SEND'/></div>
								</div>

							</form>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
