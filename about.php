
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
<title>Home | Vidyabhushan</title>
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
              <h2 class="text-theme-colored2 font-36">About us</h2>              
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php
      require_once('admin/database/content.class.php');
      $content = new CONTENT();
      $stmt = $content->GetAllContent("SELECT * FROM contents where Pageid=2");
      $stmt->execute();
      $data_content=$stmt->fetch(PDO::FETCH_ASSOC)


    ?>
    <!-- Section: About -->
    <section>
      <div class="container pb-70">
        <div class="section-content">
          <div class="row">
            <div class="col-md-5">
              <img class="img-fullwidth maxwidth500" src="data:image/jpeg;base64,<?php echo base64_encode($data_content['photo']);?>" alt="">
            </div>
            <div class="col-md-7">
              <h2 class="text-uppercasetext-theme-colored mt-0 mt-sm-30">About US<span class="text-theme-colored2"></span></h2>
              <div class="double-line-bottom-theme-colored-2"></div>
                 
                  <p style="text-align:justify"><?php echo $data_content['Description'];?></p>
                <!--  <p style="text-align:justify">The institution was founded with the pledge to meet the demand of time on the field of education by imparting modern, technical, scientific and vocational method of education. The school got its affiliation form the government of Nepal, District Education Office (DEO), Kailali in 2064 to run classes in English medium. The organization has been imparting result oriented and practical based education under new management since 2072.</p>
                  <p style="text-align:justify">So far its location is concerned; it is at Mohanpur, on the main highway to Dhangadhi covering its area of 3 bigha land, perhaps the largest area among any private institute in Kailali.</p>
                  <p style="text-align:justify">The institution has been established following the norms of modern education. The facilities related to transportation, canteen, library, computer lab, science lab, visual classes, Midas e-class, day hostel and night hostel and the like are basic provision. Similary, for the ECA the institution has one well managed football ground, volleyball court, badminton court, table tennis board, auditorium hall etc.Most importantly; the institution is set up with a vision to run itself in a fully residential mode.</p>
                 --> 
              </div>
            </div>
          </div>
        </div>
      </div>
   </section>
   
   
   <!-- Section: Vision, --><!--
  <section>
      <div class="container pb-50">
        <div class="section-content">
          <div class="row">
            <div class="col-md-6">
              <h4 class="text-uppercase line-bottom-theme-colored-2 mt-0 line-height-1"><i class="fa fa-eye"></i> Our <span class="text-theme-colored2">Vision !</span></h4>
              <p>Our vision is to produce that competitive and efficient manpower in the world where they can lead rather than follow.</p>
              </br>
              <h4 class="text-uppercase line-bottom-theme-colored-2 mt-0 line-height-1"><i class="fa fa-eye"></i> Our <span class="text-theme-colored2">Mission !</span></h4>
              <p>Our mission is to impart qualitative modern education to all the children of the nation with instilling norms of leaderships on student from the moment they are enrolled in the institution irrespective of cast, creed, color, position and religion.</p>
            </div>
            <div class="col-md-6">
              <h4 class="text-uppercase line-bottom-theme-colored-2 mt-0 line-height-1"><i class="fa fa-user"></i> School <span class="text-theme-colored2">Uniform !</span></h4>
              <ul style="list-style-type: square;">
                <li>Green lining shirt and green pant/skirt.</li>
                <li>Blue Trouser and T- Shirt with yellow linening.</li>
                <li>Black leather shoes with blue socks.</li>
                <li>White shoes with white socks</li>
                <li>Ribbon (for girls)-Green (Except Tuesday and Friday)</li>
                <li>Ribbon (for girls) (According to the house color ,only on Tuesday and Friday)</li>
                <h4>Note</h4>
                <li>Tie, belt, ID card school's diary, are available in the school.</li>
                <li>Every Tuesday and Friday it is compulsory to wear Trouser and T-shirt to all the students.</li>
                <li>The girl must wear house ribbon.</li>
                <li>No students will be allowed to sit in the class without proper uniform.</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
  </section>
  <!-- end main-content --><!--
<section>
  <div class="container pb-50">
    <div class="section-content">
      <div class="row">
      <h4 class="text-uppercase line-bottom-theme-colored-2 mt-0 line-height-1"><i class="fa fa-user"></i> Academic <span class="text-theme-colored2">Rules !</span></h4>
      <ul style="list-style-type: square;">
        <li>The new admission session starts from Baisakh.</li>
        <li>Admission is usually held in the month of Baisakh or as informed by the union. (PABSON).</li>
        <li>No candidates will be admitted except or an application in the prescribed form available at the school office in time of admission.</li>
        <li>Admission forms will be distributed from the first week of Baisakh.</li>
        <li>Admission for others and benefitted Students' Transfer Certificate & Mark-Sheet from recognized school is to be attached and submitted with the admission form.</li>
        <li>New pupils must be introduced by their parents or guardian who will be respectable for their conduct, behavior and fees.</li>
        <li>Parents are requested to submit the birth certificate to admit in pre-primary level. They will be admitted to their age. The minimum age required for Nursery is 3.5 years and school set.</li>
        <li>Children from unrecognized school will be examined in any case and may be admitted if they are found fit.</li>
        <li>Admission form L.K.G to above class is made after entrance and entrance date will be fixed by the school administration.</li>
        <li>The entrance test will be held in the main subjects like English, Maths, Nepali, Science & Social-Studies etc.</li>
        <li>A student who is not formally admitted to the school will not be allowed to attend class even provisionally.</li>
        <li>The right of admission and every academic work to school is reserved.</li>
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