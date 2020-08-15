<div id="page-wrapper">
  <div class="main-page">
    <div class="forms">
      <div class="row">
        <h3 class="title1">New Bus :</h3>
        <div class="form-three widget-shadow">
          <?php echo form_open('home/add_bus', array('class' => 'form-horizontal')) ?>
          <div class="form-group">
            <label for="focusedinput" class="col-sm-2 control-label">Identity </label>
            <div class="col-sm-8">
              <input type="text" class="form-control1" name="identity" placeholder="Bus Identity" required="">
            </div>
          </div>
          <div class="form-group">
            <label for="focusedinput" class="col-sm-2 control-label">Plate Number </label>
            <div class="col-sm-8">
              <input type="text" class="form-control1" name="num_plate" placeholder="Plate Number (GH 9999 - AA)" required="">
            </div>
          </div>
            <div class="form-group">
              <label for="focusedinput" class="col-sm-2 control-label">Number of Seats</label>
              <div class="col-sm-9">
                <input type='number' class="form-control1" name='no_seats' min="10" required=""/>
              </div>
            </div>
            <?php echo form_submit(array('class' => 'btn btn-success'), 'SUBMIT') ?>
            | <a href="<?php echo site_url('home/buses') ?>" class='btn btn-danger'>CANCEL</a>
            <?php echo form_close() ?>
        </div>
      </div>
