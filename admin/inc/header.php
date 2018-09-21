  
  <?php
    require_once('database/user.class.php');

    $user = new USER();
    
      $userid = $_SESSION['user_id'];
      $result_user = $user->GetUserById($userid);
      
      
  ?>
  <header class="main-header">
    <!-- Logo -->
    <a href="index" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>P</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b> Panel</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="data:image/jpeg;base64,<?php echo base64_encode($result_user['photo']);?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $result_user['Full_Name'];?></span>
            </a>
            
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($result_user['photo']);?>" class="img-circle" alt="User Image">
                <p>
                <?php echo $result_user['Full_Name'] . " - " . $result_user['user_type'];?>
                  <small>Member since Nov. 2012</small>
                </p>
              </li>              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="user-edit?id=<?php echo $userid;?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>          
        </ul>
      </div>
    </nav>
  </header>