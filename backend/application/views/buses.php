<div id="page-wrapper">
  <div class="main-page">
    <div class="tables">
      <div class="panel-body widget-shadow">
        <?php echo isset($message)  ? $message : NULL ?>
        <h3><a href="<?php echo site_url('home/new_bus')?>" class="label label-success">Add new bus</a></h3><br/><br/>
        <h4>Buses:</h4>
        <?php if (empty($buses))
                echo "<div class='alert alert-info'>You have not added any bus to your list</div>";
              else{
                $count = 0;
        ?>
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Route</th>
              <th>Identity</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($buses as $bus){ ?>
            <tr>
              <th scope="row"><?php echo ++$count ?></th>
              <td><?php echo (! empty($bus->name)) ? $bus->name : "<span class='text text-danger'>Not delegated</span>" ?></td>
              <td><?php echo $bus->identity ?>
              <td><a href="<?php echo site_url('home/edit_bus/'.$bus->bus_id) ?>" class="label label-success">Edit</a> |
                  <a href="<?php echo site_url('home/delete_bus/'.$bus->bus_id) ?>" class="label label-danger">Delete</a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <?php   } ?>
      </div>
    </div>
