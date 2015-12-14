<h2>Customer Orders Manage System 订单管理系统</h2>
<h4>设置使用：</h4>
<pre>

  查看 DEFAULT.connect.php 中的数据库设置，
  然后将DEFAULT.connect.php重命名为：connect.php 按照自己的配置来设置数据库。
  然后将下列代码导入：
Customers表格（不包含本行）：
  CREATE TABLE `customers` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `Name` char(50) DEFAULT NULL,
    `Alias` char(50) DEFAULT NULL,
    `Phone` char(11) DEFAULT NULL,
    `Address` varchar(255) DEFAULT NULL,
    `Zip` char(6) DEFAULT NULL,
    `Chineseid` char(18) DEFAULT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

Orders表格（不包含本行）：
  CREATE TABLE `orders` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `Name` char(6) NOT NULL DEFAULT '',
    `OrderNumber` char(50) DEFAULT NULL,
    `OrderSite` char(100) NOT NULL,
    `OrderSiteUrl` varchar(255) NOT NULL DEFAULT '',
    `ProductName` varchar(255) NOT NULL DEFAULT '',
    `Price` float NOT NULL,
    `BuyingPrice` float NOT NULL,
    `ShipStatus` char(50) NOT NULL,
    `BuyingDate` char(50) NOT NULL DEFAULT '',
    `Unit` int(11) NOT NULL,
    `ShipChina` char(50) NOT NULL,
    `ShipChinaDate` char(25) DEFAULT '',
    `ShipChinaPackages` int(3) DEFAULT NULL,
    `ShipWeight` float DEFAULT NULL,
    `ShipPrice` float DEFAULT NULL,
    `Bank` char(11) NOT NULL,
    `BankStatus` char(50) NOT NULL,
    `PackageReturn` tinyint(1) DEFAULT NULL,
    `ReturnTracking` char(26) DEFAULT NULL,
    `Notes` varchar(255) DEFAULT NULL,
    `CashBack` float DEFAULT NULL,
    `CashBackMoney` float DEFAULT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
</pre>

<h4>更新日志：</h4>
<pre>
  9.
    重新打包上传，Ignore 设置文件connet.php，添加了 DEFAULT.connect.php 到 github。
  8.
    Mysql 数据库添加了 Cashback 和 CashBackMoney。
    添加了 customer_sales_status.php 中的 利润，更精准的计算每笔单子的价格。包含 返现的计算，都会加入到 利润中。
    在 add.php 页面添加了 CashBack 利率。

  7.
    添加邮寄日期，邮寄包裹数量，备注功能。首页欢迎界面。将联系人页面调整到了菜单。
  6.
    sql 增加了 Alias, 在客户页面显示。
    在footer.php增加了mysql_close($con);
    移除其他页面中手动添加的 mysql_close($con);
    美化了一下消息的显示方式。
  5.
    改变了 orders.php 的现实方式，更精简，然后添加了详情，详情将会转到 order_detail.php，在这个页面更详细的查看订单。
    添加了分页。
  4.
    改变了orders.php显示的方式，调整宽度太长的问题。
  3.
    调整了消费统计的界面，订单修改的提交按钮。
    添加退货的时候填写 tracking Number 功能，在orders.php页面，如果已经退货，将显示一个连接，点击后自动跳转到谷歌+tracking Number。
    删除了 mysql 中的 alias，然后更新了上面的SQL语句。

  2.
    修改 orders.php 下的 银行卡，当查询订单的时候，银行卡会显示成银行状态，原因是 add.php 下的银行卡select 数据不对。
    增加 header.php 和 index.php 标题部分的 fa 图标.
    是否退货中添加了空选项。
    订单查询页面，添加修改删除功能。

  1.
    Submit project to github.
</pre>
