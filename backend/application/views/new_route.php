<div id="page-wrapper">
  <div class="main-page">
    <div class="forms">
      <div class="row">
        <h3 class="title1">New Route :</h3>
        <?php echo validation_errors("<p class='alert alert-danger'>", "<p>"); ?>
        <div class="form-three widget-shadow">
          <?php echo form_open('home/add_route', array('class' => 'form-horizontal')) ?>
          <div class="form-group">
            <label for="selector1" class="col-sm-2 control-label">Travelling From</label>
            <div class="col-sm-8">
                <?php echo form_dropdown(array('name' =>'from', 'class' => 'form_control1'),$cities) ?>
            </div>
          </div>
          <div class="form-group">
            <label for="selector1" class="col-sm-2 control-label">Travelling to</label>
            <div class="col-sm-8">
                <?php echo form_dropdown(array('name' =>'to', 'class' => 'form_control1'),$cities) ?>
            </div>
          </div>
          <div class="form-group">
            <label for="focusedinput" class="col-sm-2 control-label">Departure Terminal</label>
            <div class="col-sm-8">
              <input type='text' class="form-control1" name='dept_term' required/>
            </div>
          </div>
          <div class="form-group">
            <label for="focusedinput" class="col-sm-2 control-label">Arrival Terminal</label>
            <div class="col-sm-8">
              <input type='text' class="form-control1" name='arr_term' required/>
            </div>
          </div>
          <div class="form-group">
            <label for="selector1" class="col-sm-2 control-label">Bus</label>
            <div class="col-sm-4"><select name="bus" class="form-control1" required>
              <?php if (! empty($buses)) foreach ($buses as $bus){ ?>
                  <option value="<?php echo $bus->bus_id?>"><?php echo $bus->identity ?></option>
            <?php  } ?>
            </select></div>
          </div>
          <div class="form-group">
									<label for="checkbox" class="col-sm-2 control-label">Days Active</label>
									<div class="col-sm-8">
										<div class="checkbox-inline1"><label><input type="checkbox" name="days[]" value="Mon"> Mondays</label></div>
										<div class="checkbox-inline1"><label><input type="checkbox" name="days[]" value="Tue"> Tuesdays</label></div>
										<div class="checkbox-inline1"><label><input type="checkbox" name="days[]" value="Wed"> Wednesdays</label></div>
										<div class="checkbox-inline1"><label><input type="checkbox" name="days[]" value="Thu"> Thursdays</label></div>
										<div class="checkbox-inline1"><label><input type="checkbox" name="days[]" value="Fri"> Fridays</label></div>
										<div class="checkbox-inline1"><label><input type="checkbox" name="days[]" value="Sat"> Saturdays</label></div>
										<div class="checkbox-inline1"><label><input type="checkbox" name="days[]" value="Sun"> Sundays</label></div>
									</div>
						</div>
            <div class="form-group">
              <label for="focusedinput" class="col-sm-2 control-label">Hours of Journey</label>
              <div class="col-sm-2">
                <input type='number' class="form-control1" name='hours' step="0.5"/>
              </div>
            </div>
            <div class="form-group">
              <label for="focusedinput" class="col-sm-2 control-label">Price</label>
              <div class="col-sm-2">
                <input type='number' class="form-control1" name='price' step="0.5"/>
              </div>
            </div>
            <div class="form-group">
                <label for="focusedinput" class="col-sm-2 control-label">Take off Time</label>
                <div class="col-sm-9">
                  <input type='time' name='take_time'/>
                </div>
              </div>
              <div class="form-group">
                  <label for="focusedinput" class="col-sm-2 control-label">Return Time</label>
                  <div class="col-sm-9">
                    <input type='time' name='ret_time'/>
                  </div>
                </div>
            <?php echo form_submit(array('class' => 'btn btn-success'), 'SUBMIT') ?>
            | <a href="<?php echo site_url('home/routes') ?>" class='btn btn-danger'>CANCEL</a>
            <?php echo form_close() ?>
        </div>
      </div>
