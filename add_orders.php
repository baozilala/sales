<?php
include "header.php";
include "navigation.php";
include "connect.php";
if (!empty($_POST)) {
  $sql="INSERT INTO
        orders (
          Name,
          OrderNumber,
          OrderSite,
          OrderSiteUrl,
          ProductName,
          Price,
          PackageReturn,
          BuyingPrice,
          BuyingDate,
          Unit,
          ShipStatus,
          Bank,
          BankStatus,
          CashBack
        )
        VALUES(
          '$_POST[Name]',
          '$_POST[OrderNumber]',
          '$_POST[OrderSite]',
          '$_POST[OrderSiteUrl]',
          '$_POST[ProductName]',
          '$_POST[Price]',
          '$_POST[PackageReturn]',
          '$_POST[BuyingPrice]',
          '$_POST[BuyingDate]',
          '$_POST[Unit]',
          '$_POST[ShipStatus]',
          '$_POST[Bank]',
          '$_POST[BankStatus]',
          '$_POST[CashBack]'
        )";

  if (mysql_query($sql,$con)) {
    echo "
    <div class='container'>
      <div class='row'>
        <div class='col-md-12'>
          <div class='alert alert-success' role='alert'>添加成功</div>
        </div>
      </div>
    </div>
    ";
  }else{
    echo "
    <div class='container'>
      <div class='row'>
        <div class='col-md-12'>
          <div class='alert alert-danger' role='alert'>添加失败</div>".mysql_error()."
        </div>
      </div>
    </div>
    ";
  }
}
?>
    <header class="title page-header text-center">
      <h1>Order Record</h1>
    </header>
    <div class="row">

      <div class="col-md-2 col-md-offset-5">
        <form class="text-center" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <!-- <input type="text" name="Name" placeholder="姓名" value=""> -->
          <div class="form-group">
            <i class="fa fa-user"></i> <label>姓名：</label>
            <select class="form-control" name="Name">
              <?php
              /*This php include Select Customers Name*/
              $Customer_List = mysql_query("SELECT * FROM customers");
              while ($CustomerName = mysql_fetch_array($Customer_List)) {
                echo "<option value='" . $CustomerName['Name'] . "'>" . $CustomerName['Name'] . "</option>";
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
            <i class="fa fa-amazon"></i> <label>订单网站连接：</label>
            <input type="text" class="form-control" name="OrderSiteUrl" placeholder="订单网站">
          </div>

          <div class="form-group">
            <i class="fa fa-font"></i> <label>物品名称：</label>
            <input type="textarea" class="form-control" name="ProductName" placeholder="产品名称">
          </div>

          <div class="form-group">
            <i class="fa fa-check-square-o"></i> <label>数量：</label>
            <input type="number" class="form-control" name="Unit" placeholder="数量">
          </div>

          <div class="form-group">
            <i class="fa fa-dollar"></i> <label>返现利率：</label>
            <input type="text" class="form-control" name="CashBack" placeholder="返现 0.XX">
          </div>

          <div class="form-group">
            <i class="fa fa-dollar"></i> <label>购买价格：</label>
            <input type="text" class="form-control" name="BuyingPrice" placeholder="购入价格">
          </div>

          <div class="form-group">
            <i class="fa fa-dollar"></i> <label>收取费用：</label>
            <input type="text" class="form-control" name="Price" placeholder="价格">
          </div>

          <div class="form-group">
            <label>日期：</label>
            <input type="date" class="form-control" name="BuyingDate">
          </div>

          <div class="hidden">
            <i class="fa fa-truck"></i> <label>商家发货：</label>
            <select class="form-control" name="ShipStatus">
              <option value="等待收货">等待收货</option>
              <option value="收到货物">收到货物</option>
            </select>
          </div>

          <div class="form-group">
            <i class="fa fa-credit-card"></i> <label>银行卡：</label>
            <select class="form-control" name="Bank">
              <option value="Discover">Discover</option>
              <option value="Amex">Amex</option>
              <option value="Chase">Chase</option>
              <option value="PNC">PNC</option>
            </select>
          </div>
          <div class="hidden">
            <i class="fa fa-spinner"></i> <label>银行状态：</label>
            <select class="form-control" name="BankStatus">
              <option value="0"></option>
              <option value="1">已退款</option>
            </select>
          </div>

          <div class="hidden">
            <i class="fa fa-truck"></i> <label>是否退货：</label>
            <select class="form-control" name="PackageReturn">
              <option value=""></option>
              <option value="0">不需退货</option>
              <option value="1">已经退货</option>
            </select>
          </div>

          <div class="form-group">
              <input class="btn btn-default" type="submit" name="name" value="提交">
          </div>
        </form>
      </div>
    </div>
<?php include "footer.php" ?>
