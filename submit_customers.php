<?php
include "header.php";
include "navigation.php";
include "connect.php";

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


      include "footer.php"
 ?>
