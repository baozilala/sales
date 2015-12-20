  <nav class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">
          <i class="fa fa-users"></i> 客户订单管理系统
        </a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse" id="menu">
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">录入<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="add_orders.php">录入订单</a></li>
              <li><a href="add_ship.php">登记邮寄</a></li>
              <li><a href="add_customers.php">添加顾客</a></li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">查询<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="orders.php?p=1">查询订单</a></li>
              <li><a href="cnship.php?p=1">邮寄跟踪</a></li>
              <li><a href="customers.php">顾客查询</a></li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">财务<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="sales_status.php">消费统计</a></li>
            </ul>
          </li>


        </ul>
      </div>
    </div>
  </nav>
