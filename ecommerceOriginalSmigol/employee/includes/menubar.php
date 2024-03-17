<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($employee['photo'])) ? '../images/'.$employee['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $employee['firstname'].' '.$employee['lastname']; ?></p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">REPORTS</li>
      <!-- <li><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>   -->
      <li><a href="cart_view.php"><i class="fa fa-money"></i> <span>My Order Request</span></a></li> 
      <li><a href="chatbox.php"><i class="fa fa-money"></i> <span>Messages</span></a></li> 
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>