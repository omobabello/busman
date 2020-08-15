<div id="page-wrapper">
  <div class="main-page">
    <div class="tables">
      <div class="panel-body widget-shadow">
        <h4>Accounts:</h4>
        <?php if (empty($accounts))
                echo "<div class='alert alert-info'>No Transactions made yet</div>";
              else{
                $count = $this->uri->segment(5);
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
              <td><?php echo date('F jS Y \a\t h:i a', strtotime($account->period))?></td>
              <td><strong>&#8373; <?php echo $account->amount ?></strong></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <?php   } ?>
        <?php echo $pagination ?>
      </div>
    </div>
