<?php
include "header.php";
include "navigation.php";
include "connect.php";
?>
    <header class="title page-header text-center">
      <h1>Order Record</h1>
    </header>
    <div class="row">
      <div class="col-md-5"></div>
      <div class="col-md-2">
        <form class="text-center" action="submit.php" method="post">
          <!-- <input type="text" name="Name" placeholder="姓名" value=""> -->
          <div class="form-group">
            <i class="fa fa-user"></i> <label>姓名：</label>
            <select class="form-control" name="Name">
              <?php
              /*This php include Select Customers Name*/
              $Customer_List = mysql_query("SELECT * FROM customers");
              while ($CustomerName = mysql_fetch_array($Customer_List)) {
                echo "<option value='" . $CustomerName['Name'] .  "'>". $CustomerName['Name'] . "</option>";
              }
              ?>
            </select>
          </div>

          <div class="form-group">
             <i class="fa fa-shopping-cart"></i> <label>订单号：</label>
            <input type="text" class="form-control" name="OrderNumber" placeholder="订单号">
          </div>

          <div class="form-group">
            <i class="fa fa-amazon"></i> <label>订单网站：</label>
            <input type="text" class="form-control" name="OrderSite" placeholder="订单网站">
          </div>

          <div class="form-group">
            <i class="fa fa-font"></i> <label>物品名称：</label>
            <input type="text" class="form-control" name="ProductName" placeholder="产品名称">
          </div>

          <div class="form-group">
            <i class="fa fa-check-square-o"></i> <label>数量：</label>
            <input type="number" class="form-control" name="Unit" placeholder="数量">
          </div>

          <div class="form-group">
            <i class="fa fa-dollar"></i> <label>价格：</label>
            <input type="number" class="form-control" name="Price" placeholder="价格">
          </div>

          <div class="form-group">
            <i class="fa fa-dollar"></i> <label>购入价格：</label>
            <input type="number" class="form-control" name="BuyingPrice" placeholder="购入价格">
          </div>

          <div class="form-group">
            <i class="fa fa-truck"></i> <label>商家发货：</label>
            <select class="form-control" name="ShipStatus">
              <option value="未发货">未发货</option>
              <option value="准备发货">准备发货</option>
              <option value="已发货">已发货</option>
              <option value="已收货">已收货</option>
            </select>
          </div>

          <div class="form-group">
            <i class="fa fa-truck"></i> <label>邮回中国：</label>
            <select class="form-control" name="ShipChina">
              <option value="未发货">未发货</option>
              <option value="准备发货">准备发货</option>
              <option value="已发货">已发货</option>
              <option value="已收货">已收货</option>
            </select>
          </div>
          <div class="form-group">
            <i class="fa fa-balance-scale"></i> <label>邮寄重量：</label>
            <input type="number" class="form-control" name="ShipWeight" placeholder="邮寄重量">
          </div>

          <div class="form-group">
            <i class="fa fa-dollar"></i> <label>邮寄价格：</label>
            <input type="number" class="form-control" name="ShipPrice" placeholder="邮寄价格">
          </div>

          <div class="form-group">
            <i class="fa fa-credit-card"></i> <label>银行卡：</label>
            <select class="form-control" name="Bank">
              <option value="转账中">Discover</option>
              <option value="已划走">Amex</option>
              <option value="等待退款">Chase</option>
              <option value="已退款">PNC</option>
            </select>
          </div>

          <div class="form-group">
            <i class="fa fa-spinner"></i> <label>银行状态：</label>
            <select class="form-control" name="BankStatus">
              <option value="转账中">转账中</option>
              <option value="已划走">已经划走</option>
              <option value="等待退款">等待退款</option>
              <option value="已退款">已退款</option>
            </select>
          </div>

          <div class="form-group">
            <i class="fa fa-truck"></i> <label>是否退货：</label>
            <select class="form-control" name="PackageReturn">
              <option value="0">不需退货</option>
              <option value="1">需要退货</option>
              <option value="2">已经退货</option>
            </select>
          </div>

          <input type="hidden" name="BuyingDate">
          <div class="form-group">
              <input type="submit" name="name" value="提交">
          </div>
        </form>
      </div>
    </div>
<?php include "footer.php" ?>
