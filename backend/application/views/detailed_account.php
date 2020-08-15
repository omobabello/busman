<div id="page-wrapper">
  <div class="main-page">
    <div class="tables">
      <div class="panel-body widget-shadow">
        <h4>Accounts:</h4>
        <?php if (empty($accounts))
                echo "<div class='alert alert-info'>No Transactions made yet</div>";
              else{
                $count = 0;
        ?>
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Date</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($accounts as $account){ ?>
            <tr>
              <th scope="row"><?php echo ++$count ?></th>
              <td><?php echo $amount->date?></td>
              <td<?php echo $amount->amount ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <?php   } ?>
      </div>
    </div>
