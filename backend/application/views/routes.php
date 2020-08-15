<div id="page-wrapper">
  <div class="main-page">
    <div class="tables">
      <div class="panel-body widget-shadow">
        <?php echo isset($message)  ? $message : NULL ?>
        <h3><a href="<?php echo site_url('home/new_route')?>" class="label label-success">Add new route</a></h3><br/><br/>
        <h4>Routes:</h4>
        <?php if (empty($routes))
                echo "<div class='alert alert-info'>You have not added any route to your list</div>";
              else{
                $count = 0;
        ?>
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Route</th>
              <th>Take off Time</th>
              <th>Active days</th>
              <th>Price</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($routes as $route){ ?>
            <tr>
              <th scope="row"><?php echo ++$count ?></th>
              <td><?php echo $route->name ?></td>
              <td><?php echo $route->take_time ?></td>
              <td><?php echo $route->days_active ?></td>
              <td><?php echo $route->price ?></td>
              <td><a href="<?php echo site_url('home/edit_route/'.$route->id) ?>" class="label label-success">Edit</a> |
                  <a href="<?php echo site_url('home/delete_route/'.$route->id) ?>" class="label label-danger">Delete</a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <?php   } ?>
      </div>
    </div>
