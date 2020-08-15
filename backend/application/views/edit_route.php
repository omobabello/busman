<div id="page-wrapper">
  <div class="main-page">
    <div class="forms">
      <div class="row">
        <h3 class="title1">Edit Route :</h3>
        <?php echo validation_errors("<p class='alert alert-danger'>", "<p>"); ?>
        <div class="form-three widget-shadow">
          <?php echo form_open('home/update_route', array('class' => 'form-horizontal')) ?>
          <?php echo form_hidden('id', $route->id) ?>
          <div class="form-group">
            <label for="selector1" class="col-sm-2 control-label">Route</label>
            <div class="col-sm-8">
                <?php echo $route->name ?>
            </div>
          </div>
          <div class="form-group">
            <label for="focusedinput" class="col-sm-2 control-label">Departure Terminal</label>
            <div class="col-sm-8">
              <input type='text' class="form-control1" name='dept_term' value="<?php echo $route->dept_term ?>" required/>
            </div>
          </div>
          <div class="form-group">
            <label for="focusedinput" class="col-sm-2 control-label">Arrival Terminal</label>
            <div class="col-sm-8">
              <input type='text' class="form-control1" name='arr_term' value="<?php echo $route->arr_term ?>"  required/>
            </div>
          </div>
          <div class="form-group">
            <label for="selector1" class="col-sm-2 control-label">Bus</label>
            <div class="col-sm-4"><select name="bus" class="form-control1">
              <?php foreach ($buses as $bus){ ?>
                  <option value="<?php echo $bus->bus_id?>" <?php if($bus->bus_id == $route->bus_id) echo  "selected";?>><?php echo $bus->identity ?></option>
            <?php  } ?>
            </select></div>
          </div>
          <div class="form-group">
									<label for="checkbox" class="col-sm-2 control-label">Days Active</label>
									<div class="col-sm-8">
										<div class="checkbox-inline1"><label><input type="checkbox" name="days[]" <?php if (strpos($route->days_active, "Mon") !== FALSE) echo "checked=''" ?> value="Mon"> Mondays</label></div>
										<div class="checkbox-inline1"><label><input type="checkbox" name="days[]" <?php if (strpos($route->days_active, "Tue") !== FALSE) echo "checked=''" ?> value="Tue"> Tuesdays</label></div>
										<div class="checkbox-inline1"><label><input type="checkbox" name="days[]" <?php if (strpos($route->days_active, "Wed") !== FALSE) echo "checked=''" ?> value="Wed"> Wednesdays</label></div>
										<div class="checkbox-inline1"><label><input type="checkbox" name="days[]" <?php if (strpos($route->days_active, "Thu") !== FALSE) echo "checked=''" ?> value="Thu"> Thursdays</label></div>
										<div class="checkbox-inline1"><label><input type="checkbox" name="days[]" <?php if (strpos($route->days_active, "Fri") !== FALSE) echo "checked=''" ?> value="Fri"> Fridays</label></div>
										<div class="checkbox-inline1"><label><input type="checkbox" name="days[]" <?php if (strpos($route->days_active, "Sat") !== FALSE) echo "checked=''" ?> value="Sat"> Saturdays</label></div>
										<div class="checkbox-inline1"><label><input type="checkbox" name="days[]" <?php if (strpos($route->days_active, "Sun") !== FALSE) echo "checked=''" ?> value="Sun"> Sundays</label></div>
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
                <input type='number' class="form-control1" placeholder='<?php echo $route->price?>' name='price' step="0.5"/>
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
