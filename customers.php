<?php
include "header.php";
include "navigation.php";
include "connect.php";
?>

<header class="title page-header text-center">
  <h1><i class="fa fa-users"></i> 客户订单管理系统</h1>
</header>

<div class="container">
  <div class="row">
    <div class="col-md-12">
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
