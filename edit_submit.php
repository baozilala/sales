<!-- 订单更新代码 -->
<?php
include "header.php";
include "navigation.php";
include "connect.php";
?>
<header class="title page-header text-center">
  <h1>订单修改</h1>
</header>
<?php
  if (!empty($_POST['ReturnTracking'])) {
    $upda="UPDATE orders SET ReturnTracking='$_POST[ReturnTracking]' WHERE id = $_POST[id]";
    mysql_query($upda,$con);
  }

  $sql = "UPDATE orders SET Name = '$_POST[Name]',
    OrderNumber='$_POST[OrderNumber]',
    OrderSite='$_POST[OrderSite]',
    ProductName='$_POST[ProductName]',
    Price='$_POST[Price]',
    PackageReturn='$_POST[PackageReturn]',
    BuyingPrice='$_POST[BuyingPrice]',
    Unit='$_POST[Unit]',
    ShipStatus='$_POST[ShipStatus]',
    ShipChina='$_POST[ShipChina]',
    ShipChinaDate='$_POST[ShipChinaDate]',
    ShipChinaPackages='$_POST[ShipChinaPackages]',
    ShipWeight='$_POST[ShipWeight]',
    ShipPrice='$_POST[ShipPrice]',
    Bank='$_POST[Bank]',
    BankStatus='$_POST[BankStatus]',
    Notes='$_POST[Notes]',
    CashBack='$_POST[CashBack]'
    WHERE id = $_POST[id];";

  if (mysql_query($sql,$con)) {
    echo "
    <div class='container'>
      <div class='row'>
        <div class='col-md-12'>
          <div class='alert alert-success' role='alert'>修改成功</div>
        </div>
      </div>
    </div>
    ";
  }else{
    echo "
    <div class='container'>
      <div class='row'>
        <div class='col-md-12'>
          <div class='alert alert-danger' role='alert'>修改失败</div>
          ".mysql_error()."
        </div>
      </div>
    </div>
    ";
  }

  include "footer.php";
  ?>
