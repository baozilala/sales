<?php
include "header.php";
include "navigation.php";
include "connect.php";
if (!empty($_POST)) {
  $sql="INSERT INTO customers
        (
          Name,
          Alias,
          Phone,
          Address,
          Zip,
          Chineseid
        )
          VALUES(
            '$_POST[name]',
            '$_POST[alias]',
            '$_POST[phone]',
            '$_POST[address]',
            '$_POST[zip]',
            '$_POST[chineseid]'
          )";

        if (mysql_query($sql,$con)) {
          echo "
          <div class='container'>
            <div class='row'>
              <div class='col-md-12'>
                <div class='alert alert-success' role='alert'>成功写入数据！</div>
              </div>
            </div>
          </div>
          ";
        }else{
          echo "
          <div class='container'>
            <div class='row'>
              <div class='col-md-12'>
                <div class='alert alert-danger' role='alert'>写入失败</div>
                ".mysql_error()."
              </div>
            </div>
          </div>
          ";
        }
}
?>

<header class="title page-header text-center">
  <h1><i class="fa fa-users"></i> 客户订单管理系统</h1>
</header>

<div class="container">
  <div class="row">
    <div class="col-md-2">
      <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
          <i class="fa fa-user"></i> <label>姓名：</label>
          <input class="form-control" type="text" name="name">
        </div>
        <div class="form-group">
          <i class="fa fa-user-secret"></i> <label>昵称：</label>
          <input class="form-control" type="text" name="alias">
        </div>
        <div class="form-group">
          <i class="fa fa-mobile"></i> <label>电话：</label>
          <input class="form-control" type="text" name="phone" maxlength="11">
        </div>
        <div class="form-group">
          <i class="fa fa-map-marler"></i> <label>地址：</label>
          <input class="form-control" type="text" name="address">
        </div>
        <div class="form-group">
          <i class="fa fa-paper-plane-o"></i> <label>邮编：</label>
          <input class="form-control" type="text" name="zip" maxlength="6">
        </div>
        <div class="form-group">
          <i class="fa fa-shield"></i> <label>身份证：</label>
          <input class="form-control" type="text" name="chineseid" maxlength="18">
        </div>
        <div class="form-group">
          <input class="form-control" type="submit" value="Submit">
        </div>
      </form>
    </div>
    <div class="col-md-10">
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>姓名：</th>
            <th>电话：</th>
            <th>地址：</th>
            <th>邮编：</th>
            <th>身份证：</th>
          </tr>
        </thead>

        <?php
          $Customer_List = mysql_query("SELECT * FROM customers");
         ?>
         <?php while ($row = mysql_fetch_assoc($Customer_List)) {?>
          <tbody>
            <tr>
              <td>
                <?php
                echo $row['Name'];
                if (!empty($row['Alias'])) {
                  echo " (".$row['Alias'].")";
                }
              ?></td>
              <td><?php echo $row['Phone'] ?></td>
              <td><?php echo $row['Address'] ?></td>
              <td><?php echo $row['Zip'] ?></td>
              <td><?php echo $row['Chineseid'] ?></td>
            </tr>
          </tbody>
           <?php
            } ?>
      </table>
    </div>
  </div>
</div>

<?php
include "footer.php"
?>
