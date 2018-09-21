<?php 
session_start();
require_once('database/dbconfig.php');
require_once('inc/functions.php');
confirm_login();
require_once('database/staff.class.php');

$staff = new STAFF();

if(isset($_GET['id']))
{
  $id = $_GET['id'];
  //$result = $staff->GetStaffById($id);
}   

if(isset($_POST['save']))
  {
        $type = strip_tags($_POST['type']);
        $name = strip_tags($_POST['name']);
        $designation = strip_tags($_POST['designation']);
        $qualification = strip_tags($_POST['qualification']);
        $mobile = strip_tags($_POST['mobile']);
        $description = strip_tags($_POST['description']);
        $facebook_link = strip_tags($_POST['facebook_link']);
        $twitter_link = strip_tags($_POST['twitter_link']);
        $google_link = strip_tags($_POST['google_link']);
        //$photo = fopen($_FILES['image']['tmp_name'], 'rb');
      try
      {              
        if($staff->UpdateStaff($id, $type, $name, $designation, $qualification, $mobile, $description, $facebook_link, $twitter_link, $google_link))
        {
          $smsg = "Staff's Updated Successfully !";
          //header('Location:user_list');
        }
        else
        {
          $fsmg = "Due to some problem Staff is not updated";
        }
      }
      catch(PDOException $e)
      {
        echo $e->getMessage();
      }
  }

  $result = $staff->GetStaffById($id);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel | Edit Staff</title>
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
   
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>      
        Edit Staff
      </h1>  
      <ol class="breadcrumb" style="padding-top:0px;">
      <a href="staff-list" class="btn btn-success"><i class="fa fa-list"></i> View All</a>
      </ol>    
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
      <div class="col-xs-12">
          <div class="box">           
            <div class="box-body">
            <form class="form-horizontal" action="" method="post"  enctype="multipart/form-data">
              <div class="box-body">
              <?php include 'inc/message.php';?>
              <label for="type" class="col-sm-2 control-label">Type</label>

                    <div class="col-sm-10">
                    <select name = "type" class="form-control">
                        <option <?php if($result['type']=='Teaching Staff') echo "Selected";?>>Teaching Staff</option>
                        <option <?php if($result['type']=='Non-Teaching Staff') echo "Selected";?>>Non-Teaching Staff</option>
                    </select>
                    
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Full Name *</label>

                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" placeholder="" name = "name" value = '<?php echo $result['full_name'];?>'>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="designation" class="col-sm-2 control-label">Designation *</label>

                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="designation" placeholder="" name = "designation" value = '<?php echo $result['designation'];?>'>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="qualification" class="col-sm-2 control-label">Qualification *</label>

                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="qualification" placeholder="" name = "qualification" value = '<?php echo $result['qualification'];?>'>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="mobile" class="col-sm-2 control-label">Mobile No. *</label>

                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="mobile" placeholder="" name = "mobile" value = '<?php echo $result['mobile'];?>'>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Description *</label>

                    <div class="col-sm-10">
                    <textarea class="textarea" id="editor" name ="description" placeholder="Place some text here"
                    style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $result['description'];?></textarea>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="facebook_link" class="col-sm-2 control-label">Facebook Link *</label>

                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="facebook_link" placeholder="" name = "facebook_link" value = '<?php echo $result['facebook_link'];?>'>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="twitter_link" class="col-sm-2 control-label">Twitter Link *</label>

                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="twitter_link" placeholder="" name = "twitter_link" value = '<?php echo $result['twitter_link'];?>'>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="google_link" class="col-sm-2 control-label">Google Link *</label>

                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="google_link" placeholder="" name = "google_link" value = '<?php echo $result['google_link'];?>'>
                    </div>
                    </div>
                    <!--
                    <div class="form-group">
                    <label for="image" class="col-sm-2 control-label">Image</label>

                    <div class="col-sm-10">
                    <input type="file" class="form-control" id="image" name ="image" >
                    </div>
                    </div>-->
                   <div class="form-group">
                  <label for="image" class="col-sm-2 control-label">Old Image</label>
                  <div class="col-sm-10">                    
                  <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($result['photo']).'" height="80" />'; ?>  
                  </div>
                </div>
                
                
                                            
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="staff-list" class="btn btn-danger"><i class="fa fa-times"></i> Close</a>                
                <button type="submit" class="btn btn-success pull-right" name = "save"><i class="fa fa-floppy-o"></i> Save</button>
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