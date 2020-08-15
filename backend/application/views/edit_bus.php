<div id="page-wrapper">
  <div class="main-page">
    <div class="forms">
      <div class="row">
        <h3 class="title1">Edit Bus :</h3>
        <div class="form-three widget-shadow">
          <?php echo form_open('home/update_bus', array('class' => 'form-horizontal')) ?>
          <div class="form-group">
            <label for="focusedinput" class="col-sm-2 control-label">Identity </label>
            <div class="col-sm-8">
              <input type="text" value="<?php echo $bus->identity ?>" class="form-control1" name="identity" placeholder="<?php echo $bus->identity ?>" required="">
            </div>
          </div>
          <div class="form-group">
            <label for="focusedinput" class="col-sm-2 control-label">Plate Number </label>
            <div class="col-sm-8">
              <input type="text" value="<?php echo $bus->num_plate?>" class="form-control1" name="num_plate" placeholder="Plate Number (GH 9999 -99)" required="">
            </div>
          </div>
            <div class="form-group">
              <label for="focusedinput" class="col-sm-2 control-label">Number of Seats</label>
              <div class="col-sm-8">
                <input type='number' value="<?php echo $bus->num_seat ?>" class="form-control1" name='no_seats' placeholder='<?php echo $bus->num_seat ?>' min="10" required=""/>
              </div>
            </div>
            <?php
            echo form_hidden('serial', $bus->bus_id);
            echo form_submit(array('class' => 'btn btn-success'), 'SUBMIT') ?>
            | <a href="<?php echo site_url('home/buses') ?>" class='btn btn-danger'>CANCEL</a>
            <?php echo form_close() ?>
        </div>
      </div>
