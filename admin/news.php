<!DOCTYPE html>
<?php include '../includes/connection.php';
include 'inc/functions.php';
session_start();
confirm_login();
 
  require_once('database/news_event.class.php');
  $news_event = new NEWS_EVENT();
  $stmt = $news_event->GetAllNews_Event("SELECT * FROM news_events ORDER BY id DESC");
  $stmt->execute();

if(isset($_GET['del']))
{
  $id = $_GET['del'];
  $news_event = new NEWS_EVENT();
  $stmt = $news_event->DeleteNews_Event($id);  
  header('Location:news'); 
}
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
  <!-- DataTables -->
  <link rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css">
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
        News/Events       
      </h1>
      <ol class="breadcrumb" style="padding-top:0px;">
      <a href="news-add" class="btn btn-success"><i class="fa fa-plus"></i> Add News/Events</a>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    
      <!-- Small boxes (Stat box) -->
      <div class="row">
      <div class="col-xs-12">
          <div class="box">           
            <div class="box-body">
              <table id="news" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>Type</th>
                  <th>Title</th>
                  <th>Content</th>
                  <th>Post By</th>
                  <th>Post Date</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if($stmt->rowCount() > 0)
                  {
                    $sn=1;
                    while($data_news=$stmt->fetch(PDO::FETCH_ASSOC))
                    { ?>
                      <tr>
                        <td><?php echo $data_news['news_event'];?></td>
                        <td><?php echo $data_news['news_title'];?></td>
                        <td><?php echo substr($data_news['news_content'],0,100).'..................';?></td>
                        <td><?php echo $data_news['posted_by'];?></td>
                        <td><?php echo $data_news['posted_date'];?></td>
                        <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($data_news['image_file']).'" height="50" />'; ?></td>
                        
                        <td>
                        <a class="btn btn-warning btn-sm" href="news-edit?id=<?php echo $data_news['id']; ?>" ><i class="fa fa-pencil"></i> Edit</a>
                          <a class="btn btn-danger btn-sm" href="?del=<?php echo $data_news['id']; ?>" ><i class="fa fa-trash"></i> Delete</a>
                        </td>
                      <?php
                    } } ?>
                    
                    <tr>
                  <td>Gecko</td>
                  <td>Firefox 3.0</td>
                  <td>Win 2k+ / OSX.3+</td>
                  <td>1.9</td>
                  <td>A</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Camino 1.0</td>
                  <td>OSX.2+</td>
                  <td>1.8</td>
                  <td>A</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Camino 1.5</td>
                  <td>OSX.3+</td>
                  <td>1.8</td>
                  <td>A</td>
                </tr>                
                <tr>
                  <td>Other browsers</td>
                  <td>All others</td>
                  <td>-</td>
                  <td>-</td>
                  <td>U</td>
                </tr>
                </tbody>                
              </table>
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
<!-- DataTables -->
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#news').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
