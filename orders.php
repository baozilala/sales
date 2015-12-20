<?php
include "header.php";
include "navigation.php";
include "connect.php";
?>
<div class="container">
  <div class="row">
    <header class="title page-header text-center">
      <h1>All Order List</h1>
    </header>
    <div class="col-md-12 table-responsive">
      <?php
        //分页
        $pagesize=10;
        $p = $_GET['p']?$_GET['p']:1;
        $offset = ($p-1)*$pagesize;
        //选择数据
        $Order_List = mysql_query("SELECT * FROM orders ORDER BY id DESC LIMIT $offset, $pagesize");
      ?>
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>ID:</th>
            <th><i class="fa fa-user"></i></th>
            <!-- <th>单号/<i class="fa fa-chrome"></i></th> -->
            <th><i class="fa fa-tags"></i></th>
<!--             <th>价格/实价：</th>
           <th><i class="fa fa-calendar"></i></th>
            <th>数量：</th> -->
            <th><i class="fa fa-truck"></i></th>
            <th><i class="fa fa-balance-scale"></i>、<i class="fa fa-money"></i></th>
            <th><i class="fa fa-truck"></i></th>
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
              <td><?php echo $row['ProductName'] ?></td>
              <td><?php echo $row['ShipStatus'] ?></td>
              <td><?php echo $row['Bank'] ?><?php
                if ($row['PackageReturn'] == 1 && $row['BankStatus']==0) {
                  echo "、等待退款";;
                }elseif ($row['PackageReturn'] == 1 && $row['BankStatus']==1) {
                  echo "、已退款";
                }elseif ($row['BankStatus']==1 && $row['PackageReturn'] == 0 ) {
                  echo "、<p class='text-danger'>您忘记选择已经退货</p>";
                }elseif ($row['PackageReturn'] == 1) {
                  echo "、等待退款";
                }elseif ($row['PackageReturn'] == 0 ) {
                  echo "";
                }
               ?></td>
              <td>
                <?php
              if ($row['PackageReturn'] == 0) {
                echo "不需退货";
              }elseif ($row['PackageReturn'] == 1) {
                echo "<a href='http://www.google.com/?q=".$row['ReturnTracking']."' target='_blank'>已经退货</a>";
              }
              ?></td>
                <!-- 计算每单得到的CashBackMoney  -->
              <div class="hidden">

                <?php $CashBackMoney =$row['CashBack'] * $row['BuyingPrice'];
                  $sql="UPDATE orders SET CashBackMoney = $CashBackMoney Where id =$row[id]";
                  mysql_query($sql,$con);
                ?>
              </div>

              <td>
                  <ul class="list-inline">
                    <li><a href="order_detail.php?id=<?php echo $row['id']?>" class="btn btn-primary btn-sm">详情<a></li>
                    <li><a href="edit_orders.php?id=<?php echo $row['id']?>" class="btn btn-warning btn-sm">修改</a></li>
                    <li><a href="del_order.php?id=<?php echo $row['id']?>" class="btn btn-danger btn-xs" id="delbutton">删除</a></li>
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

          /*统计订单数量*/
          $need_return_orders = mysql_query("SELECT PackageReturn FROM Orders WHERE PackageReturn=0");
          $after_return_orders = mysql_query("SELECT PackageReturn FROM Orders WHERE PackageReturn=2");
          $need_return_orders = mysql_num_rows($need_return_orders);
          $after_return_orders = mysql_num_rows($after_return_orders);
          $returned = $count_array['count']-$need_return_orders;

          echo "<pre class='text-center'>"."总共有".$count_array['count']. "个订单 &nbsp";
          echo "实际".$need_return_orders ."单&nbsp";
          echo $returned . "单需要退货&nbsp";
          echo "已退". $after_return_orders ."单&nbsp"."</pre>";
        ?>
        </tfoot>
      </table>
    </div>
  </div>
</div>

<?php include "footer.php" ?>
