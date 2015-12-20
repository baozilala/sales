<?php
include "header.php";
include "navigation.php";
include "connect.php";

$sql ="SELECT Name, Price, SUM(Price), BuyingPrice, SUM(BuyingPrice), SUM(CashBackMoney) FROM orders GROUP BY Name";
$status = mysql_query($sql,$con) or die("价格计算出错:" . mysql_error());
?>
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>姓名：</th>
            <th>收取费用：</th>
            <th>购买价格：</th>
            <th>返现金额：</th>
            <th>利润（包含返现）：</th>
          </tr>
        </thead>
      <?php
        while ($row = mysql_fetch_assoc($status) ){
          ?>
          <tbody>
            <tr>
              <td> <?php echo $row['Name']; ?></td>
              <td> <?php echo round($row['SUM(Price)'],2); ?></td>
              <td> <?php echo round($row['SUM(BuyingPrice)'],2); ?></td>
              <td> <?php echo round($row['SUM(CashBackMoney)'],2); ?></td>
              <td> <?php
              $lirun=$row['SUM(Price)']-$row['SUM(BuyingPrice)']+$row['SUM(CashBackMoney)'];
              echo round($lirun,2);
              ?></td>
            </tr>
          <tbody>
      <?php
        }
       ?>
      </table>
    </div>
    <div class="col-md-12">
      <canvas id="sales" width="700" height="400"></canvas>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
