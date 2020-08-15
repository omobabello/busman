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
              <th>Period</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($accounts as $account){ ?>
            <tr>
              <th scope="row"><?php echo ++$count ?></th>
              <td><a href='<?php echo site_url("home/account_details/{$case}/{$account->time}")?>'><?php echo ($case == 'month') ?  date('F Y',strtotime($account->period)) : date('Y', strtotime($account->period)) ?></a></td>
              <td><strong>&#8373; <?php echo $account->amount ?></strong></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <?php   } ?>
      </div>
    </div>
