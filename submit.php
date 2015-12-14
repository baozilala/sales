<?php
include "header.php";
include "navigation.php";
include "connect.php";

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
        ShipChina,
        ShipWeight,
        ShipPrice,
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
        '$_POST[ShipChina]',
        '$_POST[ShipWeight]',
        '$_POST[ShipPrice]',
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

include "footer.php"
 ?>
