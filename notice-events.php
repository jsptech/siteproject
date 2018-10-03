<!DOCTYPE html>
<html dir="ltr" lang="en">
<!-- Mirrored from thememascot.net/demo/personal/j/learnpro/v4.0/demo/blog-single-right-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Feb 2018 16:42:39 GMT -->
<head>
<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Learnpro - Education University School Kindergarten Learning HTML Template" />
<meta name="keywords" content="education,school,university,educational,learn,learning,teaching,workshop" />
<meta name="author" content="ThemeMascot" />
<!-- Page Title -->
<title>खबर तथा सुचना | मालिका मा.वि.</title>
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


    <!-- Section: Blog -->
    <section>
      <div class="container mt-30 mb-30 pt-30 pb-30">
        <div class="row">
          <div class="col-md-9">
            <div class="blog-posts single-post">
              <article class="post clearfix mb-0">
                <div class="entry-header">
                  <div class="post-thumb thumb"> <img src="data:image/jpeg;base64,<?php echo base64_encode($data_news['image_file']);?>" alt="" class="img-responsive img-fullwidth"> </div>                  
                </div>
                <div class="entry-content">
                  <div class="entry-meta media no-bg no-border mt-15 pb-20">
                    <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                      <ul>
                        <li class="font-16 text-white font-weight-600">
                            <?php 
                                foreach($day_array as $key => $day_value)
                                {
                                    if($key==substr($data_news['posted_date'],8,2))
                                    echo $day_value;
                                } 
                            ?>
                        </li>
                        <li class="font-12 text-white text-uppercase">
                            <?php 
                                foreach($month_array as $key => $month_value)
                                {
                                  if($key==substr($data_news['posted_date'],5,2))
                                  echo $month_value;
                                } 
                            ?>
                        </li>
                      </ul>
                    </div>
                    <div class="media-body pl-15">
                      <div class="event-content pull-left flip">
                        <h3 class="entry-title text-uppercase pt-0 mt-0"><?php echo $data_news['news_title'] ?></h3>
                        <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-calendar mr-5 text-theme-colored"></i> 
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
                        </span>
                      </div>
                    </div>
                  </div>
                  <p class="mb-15" style="text-align:justify"><?php echo $data_news['news_content'];?></p>
                  
                  <div class="mt-30 mb-0">
                    <h5 class="pull-left flip mt-10 mr-20 text-theme-colored">Share:</h5>
                    <ul class="styled-icons icon-circled m-0">
                      <li><a href="#" data-bg-color="#3A5795"><i class="fa fa-facebook text-white"></i></a></li>
                      <li><a href="#" data-bg-color="#55ACEE"><i class="fa fa-twitter text-white"></i></a></li>
                      <li><a href="#" data-bg-color="#A11312"><i class="fa fa-google-plus text-white"></i></a></li>
                    </ul>
                  </div>
                </div>
              </article>                           
            </div>
          </div>

            <?php } ?> 

          <div class="col-md-3 pull-right">
            <div class="sidebar sidebar-left mt-sm-30">
              <div class="widget">
                <h5 class="widget-title line-bottom">नयाँ सुचना तथा कार्यक्रमहरु</h5>
                <div class="latest-posts">
                    <?php
                        require_once('admin/database/news_event.class.php');
                        $news_event = new NEWS_EVENT();
                        $stmt = $news_event->GetAllNews_Event("SELECT * FROM news_events ORDER BY id DESC");
                        $stmt->execute();
                    ?>
                    <?php
                        if($stmt->rowCount() > 0)
                        {   
                            while($data_news_all=$stmt->fetch(PDO::FETCH_ASSOC))
                            { ?>
                                <article class="post media-post clearfix pb-0 mb-10">
                                    <a class="post-thumb" href="notice-events?id=<?php echo $data_news_all['id'];?>"><img class="img-fullwidth maxwidth500" src="data:image/jpeg;base64,<?php echo base64_encode($data_news_all['image_file']);?>" width="50" height="50" alt=""></a>
                                    <div class="post-right">
                                    <h5 class="post-title mt-0"><a href="notice-events?id=<?php echo $data_news_all['id'];?>"><?php echo substr($data_news_all['news_title'],0,50)."...";?></a></h5>
                                    <p><?php echo substr($data_news_all['news_content'],0,50)."...";?></p>
                                    </div>
                                </article>
                             <?php 
                            }
                        } 
                    ?>
                </div>
              </div>              
            </div>
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
</html>
