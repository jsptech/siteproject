<!DOCTYPE html>
<?php 
include "includes/connection.php";
?>
<html dir="ltr" lang="en">
<head>
<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="School Website" />
<meta name="keywords" content="vidyabhushan" />
<meta name="author" content="JSP" />
<!-- Page Title -->
<title>गृह | मालिका मा.वि.</title>
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
<link href="css/utility-classes.css" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="css/responsive.css" rel="stylesheet" type="text/css">
<!-- Revolution Slider 5.x CSS settings -->
<link  href="js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css"/>
<link  href="js/revolution-slider/css/layers.css" rel="stylesheet" type="text/css"/>
<link  href="js/revolution-slider/css/navigation.css" rel="stylesheet" type="text/css"/>
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
  <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: home -->
    <?php include 'includes/slidersection.php'; ?>
<!-- Section: About -->
  <?php 
  $select_data = mysqli_query($con, "SELECT * FROM contents where PageId = '1'");
  $data=mysqli_fetch_array($select_data);
  ?>
    <section>
      <div class="container pb-70">
        <div class="section-content">
          <div class="row">
            <div class="col-md-5">
              <img class="img-fullwidth maxwidth500" src="images/about/1.png" alt="">
            </div>
            <div class="col-md-7">
              <h2 class="text-uppercasetext-theme-colored mt-0 mt-sm-30">विद्यालयको <span class="text-theme-colored2">परिचय</span></h2>
              <div class="double-line-bottom-theme-colored-2"></div>
              <p style="text-align:justify"><?php echo $data[3];?></p>
              
              <a href="about" class="btn btn-colored btn-theme-colored2 text-white btn-lg pl-40 pr-40 mt-15">पुरा पढ्नुहोस</a>
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
              <h3 class="text-uppercase line-bottom-theme-colored-2 mt-0 line-height-1"><i class="fa fa-calendar mr-10">                
              </i>ताजा सुचाना  <span class="text-theme-colored2">तथा कार्यक्रमहरु</span></h3>
              
              <?php
              require_once('admin/database/news_event.class.php');
              $news_event = new NEWS_EVENT();
              $stmt = $news_event->GetAllNews_Event("SELECT * FROM news_events ORDER BY id DESC limit 0,4");
              $stmt->execute();
              if($stmt->rowCount() > 0)
                  {
                    $sn=1;
                    while($data_news=$stmt->fetch(PDO::FETCH_ASSOC))
                    {  ?>
                      <article>
                      <div class="event-block">
                        <div class="event-date text-center">
                          <ul class="text-white font-16 font-weight-600" style="width:40px; margin-left:-10px">
                            <li class="border-bottom">
                              <?php 
                              foreach($day_array as $key => $day_value)
                              {
                                if($key==substr($data_news['posted_date'],8,2))
                                echo $day_value;
                              } ?>
                            </li>
                            <li class="">
                              <?php 
                                foreach($month_array as $key => $month_value)
                                {
                                  if($key==substr($data_news['posted_date'],5,2))
                                  echo $month_value;
                                } ?>
                            </li>
                          </ul>
                        </div>
                        <div class="event-meta border-1px pl-40" style="width:515px; height:110.317px">
                          <div class="event-content pull-left flip">
                            <h4 class="event-title media-heading font-roboto-slab font-weight-700"><a href="news_detail?id=<?php echo $data_news['id'];?>"><?php echo $data_news['news_title'];?></a></h4>
                            <!--<span class="mb-10 text-gray-darkgray mr-10"><i class="fa fa-clock-o mr-5 text-theme-colored2"></i> at 5.00 pm - 7.30 pm</span>
                            <span class="text-gray-darkgray"><i class="fa fa-map-marker mr-5 text-theme-colored2"></i> 25 Newyork City</span>-->
                            <p class="mt-5"><?php echo $data_news['news_content'];?></p>
                          </div>
                        </div>
                      </div>
                    </article>
                    
                  <?php } } 
                  else echo "<i>News Not posted Yet</i>";                  ?>
                
            </div>
            <?php
            require_once('admin/database/message.class.php');
            $message = new Message();
            $stmt = $message->GetAllMessage("SELECT * FROM messages where post = 'Principal' limit 1");
            $stmt->execute();
            if($stmt->rowCount() > 0)
                  {
                   $data_message=$stmt->fetch(PDO::FETCH_ASSOC)
               
            ?>
            <div class="col-md-6">
              <h3 class="text-uppercase line-bottom-theme-colored-2 line-height-1 mt-0 mt-sm-30"><i class="fa fa-envelope"></i> प्रध्यापकको <span class="text-theme-colored2"> भनाइ</span></h3>
              <p style="text-align:justify;"><img alt="" src="data:image/jpeg;base64,<?php echo base64_encode($data_message['photo']);?>"  width="200" style="float: right; margin-left:10px"><?php echo $data_message['message'];?>
              </p>
              <a href="#" class="btn btn-colored btn-theme-colored2 text-white btn-sm pull-right">Read More</a>
            </div>
                  <?php } ?>
          </div>
        </div>
      </div>
    </section>
    <!-- Divider: Reservation Form -->

    <section class="bg-silver-deep">
      <div class="container pt-70 pb-30">
        <div class="section-title">
          <div class="row">
            <div class="col-md-12">
              <h2 class="text-uppercase title">अभिभावकको <span class="text-theme-colored2"> भनाइ </span>!</h2>              
              
					  	<div class="double-line-bottom-theme-colored-2"></div>
						</div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-12 mb-30">
            <div class="owl-carousel-2col boxed" data-dots="true">
            <?php
            require_once('admin/database/message.class.php');
            $message = new Message();
            $stmt = $message->GetAllMessage("SELECT * FROM messages where post = 'Guardian'");
            $stmt->execute();
            if($stmt->rowCount() > 0)
                  {
                   while($data_message=$stmt->fetch(PDO::FETCH_ASSOC))
                   {
               
            ?>
              <div class="item">
                <div class="testimonial pt-10">
                  <div class="thumb pull-left mb-0 mr-0" style="width:100px; height:100px">                    
                    <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($data_message['photo']).'" class="img-thumbnail img-circle" Width="110px" Height="110px" />'; ?></td>
                  </div>
                  <div class="testimonial-content">
                    <h4 class="mt-0 font-weight-300"><?php echo $data_message['message'];?></h4>
                    <h5 class="mt-10 font-16 mb-0"><?php echo $data_message['full_name'];?></h5>
                    <h6 class="mt-5"><?php echo $data_message['address'];?></h6>
                  </div>
                </div>
              </div>
                   <?php } } ?>
            </div> 
          </div>
        </div>
      </div>
    </section>

    <!-- Section: blog -->
   <section id="reservation" class="parallax layer-overlay overlay-theme-colored-9" data-bg-img="images/bg/bg1.jpg" data-parallax-ratio="0.4">
      <div class="container">
        <div class="row">
          <div class="col-md-8 sm-text-center">
            <h3 class="text-white mt-30 mb-0">Contact for new admission !</h3>
            <h2 class="text-theme-colored2 font-54 mt-0">Request Now!</h2>
            <p class="text-gray-darkgray font-15 pr-90 pr-sm-0 mb-sm-60">
              You can also visit our school at given location.
            </p>
            <div class="row mt-30 sm-text-center">
              <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                <div class="funfact">
                  <i class="pe-7s-smile mb-20 text-theme-colored2"></i>
                  <h2 data-animation-duration="2000" data-value="1150" class="animate-number text-white font-38 font-weight-400 mt-0 mb-15">0</h2>
                  <h5 class="text-white text-uppercase">Happy Students</h5>
                </div>
              </div>
              
              <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                <div class="funfact">
                  <i class="pe-7s-users mb-20 text-theme-colored2"></i>
                  <h2 data-animation-duration="2000" data-value="50" class="animate-number text-white font-38 font-weight-400 mt-0 mb-15">0</h2>
                  <h5 class="text-white text-uppercase">Certified Teachers</h5>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                <div class="funfact">
                  <i class="pe-7s-study mb-20 text-theme-colored2"></i>
                  <h2 data-animation-duration="2000" data-value="1248" class="animate-number text-white font-38 font-weight-400 mt-0 mb-15">0</h2>
                  <h5 class="text-white text-uppercase">Pass Out Students</h5>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
             <div class="p-30 mt-0 bg-dark-transparent-2">
              <h3 class="title-pattern mt-0"><span class="text-white">Request <span class="text-theme-colored2">Information</span></span></h3>
              <!-- Appilication Form Start-->
              <form id="reservation_form" name="reservation_form" class="reservation-form mt-20" method="post" action="#" novalidate="novalidate">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group mb-20">
                      <input placeholder="Enter Name" id="reservation_name" name="reservation_name" required="" class="form-control" aria-required="true" type="text">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group mb-20">
                      <input placeholder="Email" id="reservation_email" name="reservation_email" class="form-control" required="" aria-required="true" type="text">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group mb-20">
                      <input placeholder="Phone" id="reservation_phone" name="reservation_phone" class="form-control" required="" aria-required="true" type="text">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group mb-20">
                      <div class="styled-select">
                        <select id="person_select" name="person_select" class="form-control" required="">
                          <option value="">Choose Subject</option>
                          <option value="1 Person">Software Engineering</option>
                          <option value="2 Person">Computer Science engineering</option>
                          <option value="3 Person">Accounting Technologies</option>
                          <option value="Family Pack">BACHELOR`S DEGREE</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group mb-20">
                      <input name="Date Of Birth" class="form-control required date-picker" placeholder="Date Of Birth" aria-required="true" type="text">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <textarea placeholder="Enter Message" rows="3" class="form-control required" name="form_message" id="form_message" aria-required="true"></textarea>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group mb-0 mt-10">
                      <input name="form_botcheck" class="form-control" value="" type="hidden">
                      <button type="submit" class="btn btn-colored btn-theme-colored2 text-white btn-lg btn-block" data-loading-text="Please wait...">Submit Request</button>
                    </div>
                  </div>
                </div>
              </form>
              <!-- Application Form End-->

              <!-- Application Form Validation Start-->
              <script type="text/javascript">
                $("#reservation_form").validate({
                  submitHandler: function(form) {
                    var form_btn = $(form).find('button[type="submit"]');
                    var form_result_div = '#form-result';
                    $(form_result_div).remove();
                    form_btn.before('&amp;lt;div id="form-result" class="alert alert-success" role="alert" style="display: none;"&amp;gt;&amp;lt;/div&amp;gt;');
                    var form_btn_old_msg = form_btn.html();
                    form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                    $(form).ajaxSubmit({
                      dataType:  'json',
                      success: function(data) {
                        if( data.status == 'true' ) {
                          $(form).find('.form-control').val('');
                        }
                        form_btn.prop('disabled', false).html(form_btn_old_msg);
                        $(form_result_div).html(data.message).fadeIn('slow');
                        setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                      }
                    });
                  }
                });
              </script>
              <!-- Application Form Validation Start -->
              </div>
           </div>
        </div>
      </div>
    </section>
  <!-- end main-content -->
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