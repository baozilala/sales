<?php
include "header.php";
include "navigation.php";
include "connect.php";
?>
<div class="container">
  <div class="row">
    <header class="title page-header text-center">
      <h1>订单详情</h1>
    </header>
    <div class="col-md-4 col-md-offset-4 well ">
      <?php $Order_List = mysql_query("SELECT * FROM orders WHERE id = $_GET[id]");
        while($row = mysql_fetch_assoc($Order_List) ){
      ?>
        <div>
          <i class="fa fa-user"></i> <label>姓名：</label>
          <?php echo $row['Name'] ?>
        </div>

        <div class="">
          <i class="fa fa-shopping-cart"></i> <label>订单号：</label>
          <?php echo $row['OrderNumber'] ?><br>
          <i class="fa fa-shopping-cart"></i> <label>订单网站：</label>
          <?php echo "<a target='_blank' href='". $row['OrderSiteUrl']."'>".$row['OrderSite']." </a>"?>
        </div>

        <div class="">
          <i class="fa fa-font"></i> <label>物品名称：</label>
          <?php echo $row['ProductName'] ?>
        </div>

        <div class="">
          <i class="fa fa-check-square-o"></i> <label>数量：</label>
          <?php echo $row['Unit'] ?>
        </div>

        <div class="">
          <i class="fa fa-cc-visa"></i> <label>所用银行：</label>
          <?php echo $row['Bank']?>
        </div>

        <div class="">
          <i class="fa fa-spinner"></i> <label>银行状态：</label>
          <?php echo $row['BankStatus'] ?>
        </div>

        <div class="">
          <i class="fa fa-dollar"></i> <label>返现利率：</label>
          <?php echo $row['CashBack'];
          ?>
        </div>

        <div class="">
          <i class="fa fa-dollar"></i> <label>返现金额：</label>
          <?php echo $row['CashBackMoney'];
          ?>
        </div>

        <div class="">
          <i class="fa fa-dollar"></i> <label>价格：</label>
          <?php echo $row['Price'] ?>
        </div>

        <div class="">
          <i class="fa fa-dollar"></i> <label>实际价格：</label>
          <?php echo $row['BuyingPrice'] ?>
        </div>

        <div class="">
          <i class="fa fa-truck"></i> <label>商家发货：</label>
          <?php echo $row['ShipStatus'] ?>
        </div>

        <div class="">
          <i class="fa fa-truck"></i> <label>邮回中国：</label>
          <?php echo $row['ShipChina'] ?>
        </div>

        <div class="">
          <i class="fa fa-balance-scale"></i> <label>邮寄重量：</label>
          <?php echo $row['ShipWeight'] . "lb~"?>
        </div>

        <div class="">
          <i class="fa fa-dollar"></i> <label>邮寄价格：</label>
          <?php echo "$" . $row['ShipPrice'] ?>
        </div>

        <div class="">
            <i class="fa fa-truck"></i> <label>是否退货：</label>
          <?php
        if ($row['PackageReturn'] == 0 or $row['PackageReturn'] == 'null' ) {
          echo "不需退货";
        }elseif ($row['PackageReturn'] == 1) {
          echo "需要退货";
        }elseif ($row['PackageReturn'] == 2) {
          echo "<a href='http://www.google.com/?q=".$row['ReturnTracking']."' target='_blank'>查单</a>";
        }
        ?>
        </div>
        <div class="">
          <label for="">备注：</label>
          <?php echo $row['Notes']; ?>
        </div>
       <?php } ?>
    </div>
  </div>
</div>
<?php include "footer.php" ?>
