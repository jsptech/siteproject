<!DOCTYPE html><?php include '../includes/connection.php';
include 'inc/functions.php';
session_start();
confirm_login();
date_default_timezone_set("Asia/Kathmandu");

?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="assets/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/kesuapps.min.css">
  <!-- Theme skins -->
  <link rel="stylesheet" href="assets/css/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="assets/css/morris.css">  
  <!-- Date Picker -->
  <link rel="stylesheet" href="assets/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="assets/css/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="assets/css/bootstrap3-wysihtml5.min.css">  
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include'inc/header.php'?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include'inc/navbar.php'?>
  <!-- Content Wrapper. Contains page content -->
   <?php
  	require_once('database/user.class.php');
      $user = new USER();
   if(isset($_POST['save']))
   {
        $user_type = strip_tags($_POST['user_type']);
        $Full_Name = strip_tags($_POST['Full_Name']);
        $Email_ID = strip_tags($_POST['Email_ID']);
        $user_name = strip_tags($_POST['user_name']);
        $password = sha1(strip_tags($_POST['password']));
        $SlidImage = fopen($_FILES['image']['tmp_name'], 'rb');
        $status = 1;
        try
            {              
                if($user->save_user($user_type, $Full_Name, $Email_ID, $user_name, $password, $SlidImage, $status ))
                {
                    $smsg = "User Created Successfully !";
                }
                else
                {
                    $fsmg = "Due to some problem Slider has not created";
                }
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
   }
   ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>      
        News & Events
      </h1>  
      <ol class="breadcrumb" style="padding-top:0px;">
      <a href="user_list" class="btn btn-success"><i class="fa fa-list"></i> View All</a>
      </ol>    
    </section>
    <!-- Main content -->
    
    <section class="content">
      <!-- Small boxes (Stat box) -->
      
      <div class="row">
      <div class="col-xs-12">
      
          <div class="box">           
            <div class="box-body">
            <?PHP
                if(ISSET($msg))
                {
                  ?>
                <div class="alert alert-success">
                  <strong>Success!</strong> News/Event is successfully saved.
                </div>
                <?php
                }
              ?>
            <form class="form-horizontal" action="<?Php $_SERVER['PHP_SELF']?>" method="post"  enctype="multipart/form-data">
              <div class="box-body">
              <div class="form-group">
                  <label for="user_type" class="col-sm-2 control-label">Type</label>

                  <div class="col-sm-10">
                    <select name = "user_type" class="form-control">
                      <option>Admin</option>
                      <option>User</option>
                    </select>
                    
                  </div>
                </div>
                <div class="form-group">
                  <label for="Full_Name" class="col-sm-2 control-label">Full Name *</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="Full_Name" placeholder="" name = "Full_Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Email_ID" class="col-sm-2 control-label">Email ID *</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="Email_ID" placeholder="" name = "Email_ID">
                  </div>
                </div>
                <div class="form-group">
                  <label for="user_name" class="col-sm-2 control-label">User Name *</label>

                  <div class="col-sm-10">
                    <input type="user_name" class="form-control" id="user_name" placeholder="" name = "user_name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="password" class="col-sm-2 control-label">Password *</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" placeholder="" name = "password">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="image" class="col-sm-2 control-label">Image</label>

                  <div class="col-sm-10">
                    <input type="file" class="form-control" id="image" name ="image" >
                  </div>
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right" name = "save">Save</button>
              </div>
              <!-- /.box-footer -->
            </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include'inc/footer.php'?>
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="assets/js/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/js/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="assets/js/raphael.min.js"></script>
<script src="assets/js/morris.min.js"></script>
<!-- Sparkline -->
<script src="assets/js/jquery.sparkline.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="assets/js/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/daterangepicker.js"></script>
<!-- datepicker -->
<script src="assets/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="assets/js/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="assets/js/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="assets/js/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/adminlte.min.js"></script>
<script src="assets/js/ckeditor.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
</body>
</html>
