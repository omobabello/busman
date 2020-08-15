<div id="page-wrapper">
  <div class="main-page">
    <div class="tables">
      <div class="panel-body widget-shadow">
        <?php echo isset($message)  ? $message : NULL ?>
        <h4><?php echo "PASSENGERS BOOKED FOR {$passengers[0]->travel_from} TO {$passengers[0]->travel_to} ON ".date('jS, F Y', strtotime($passengers[0]->travel_date)) ?></h4>
        <table class="table">
          <h4><a class="btn btn-info" href="<?php echo site_url("home/message/group/2/{$passengers[0]->group_code}") ?>">Message Group</a></h4>
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>Booked on</th>
              <th>Has Paid</th>
              <th>Action</th>
            </tr>
          </thead>
          <?php $count = NULL ?>
          <tbody>
            <?php foreach ($passengers as $passenger){ ?>
            <tr>
              <th scope="row"><?php echo ++$count ?></th>
              <td><?php echo $passenger->name?></td>
              <td><?php echo $passenger->email ?></td>
              <td><?php echo $passenger->phone ?></td>
              <td><?php echo date('jS, F Y', strtotime($passenger->book_date)) ?></td>
              <td><?php echo $passenger->has_paid ? "<span class='label label-success'>Yes</span>" : "<span class='label label-danger'>No</span>"?></td>
              <td><a href="<?php echo site_url("home/message/individual/{$passenger->serial}") ?>" class="btn btn-info">Message</a></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
