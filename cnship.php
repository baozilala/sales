<?php
include "header.php";
include "navigation.php";
include "connect.php";
?>
<div class="container">
  <div class="row">
    <header class="title page-header text-center">
      <h1>包裹邮寄</h1>
    </header>
    <div class="col-md-12 table-responsive">
      <?php
        //分页
        $pagesize=10;
        $p = $_GET['p']?$_GET['p']:1;
        $offset = ($p-1)*$pagesize;
        //选择数据
        $Order_List = mysql_query("SELECT * FROM ship ORDER BY id DESC");

      ?>
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th><i class="fa fa-star"></i></th>
            <th><i class="fa fa-user"></i></th>
            <th>包含物品</th>
            <th><i class="fa fa-clock-o"></i></th>
            <th><i class="fa fa-balance-scale"></i>、<i class="fa fa-money"></i></th>
            <th><i class="fa fa-gear"></i></th>
          </tr>
        </thead>

        <?php
          while($row = mysql_fetch_assoc($Order_List) ){
         ?>
          <tbody>
            <tr>
              <td><?php echo $row['id'] ?></td>
              <td><?php echo $row['Name'] ?></td>
              <td><?php echo $row['ShipProducts'] ?></td>
              <td><?php echo $row['ShipDate']?></td>
              <td><?php echo $row['ShipWeight'] . "lb~"?><?php echo "$" . $row['ShipPrice'] ?></td>
              <td>
                  <ul class="list-inline">
                    <li><a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-warning btn-sm">修改</a></li>
                    <li><a href="del_ship.php?id=<?php echo $row['id']?>" class="btn btn-danger btn-xs" id="delbutton">删除</a></li>
                  </ul>
              </td>
            </tr>
          </tbody>
        <?php
      } ?>
        <tfoot>
        <?php

        echo "<div class='text-center'>";
          $count_result = mysql_query("SELECT count(*) as count FROM orders");
          $count_array = mysql_fetch_array($count_result);
          $pagenum=ceil($count_array['count']/$pagesize);
          echo "共",$count_array['count'],"条订单";
          //循环输出各页数目及连接
          if ($pagenum > 1) {
              for($i=1;$i<=$pagenum;$i++) {
                  if($i==$p) {
                      echo ' [',$i,']';
                  } else {
                      echo ' <a href="orders.php?p=',$i,'">',$i,'</a>';
                  }
              }
          }
          echo "</div>";
          //分页结束
        ?>
        </tfoot>
      </table>
    </div>
  </div>
</div>

<?php include "footer.php" ?>
