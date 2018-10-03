
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="School Website" />
<meta name="keywords" content="vidyabhushan" />
<meta name="author" content="JSP" />
<!-- Page Title -->
<title>खबर तथा सुचना | मालिका मा.वि.</title>
     <!-- Favicon icon-->
<link href="images/favicon.png" rel="shortcut icon" type="image/png">
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
<!-- Revolution Slider 5.x SCRIPTS -->
<script src="js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
<script src="js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>
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
  <!-- Section: inner-header -->
  <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="images/bg/bg1.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-theme-colored2 font-36">खबर तथा सुचना</h2>              
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php
    require_once('admin/database/news_event.class.php');
    $news_event = new NEWS_EVENT();
    if(isset($_GET['id']))
    {
      $id = $_GET['id'];
      $data_news = $news_event->GetNewsById($id);
    ?>
    <section>
      <div class="container pb-70">
        <div class="section-content">
          <div class="row">
            <div class="col-md-5">
              <img class="img-fullwidth maxwidth500" src="data:image/jpeg;base64,<?php echo base64_encode($data_news['image_file']);?>" alt="">
            </div>
            <div class="col-md-7">
              <h2 class="text-uppercasetext-theme-colored mt-0 mt-sm-30"><?php echo $data_news['news_title'];?> <span class="text-theme-colored2"></span></h2>
              <div class="double-line-bottom-theme-colored-2"></div>
                <p style="text-align:justify"><i>
                 <?php 
                  foreach($day_array as $key => $day_value)
                  {
                    if($key==substr($data_news['posted_date'],8,2))
                    echo $day_value;
                  } ?>
                  <?php 
                    foreach($month_array as $key => $month_value)
                    {
                      if($key==substr($data_news['posted_date'],5,2))
                      echo $month_value;
                    } 
                    echo " ,";
                    foreach($year_array as $key => $year_value)
                    {
                      if($key==substr($data_news['posted_date'],0,4))
                      echo $year_value;
                    } 
                    
                    ?>

                </i></p>
                  <p style="text-align:justify"><?php echo $data_news['news_content'];?></p>
                 
              </div>
            </div>
          </div>
        </div>
      </div>
   </section>
                  <?php } ?>
   
   <!-- Section: Vision, -->
  <?php
  require_once('admin/database/news_event.class.php');
  $news_event = new NEWS_EVENT();
  $stmt = $news_event->GetAllNews_Event("SELECT * FROM news_events ORDER BY id DESC");
  $stmt->execute();
  ?>
<section>
  <div class="container pb-50">
    <div class="section-content">
      <div class="row">
      <h2 class="text-uppercase line-bottom-theme-colored-2 mt-0 line-height-1"><i class="fa fa-user"></i>  <span class="text-theme-colored2">सुचना तथा कार्यक्रमहरु !</span></h2>
      <ul style="list-style-type: square; margin-left:66px;">
      <?php
      if($stmt->rowCount() > 0)
        {
          $sn=1;
          while($data_news_all=$stmt->fetch(PDO::FETCH_ASSOC))
          { ?>
          <li><a href="?id=<?php echo $data_news_all['id'];?>"><?php echo $data_news_all['news_title'];?></a></li>
          <?php }} ?>    
      </ul>
      </div>
    </div>
  </div>
</section>

  </div>
  <!-- Footer -->
  <?php include 'includes/footer.php'; ?>
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<script src="js/custom.js"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
      (Load Extensions only on Local File Systems ! 
       The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.video.min.js"></script>

</body>

<!-- Mirrored from thememascot.net/demo/personal/j/learnpro/v4.0/demo/index-mp-layout1.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Feb 2018 16:37:29 GMT -->
</html>