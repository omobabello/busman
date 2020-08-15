<div id="page-wrapper">
  <div class="main-page">
    <div class="row-one">
      <div class="col-md-6 widget">
        <div class="stats-left ">
          <h5>Today</h5>
          <h4>Bookings</h4>
        </div>
        <div class="stats-right">
          <label><?php echo $booked ?></label>
        </div>
        <div class="clearfix"> </div>
      </div>
      <div class="col-md-6 widget states-mdl">
        <div class="stats-left">
          <h5>Today</h5>
          <h4>Amount</h4>
        </div>
        <div class="stats-right">
          <label>&#8373; <?php echo $amount > 0 ? $amount : 0; ?></label>
        </div>
        <div class="clearfix"> </div>
      </div>
      <div class="clearfix"> </div>
    </div>
    <div class="row">
      <div class="col-md-12 stats-info stats-last widget-shadow">
        <table class="table stats-table ">
          <thead>
            <tr>
              <th>S.NO</th>
              <th>ROUTE</th>
              <th>TIME</th>
              <th>BOOKINGS</th>
            </tr>
          </thead>
          <tbody>
            <?php $count = $this->uri->segment(3) ?>
            <?php foreach ($bookings as $booking) { ?>
              <?php echo form_open('home/passengers') ?>
              <tr>
                <th scope="row"><?php echo ++$count ?></th>
                <td><?php echo "$booking->travel_from to $booking->travel_to"?></td>
                <td><?php echo date('h:i a', strtotime($booking->departure)) ?></td>
                <td><td><a href="<?php echo site_url("home/passengers/{$booking->serial}")?>"><?php echo $booking->count ?></a></td></td>
              </tr>
              <?php echo form_close() ?>
          <?php  } ?>
          </tbody>
              <?php echo $pagination ?>
        </table>
        <div class="clearfix"> </div>

    </div>
</div>
