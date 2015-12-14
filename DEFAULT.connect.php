<?php
$db_host = "127.0.0.1"; //your mysql server ip
$db_username= "你的账户";//your mysql username
$db_password="你的密码";//your password here
$db_name = "sales"; // Do not change。自己创建数据库的时候，要使用这个名称。

$con = mysql_connect($db_host,$db_username,$db_password) or die("连接数据库出错" . mysql_error());
mysql_query("set names 'utf8'",$con) or die("大哥，设置UTF8出现问题，错误如下：".mysql_error());
mysql_select_db($db_name,$con) or die("选择数据库出现错误" . mysql_error());
