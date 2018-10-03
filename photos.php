<?php 
if(isset($_GET['album']))
{
  $id = $_GET['album'];
    require_once('admin/database/photo.class.php');
    $photo = new PHOTO();
    $stmt = $photo->GetAllPhoto("SELECT * FROM photo_store WHERE album_id='$id' ");
    $stmt->execute();
}  
?>
<?php
if(isset($_GET['album']))
{
  $id = $_GET['album'];
  require_once('admin/database/album.class.php');
  $album = new ALBUM();
  $result = $album->GetAllAlbum("SELECT * FROM album WHERE id='$id'");
  $result->execute();
  $albumname=$result->fetch(PDO::FETCH_ASSOC);
}  
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
<!-- Mirrored from thememascot.net/demo/personal/j/learnpro/v4.0/demo/page-gallery-grid-animation.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Feb 2018 16:41:36 GMT -->
<head>
<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Learnpro - Education University School Kindergarten Learning HTML Template" />
<meta name="keywords" content="education,school,university,educational,learn,learning,teaching,workshop" />
<meta name="author" content="ThemeMascot" />
<!-- Page Title -->
<title>फोटोहरु | मालिका मा.वि.</title>
<!-- Favicon and Touch Icons -->
<link href="images/favicon.png" rel="shortcut icon" type="image/png">
<link href="images/apple-touch-icon.png" rel="apple-touch-icon">
<link href="images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
<link href="images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
<link href="images/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">
<!-- Stylesheet -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link href="css/animate.css" rel="stylesheet" type="text/css">
<link href="css/css-plugin-collections.css" rel="stylesheet"/>
<!-- CSS | menuzord megamenu skins -->
<link href="css/menuzord-megamenu.css" rel="stylesheet"/>
<link id="menuzord-menu-skins" href="css/menuzord-skins/menuzord-boxed.css" rel="stylesheet"/>
<!-- CSS | Main style file -->
<link href="css/style-main.css" rel="stylesheet" type="text/css">
<!-- CSS | Preloader Styles -->
<link href="css/preloader.css" rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="css/responsive.css" rel="stylesheet" type="text/css">
<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
<!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->
<!-- CSS | Theme Color -->
<link href="css/colors/theme-skin-color-set2.css" rel="stylesheet" type="text/css">
<!-- external javascripts -->
<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="js/jquery-plugin-collection.js"></script>
</head>
<body class="">
<div id="wrapper" class="clearfix">
  <!-- preloader -->
  <?php include 'includes/preloader.php'; ?>  
  <!-- Header -->
  <header id="header" class="header">
    <?php include 'includes/topheader.php'; ?>
    <?php include 'includes/middleheader.php'; ?>        
    <?php include 'includes/navheader.php'; ?>
  </header>
  <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="images/bg/bg1.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-theme-colored2 font-36">फोटोहरु</h2>              
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12">            
            <div class="heading-line-bottom">
               <h4 class="heading-title">Album Name: <?php echo $albumname['album_name'] ?></h4>
               <a href="gallery" class="btn btn-primary btn-sm">back to Album</a>
            </div>
            <!-- Portfolio Gallery Grid -->
            <div class="gallery-isotope default-animation-effect grid-6 gutter-small clearfix" data-lightbox="gallery">
              <!-- Portfolio Item Start -->
              <?php 
                if($stmt->rowCount() > 0)
                {
                  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                  { ?>
                    <div class="gallery-item">
                      <div class="thumb">
                        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['photo']).'" class="img-fullwidth" Width="188" Height="104.433" />'; ?>
                        <div class="overlay-shade"></div>
                        <div class="text-holder">
                          <div class="title text-center">Sample Title</div>
                        </div>
                        <div class="icons-holder">
                          <div class="icons-holder-inner">
                            <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">                              
                              <a href="data:image/jpeg;base64,<?php echo base64_encode($row['photo']);?>" data-lightbox-gallery="gallery" title="Your Title Here"><i class="fa fa-picture-o"></i></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Portfolio Item End -->
                    <?php
                  }
                }
                else
                {
                  echo '<h5 style="color:red">There are no any photos in this album !</h5>';
                }
              ?>                 
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->

  <!-- Footer -->
  <?php include 'includes/footer.php';?>
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<script src="js/custom.js"></script>

</body>

<!-- Mirrored from thememascot.net/demo/personal/j/learnpro/v4.0/demo/page-gallery-grid-animation.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Feb 2018 16:41:36 GMT -->
</html>