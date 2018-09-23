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
  <title> Home | Vidyabhushan</title>
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
              <h2 class="text-theme-colored2 font-36">Contact Us</h2>              
            </div>
          </div>
        </div>
      </div>
  </section>
    
  <section>
      <div class="container pb-50">
        <div class="section-content">
          <div class="row">
            <div class="col-md-6">
              <h4 class="text-uppercase line-bottom-theme-colored-2 mt-0 line-height-1"><i class="fa fa-user"></i> Get in touch with <span class="text-theme-colored2">us !</span></h4>
              <ul>                
                <h4>Our School Location</h4>
                <li>Mohanpur, Kailali-Nepal</li>
                <h4>Contact Number</h4>
                <li>091-575168, 575249</li>
                <h4>Email Address</h4>
                <li>info@vidyabhushan.edu.np</li>                 
              </ul> 
              <!--google map -->
              <div style="height:200px;">

              </div>             
            </div>
            <div class="col-md-6">

              <?php
                 
                 require_once('admin/database/contact_message.class.php');
                  //echo $fine;
                  if(isset($_POST['save']))
                  {
                    
                    $contact_message = new CONTACT_MESSAGE();
                    $full_name = strip_tags($_POST['full_name']);
                    $email = strip_tags($_POST['email']);
                    $contact_no = strip_tags($_POST['contact_no']);
                    $subject = strip_tags($_POST['subject']);  
                    $message_detail = strip_tags($_POST['message']);
                    try
                    {              
                        if($contact_message->save_contact_message($full_name, $email, $contact_no, $subject, $message_detail))
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
              <h4 class="text-uppercase line-bottom-theme-colored-2 mt-0 line-height-1"><i class="fa fa-user"></i> Interested in <span class="text-theme-colored2"> discussing? !</span></h4>
              
              <form id="contact_form" name="contact_form" class="" action="<?Php $_SERVER['PHP_SELF']?>" method="post">

              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Name <small>*</small></label>
                    <input class="form-control" type="text" placeholder="Enter Name" required="" name = "full_name">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Email <small>*</small></label>
                    <input class="form-control required email" type="email" placeholder="Enter Email" name = "email">
                  </div>
                </div>
              </div>
  
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Subject <small>*</small></label>
                    <input class="form-control required" type="text" placeholder="Enter Subject" name = "subject">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Phone</label>
                    <input class="form-control" type="text" placeholder="Enter Phone" name = "contact_no">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Message</label>
                <textarea name="message" class="form-control required" rows="5" placeholder="Enter Message"></textarea>
              </div>
              <div class="form-group">
                <input name="form_botcheck" class="form-control" type="hidden" value="" />
                <button type="submit" name = "save" class="btn btn-dark btn-theme-colored btn-flat mr-5" data-loading-text="Please wait...">Send your message</button>
                <button type="reset" class="btn btn-default btn-flat btn-theme-colored">Reset</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
  </section>
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