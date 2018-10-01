<?php
require_once('admin/database/staff.class.php');
$staff = new STAFF();
$stmt = $staff->GetAllStaff("SELECT * FROM staffteachers");
$stmt->execute();
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="School web site" />
<meta name="keywords" content="school" />
<meta name="author" content="JSP" />
<!-- Page Title -->
<title>Teachers | Vidhyabhushan</title>
<!-- Favicon and Touch Icons -->
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
              <h2 class="text-theme-colored2 font-36">Teachers</h2>              
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: Team -->
    <!-- Section: Team -->
    <section id="team" class="bg-silver-deep">
      <div class="container pb-40">
        <div class="section-title">
          <div class="row">
            <div class="col-md-12">
              <h2 class="text-uppercase title">Qualified <span class="text-theme-colored2">Teachers</span></h2>              
              <p class="text-uppercase mb-0">We Have Highly Qualified Teachers</p>
					  	<div class="double-line-bottom-theme-colored-2"></div>
						</div>
          </div>
        </div>
        <div class="row mtli-row-clearfix">
          <?php
            if($stmt->rowCount() > 0)
            {
              while($data=$stmt->fetch(PDO::FETCH_ASSOC))
              {?>
                <div class="col-xs-12 col-sm-6 col-md-3">
                  <div class="team-members border-bottom-theme-colored2px text-center maxwidth400 mb-30">
                    <div class="team-thumb">                      
                      <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($data['photo']).'" class="img-fullwidth" Width="275" Height="370" />'; ?></td>
                      <div class="team-overlay"></div>
                      <ul class="styled-icons team-social icon-sm">
                        <li><a href="<?php echo $data['facebook_link']; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-skype"></i></a></li>
                      </ul>
                    </div>
                    <div class="team-details">
                      <h4 class="text-uppercase text-theme-colored font-weight-600 m-5"><?php echo $data['full_name']; ?></h4>
                      <h6 class="text-gray font-13 font-weight-400 line-bottom-centered mt-0"><?php echo $data['designation']; ?></h6>
                      <p class="hidden-md"><?php echo $data['description']; ?></p>
                    </div>
                  </div>
                </div> 
                <?php                
              }
            }
          ?>
                   
        </div>
      </div>
    </section>

    <!-- Divider: Funfact -->
    <section class="layer-overlay overlay-theme-colored-9" data-bg-img="images/bg/bg1.jpg" data-parallax-ratio="0.7">
      <div class="container pt-90 pb-90">
        <div class="row mt-30">
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-smile mb-20 text-theme-colored2"></i>
              <h2 data-animation-duration="2000" data-value="754" class="animate-number text-white font-38 font-weight-400 mt-0 mb-15">0</h2>
              <h5 class="text-white text-uppercase">Happy Students</h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-notebook mb-20 text-theme-colored2"></i>
              <h2 data-animation-duration="2000" data-value="675" class="animate-number text-white font-38 font-weight-400 mt-0 mb-15">0</h2>
              <h5 class="text-white text-uppercase">Approved Courses</h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-users mb-20 text-theme-colored2"></i>
              <h2 data-animation-duration="2000" data-value="675" class="animate-number text-white font-38 font-weight-400 mt-0 mb-15">0</h2>
              <h5 class="text-white text-uppercase">Certified Teachers</h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-study mb-20 text-theme-colored2"></i>
              <h2 data-animation-duration="2000" data-value="1248" class="animate-number text-white font-38 font-weight-400 mt-0 mb-15">0</h2>
              <h5 class="text-white text-uppercase">Graduate Students</h5>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Divider: Testimonials -->
    <section class="bg-silver-deep">
      <div class="container pt-70 pb-30">
        <div class="section-title">
          <div class="row">
            <div class="col-md-12">
              <h2 class="text-uppercase title">What <span class="text-theme-colored2">People </span>Say</h2>              
              <p class="text-uppercase mb-0">Choose Your Desired Course</p>
              <div class="double-line-bottom-theme-colored-2"></div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-30">
            <div class="owl-carousel-2col boxed" data-dots="true">
              <div class="item">
                <div class="testimonial pt-10">
                  <div class="thumb pull-left mb-0 mr-0">
                    <img class="img-thumbnail" alt="" src="images/testimonials/1.jpg" width="130">
                  </div>
                  <div class="testimonial-content">
                    <h4 class="mt-0 font-weight-300">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas vel sint, ut. Quisquam doloremque minus possimus eligendi dolore ad.</h4>
                    <h5 class="mt-10 font-16 mb-0">Catherine Grace</h5>
                    <h6 class="mt-5">CEO apple.inc</h6>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimonial pt-10">
                  <div class="thumb pull-left mb-0 mr-0">
                    <img class="img-thumbnail" alt="" src="images/testimonials/2.jpg" width="130">
                  </div>
                  <div class="testimonial-content">
                    <h4 class="mt-0 font-weight-300">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas vel sint, ut. Quisquam doloremque minus possimus eligendi dolore ad.</h4>
                    <h5 class="mt-10 font-16 mb-0">Catherine Grace</h5>
                    <h6 class="mt-5">CEO apple.inc</h6>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimonial pt-10">
                  <div class="thumb pull-left mb-0 mr-0">
                    <img class="img-thumbnail" alt="" src="images/testimonials/3.jpg" width="130">
                  </div>
                  <div class="testimonial-content">
                    <h4 class="mt-0 font-weight-300">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas vel sint, ut. Quisquam doloremque minus possimus eligendi dolore ad.</h4>
                    <h5 class="mt-10 font-16 mb-0">Catherine Grace</h5>
                    <h6 class="mt-5">CEO apple.inc</h6>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimonial pt-10">
                  <div class="thumb pull-left mb-0 mr-0">
                    <img class="img-thumbnail" alt="" src="images/testimonials/1.jpg" width="130">
                  </div>
                  <div class="testimonial-content">
                    <h4 class="mt-0 font-weight-300">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas vel sint, ut. Quisquam doloremque minus possimus eligendi dolore ad.</h4>
                    <h5 class="mt-10 font-16 mb-0">Catherine Grace</h5>
                    <h6 class="mt-5">CEO apple.inc</h6>
                  </div>
                </div>
              </div>
            </div> 
          </div>
        </div>
      </div>
    </section>    
    <!-- Divider: Clients -->    
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

<!-- Mirrored from thememascot.net/demo/personal/j/learnpro/v4.0/demo/page-teachers-style2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Feb 2018 16:41:35 GMT -->
</html>