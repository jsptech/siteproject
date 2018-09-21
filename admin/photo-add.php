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
    require_once('database/album.class.php');
    $album = new ALBUM();
    $pstmt = $album->GetAllAlbum("SELECT * FROM album ORDER BY id");
    $pstmt->execute();


   require_once('database/photo.class.php');
   $photo = new PHOTO();
   
   if(isset($_POST['save']))
   {
      $album_id = strip_tags($_POST['album_id']);
      $photo_name = strip_tags($_POST['photo_name']);
      $description = $_POST['description'];
      $photo_file = fopen($_FILES['image']['tmp_name'], 'rb');
     
      try
            {              
                if($photo->save_photo($album_id, $photo_name, $description, $photo_file))
                {
                    $smsg = "Photo Uploaded Successfully !";
                }
                else
                {
                    $fsmg = "Due to some problem Photo has not Uploaded";
                }
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
     

   }
   $menu =array("About Us", )
   ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>      
         Add Photo
      </h1>  
      <ol class="breadcrumb" style="padding-top:0px;">
      <a href="photo-list" class="btn btn-success"><i class="fa fa-list"></i> View All</a>
      </ol>    
    </section>
    <!-- Main content -->
    
    <section class="content">
      <!-- Small boxes (Stat box) -->
      
      <div class="row">
      <div class="col-xs-12">
      
          <div class="box">           
            <div class="box-body">
             <form class="form-horizontal" action="<?Php $_SERVER['PHP_SELF']?>" method="post"  enctype="multipart/form-data">
              <div class="box-body">
              <?php include 'inc/message.php';?>
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Album</label>

                  <div class="col-sm-10">
                    <select name = "album_id" class="form-control">
                      <?php 
                        while($data_album=$pstmt->fetch(PDO::FETCH_ASSOC))
                          {
                            ?>
                              <option value = "<?Php echo $data_album['id'];?>"><?php echo $data_album['album_name'];?></option>
                            <?php
                          }
                        ?>
                    </select>
                    
                  </div>
                </div>
                <div class="form-group">
                  <label for="tile" class="col-sm-2 control-label">Title *</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="tile"  name = "photo_name">
                  </div>
                </div>
               
                <div class="form-group">
                  <label for="description" class="col-sm-2 control-label">Description *</label>

                  <div class="col-sm-10">
                  <textarea class="textarea" id="editor1" name ="description" placeholder="Place some text here"
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                  </div>
                </div> 
                <div class="form-group">
                  <label for="image" class="col-sm-2 control-label">Photo</label>

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
