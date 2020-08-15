<div id="page-wrapper">
  <div class="main-page">
    <div class="tables">
      <div class="panel-body widget-shadow">
        <?php echo isset($message)  ? $message : NULL ?>
          <?php if (! empty($bookings)) {  ?>
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Travel Date</th>
                  <th>Bookings</th>
                </tr>
              </thead>
              <tbody>
                <?php $count = $this->uri->segment(3) ?>
                <?php foreach ($bookings as $booking){ ?>
                <tr>
                  <th scope="row"><?php echo ++$count ?></th>
                  <td><?php echo $booking->travel_from.' to '.$booking->travel_to ?></td>
                  <td><?php echo date('jS, F Y',strtotime($booking->travel_date))  ?></td>
                  <td><a href="<?php echo site_url("home/passengers/{$booking->serial}")?>"><?php echo $booking->count ?></a></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
      <?php   }else{ ?>
                <p class="alert alert-info">No bookings yet</p>
      <?php } ?>

      </div>
            <?php echo $pagination ?>
    </div>
