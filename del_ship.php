<?php
include "header.php";
include "navigation.php";
include "connect.php";
$sql = "DELETE FROM ship WHERE id=$_GET[id]";
if (mysql_query($sql,$con)) {
  echo "
  <div class='container'>
    <div class='row'>
      <div class='col-md-12'>
        <div class='alert alert-success' role='alert'>删除成功</div>
      </div>
    </div>
  </div>
  ";
}else {
  echo "
  <div class='container'>
    <div class='row'>
      <div class='col-md-12'>
        <div class='alert alert-danger' role='alert'>删除失败</div>".mysql_error()."
      </div>
    </div>
  </div>
  ";
}

include "footer.php" ?>
