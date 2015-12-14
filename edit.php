<?php
include "header.php";
include "navigation.php";
include "connect.php";
?>
<header class="title page-header text-center">
  <h1>订单修改</h1>
</header>
<div class="row">
  <div class="col-sm-12 col-md-2 col-md-offset-5 text-center">
    <?php
    $Order_List = mysql_query("SELECT * FROM orders WHERE id = $_GET[id]");
    ?>
      <form class="" action="edit_submit.php" method="post">
      <?php
        while($row = mysql_fetch_assoc($Order_List) ){
       ?>
            <div class="form-group">
              <input class='form-control' type="hidden" name="id" value="<?php echo $row['id'] ?>">
            </div>
            <div class="form-group">
              <lable>姓名：</lable>
              <input class='form-control' type="text" name="Name" value="<?php echo $row['Name'] ?>">
            </div>
            <div class="form-group">
              <lable>订单号：</lable>
              <input class='form-control' type="text" name="OrderNumber" value="<?php echo $row['OrderNumber'] ?>">
            </div>
            <div class="form-group">
              <lable>订单网站：</lable>
              <input class='form-control' type="text" name="OrderSite" value="<?php echo $row['OrderSite'] ?>">
            </div>
            <div class="form-group">
              <lable>物品名称：</lable>
              <input class='form-control' type="text" name="ProductName" value="<?php echo $row['ProductName'] ?>">
            </div>
            <div class="form-group">
              <i class="fa fa-dollar"></i> <label>返现利率：</label>
              <input type="text" class="form-control" name="CashBack" placeholder="<?php echo $row['CashBack'] ?>">
            </div>
            <div class="form-group">
              <lable>价格：</lable>
              <input class='form-control' type="number" name="Price" value="<?php echo $row['Price'] ?>">
            </div>
            <div class="form-group">
              <lable>购入价格：</lable>
              <input class='form-control' type="text" name="BuyingPrice" value="<?php echo $row['BuyingPrice'] ?>">
            </div>
            <div class="form-group">
              <lable>数量：</lable>
              <input class='form-control' type="text" name="Unit" value="<?php echo $row['Unit'] ?>">
            </div>
            <div class="form-group">
              <lable>商家发货：</lable>
              <input class='form-control 'type="text" name="ShipStatus" value="<?php echo $row['ShipStatus'] ?>">
            </div>
            <div class="form-group">
              <lable>邮回中国：</lable>
              <input class='form-control' type="text" name="ShipChina" value="<?php echo $row['ShipChina'] ?>">
            </div>
            <div class="form-group">
              <lable>邮寄日期：</lable>
              <input class='form-control' type="date" name="ShipChinaDate" value="<?php echo $row['ShipChinaDate'] ?>">
            </div>
            <div class="form-group">
              <lable>邮寄包裹数量：</lable>
              <input class='form-control' type="number" name="ShipChinaPackages" value="<?php echo $row['ShipChinaPackages'] ?>">
            </div>
            <div class="form-group">
              <lable>邮寄重量：</lable>
              <input class='form-control' type="text" name="ShipWeight" value="<?php echo $row['ShipWeight'] ?>">
            </div>
            <div class="form-group">
              <lable>邮寄价格：</lable>
              <input class='form-control' type="text" name="ShipPrice" value="<?php echo $row['ShipPrice'] ?>">
            </div>
            <div class="form-group">
              <lable>银行卡：</lable>
              <input class='form-control' type="text" name="Bank" value="<?php echo $row['Bank'] ?>">
            </div>
            <div class="form-group">
              <lable>银行状态：</lable>
              <?php
                if ($row['BankStatus']=='转账中') {
                  echo "
                  <select class='form-control' name='BankStatus'>
                    <option value='转账中'>转账中</option>
                    <option value='已划走'>已经划走</option>
                    <option value='等待退款'>等待退款</option>
                    <option value='已退款'>已退款</option>
                  </select>
                  ";
                }elseif ($row['BankStatus']=='已划走') {
                  echo "
                  <select class='form-control' name='BankStatus'>
                    <option value='已划走'>已经划走</option>
                    <option value='转账中'>转账中</option>
                    <option value='等待退款'>等待退款</option>
                    <option value='已退款'>已退款</option>
                  </select>
                  ";
                }elseif ($row['BankStatus']=='等待退款') {
                  echo "
                  <select class='form-control' name='BankStatus'>
                    <option value='等待退款'>等待退款</option>
                    <option value='已划走'>已经划走</option>
                    <option value='转账中'>转账中</option>
                    <option value='已退款'>已退款</option>
                  </select>
                  ";
                }else {
                  echo "
                  <select class='form-control' name='BankStatus'>
                    <option value='已退款'>已退款</option>
                    <option value='等待退款'>等待退款</option>
                    <option value='已划走'>已经划走</option>
                    <option value='转账中'>转账中</option>
                  </select>
                  ";
                }

               ?>
            </div>
              <?php
            if ($row['PackageReturn'] == 'null' ) {
              echo "<lable>退货：</lable>";
              echo "
              <select class='form-control' name='PackageReturn'>
                <option value=''></option>
                <option value='0'>不需退货</option>
                <option value='1'>需要退货</option>
                <option value='2'>已经退货</option>
              </select>
              ";
            }elseif ($row['PackageReturn'] == 0) {
              echo "
              <select class='form-control' name='PackageReturn'>
                <option value='0'>不需退货</option>
                <option value=''></option>
                <option value='1'>需要退货</option>
                <option value='2'>已经退货</option>
              </select>
              ";
            }elseif ($row['PackageReturn'] == 1) {
              echo "
              <select class='form-control' name='PackageReturn'>
                <option value='1'>需要退货</option>
                <option value=''></option>
                <option value='0'>不需退货</option>
                <option value='2'>已经退货</option>
              </select>
              ";
            }elseif ($row['PackageReturn'] == 2) {
              echo "
              <select class='form-control' name='PackageReturn'>
                <option value='2'>已经退货</option>
                <option value=''></option>
                <option value='0'>不需退货</option>
                <option value='1'>需要退货</option>
              </select>
              ";

              echo "
              <label>Tracking Number</label>
              <input class='form-control' type='text' name='ReturnTracking' value='". $row['ReturnTracking'] ."' />
              ";

            }
            ?>
            <div class="form-group">
              <lable>备注</lable>
              <textarea name="Notes" rows="8" cols="40" ><?php echo $row['Notes'] ?></textarea>
            </div>
      <?php
    } ?>
    <div class="form-group">
      <input type="submit" value="submit">
    </div>
    </form>
  </div>
</div>

<?php include "footer.php" ?>
