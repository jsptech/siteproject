<?php 
    require_once('admin/database/album.class.php');
    $album = new ALBUM();
    $stmt = $album->GetAllAlbum("SELECT * FROM album");
    $stmt->execute();
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
<title>Malika | Gallery</title>
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
              <h2 class="text-theme-colored2 font-36">Gallery</h2>              
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
    <section>
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
            <div class="heading-line-bottom">
               <h4 class="heading-title">एल्बमहरु</h4>               
            </div>
              <!-- Portfolio Gallery Grid -->
              <div id="grid" class="gallery-isotope default-animation-effect masonry grid-4 gutter clearfix">
                <!-- grid sizer for Masonry -->
                <div class="gallery-item gallery-item-sizer"></div>                
                <!-- Portfolio Item Start -->
                <?php 
                  if($stmt->rowCount() > 0)
                  {
                    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                    { ?>
                    <!--<a href="photos?album=<?php// echo $row['id']; ?>">-->
                    <a href="photogallery?album=<?php echo $row['id']; ?>">-->
                      <div class="gallery-item design">
                        <div class="thumb">
                          <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['thumb']).'" class="img-fullwidth" Width="280" Height="155.55" />'; ?>
                          <div class="overlay-shade"></div>
                          <div class="text-holder">
                            <div class="title text-center"><?php echo $row['album_name'] ?></div>
                          </div>                                             
                        </div>
                      </div>
                      </a>
                      <?php
                    }
                  }
                  else
                  {
                    echo '<h5 style="color:red">There are no any album to display !</h5>';
                  }
                ?>                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
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