<?php
require "db/db.php";
// $loggedin = true;

require_once 'db/config.php';
if(!isset($_SESSION['user_token']) AND !isset($_SESSION['email'])){
    header("location: login.php");
    // die();
  }else{
if(isset($_SESSION['user_token'])){

$sql = "SELECT * FROM user_profile WHERE token = '{$_SESSION['user_token']}'";
$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result) > 0){
    $userinfo = mysqli_fetch_assoc($result);
    
 }
}
else{
    $sql = "SELECT * FROM user_profile WHERE email = '{$_SESSION['email']}' ";
    $result = mysqli_query($con,$sql);

    if(mysqli_num_rows($result) > 0){
        $userinfo = mysqli_fetch_assoc($result);
        $sql4 = "SELECT * FROM user_profile WHERE `email` = '{$_SESSION['email']}'";
$result4 = mysqli_query($con,$sql4);
$data = mysqli_fetch_assoc($result4);
    }
    
  }
}

?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from jobboard.websitelayout.net/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Sep 2022 12:48:02 GMT -->
<head>

    <!-- metas -->
    <meta charset="utf-8">
    <meta name="author" content="Chitrakoot Web" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="keywords" content="Job Portal HTML Template" />
    <meta name="description" content="Job Board - Job Portal HTML Template" />

    <!-- title  -->
    <title>Job Board - Job Portal HTML Template</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="img/logos/favicon.png" />
    <link rel="apple-touch-icon" href="img/logos/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="img/logos/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="img/logos/apple-touch-icon-114x114.png" />

    <!-- plugins -->
    <link rel="stylesheet" href="css/plugins.css" />

    <!-- search css -->
    <link rel="stylesheet" href="search/search.css" />

    <!-- quform css -->
    <link rel="stylesheet" href="quform/css/base.css">

    <!-- core style css -->
    <link href="css/styles.css" rel="stylesheet" />

    <style>
            .footer_row{
    justify-content: center;
    align-items: center;

}

.footer_container{
    padding-bottom: 50px;
}
    </style>

</head>

<body>

    <!-- PAGE LOADING
    ================================================== -->
    <div id="preloader"></div>

    <!-- MAIN WRAPPER
    ================================================== -->
    <div class="main-wrapper">

        <!-- HEADER
        ================================================== -->
        <?php
            include "nav/w_nav.php";
        ?>

        <!-- PAGE TITLE
        ================================================== -->
        <section class="page-title-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center">
                        <h1 class="h2 mb-4">Contact Us</h1>
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="page-title-list">
                                    <ol class="breadcrumb d-inline-block mb-0">
                                        <li class="breadcrumb-item d-inline-block"><a href="#!">Find Opportunities around you!</a></li>
                                       
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CONTACT INFO
        ================================================== -->
     

        <!-- MAP
        ================================================== -->
        <div>
            <iframe class="map-h500" id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14874.614477248362!2d72.87364478571584!3d21.245579823496996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04f4fb5c0b087%3A0xb7aabd8a90da0679!2sMota%20Varachha%2C%20Surat%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1676606701757!5m2!1sen!2sin"></iframe>
        </div>

        <!-- CONTACT FORM
        ================================================== -->
        <section class="bg-very-light-gray">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7 mb-2-2 mb-lg-0">
                        <div class="p-1-6 p-sm-1-9 p-lg-2-2 border border-radius-10 border-color-extra-light-gray bg-white h-100">
                            <h2 class="h3 mb-2-5 text-center text-capitalize">Contact With US</h2>
                            <form class="contact quform" action="https://jobboard.websitelayout.net/quform/contact.php" method="post" enctype="multipart/form-data" onclick="">
                                <div class="quform-elements">
                                    <div class="row">

                                        <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="name">Your Name <span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input class="form-control border-radius-10" id="name" type="text" name="name" placeholder="Your name here" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->

                                        <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="email">Your Email <span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input class="form-control border-radius-10" id="email" type="text" name="email" placeholder="Your email here" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->

                                        <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="subject">Your Subject <span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <input class="form-control border-radius-10" id="subject" type="text" name="subject" placeholder="Your subject here" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->

                                        <!-- Begin Text input element -->
                                        <div class="col-md-6">
                                            <div class="quform-element form-group">
                                                <label for="phone">Contact Number</label>
                                                <div class="quform-input">
                                                    <input class="form-control border-radius-10" id="phone" type="text" name="phone" placeholder="Your phone here" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->

                                        <!-- Begin Textarea element -->
                                        <div class="col-md-12">
                                            <div class="quform-element form-group">
                                                <label for="message">Message <span class="quform-required">*</span></label>
                                                <div class="quform-input">
                                                    <textarea class="form-control border-radius-10" id="message" name="message" rows="3" placeholder="Tell us a few words"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Textarea element -->

                                        <!-- Begin Captcha element -->
                                        <div class="col-md-12">
                                            <div class="quform-element">
                                                <div class="form-group">
                                                    <div class="quform-input">
                                                        <input class="form-control border-radius-10" id="type_the_word" type="text" name="type_the_word" placeholder="Type the below word" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="quform-captcha">
                                                        <div class="quform-captcha-inner">
                                                            <img src="quform/images/captcha/courier-new-light.png" alt="...">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Captcha element -->

                                        <!-- Begin Submit button -->
                                        <div class="col-md-12">
                                            <div class="quform-submit-inner">
                                                <button class="butn border-0" type="submit"><span>Send Message</span></button>
                                            </div>
                                        </div>
                                        <!-- End Submit button -->

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="p-1-6 p-sm-1-9 p-lg-2-2 border border-radius-10 border-color-extra-light-gray bg-white h-100">
                            <h2 class="mb-3 text-capitalize h3 text-center">Our contact detail</h2>
                            <p class="mb-2-2 display-28">Write as some words about your question and we will put together your question for you inside 24 hours and tell you shortly.</p>
                            <div class="d-flex mb-4 pb-3 border-bottom border-color-extra-light-gray">
                                <div class="flex-shrink-0 mt-2">
                                    <i class="fas fa-phone-alt text-primary fs-2"></i>
                                </div>
                                <div class="flex-grow-1 ms-4">
                                    <h3 class="h5 font-weight-500">Phone Number</h3>
                                    <span class="text-muted d-block mb-1">
(+91) 78744 67710</span>

                                </div>
                            </div>
                            <div class="d-flex mb-4 pb-3 border-bottom border-color-extra-light-gray">
                                <div class="flex-shrink-0 mt-2">
                                    <i class="far fa-envelope-open text-primary fs-2"></i>
                                </div>
                                <div class="flex-grow-1 ms-4">
                                    <h3 class="h5 font-weight-500">Email Address</h3>
                                    <span class="text-muted d-block mb-1">
renishsuriya1441@gmail.com</span>
                                   
                                </div>
                            </div>
                            <div class="d-flex mb-4 pb-3 border-bottom border-color-extra-light-gray">
                                <div class="flex-shrink-0 mt-2">
                                    <i class="fas fa-map-marker-alt text-primary fs-2"></i>
                                </div>
                                <div class="flex-grow-1 ms-4">
                                    <h3 class="h5 font-weight-500">Loaction</h3>
                                    <address class="text-muted d-block mb-0 w-md-80 w-xl-70">
mota varachha ,surat</address>
                                </div>
                            </div>
                            <ul class="contact-social-icon">
                                <li>
                                    <a href="#!"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="#!"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#!"><i class="fab fa-youtube"></i></a>
                                </li>
                                <li>
                                    <a href="#!"><i class="fab fa-linkedin-in"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FOOTER
        ================================================== -->
        <footer>
            <div class="container footer_container">
                <div class="row mt-n2-6 footer_row">
                <div class="container border-bottom border-color-light-white py-2-5 py-md-6 mb-6 mb-md-8 mb-lg-10">
                <div class="row justify-content-center align-items-center mt-n1-9">
                    <div class="col-xl-6 mt-1-9">
                        <div class="d-sm-flex align-items-center">
                            <div class="flex-shrink-0 mb-1-6 mb-sm-0">
                                <a href="index.html" class="footer-logo"><img src="img/logos/logo.png" alt="...">Aggregate Agro</a>
                            </div>
                            <div class="flex-grow-1 border-sm-start border-color-light-white ms-sm-4 ps-sm-4 border-width-2">
                                <p class="mb-0 display-30 text-white opacity9 w-lg-95">Create a free account to discover lots of Jobs & Find Opportunities around you!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    <div class="col-sm-6 col-xl-4 mt-2-6">
                        <h3 class="h5 mb-1-6 text-white">Contact Us</h3>
                        <p class="mb-1-6 text-white opacity9">
                            Advertise your jobs to hundreds of thousands of monthly
                            customers and seek 100 CV in our database.
                        </p>
                        <ul class="contact-list">
                            <li class="d-flex">
                                <span class="fa fa-home pe-3 text-white"></span><a href="#!">mota varachha ,surat</a>
                            </li>
                            <li class="d-flex">
                                <span class="fa fa-phone-alt pe-3 text-white"></span><a href="#!">(+91) 78744 67710</a>
                            </li>
                            <li class="d-flex">
                                <span class="fa fa-envelope pe-3 text-white"></span><a
                                    href="#!">renishsuriya1441@gmail.com</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-xl-2 mt-2-6">
                        <div class="ps-md-1-9">
                            <h3 class="h5 mb-1-6 text-white">About us</h3>
                            <ul class="footer-list-style1">
                                <li><a href="aboutus.html">Our Services</a></li>
                                <li><a href="blog-grid.html">Our Client</a></li>
                                <li><a href="how-it-works.html">Our Process</a></li>
                                <li><a href="contact-us.html">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-2 mt-2-6">
                        <div class="ps-md-1-9">
                            <h3 class="h5 mb-1-6 text-white">Social Services</h3>
                            <ul class="footer-list-style1">
                            <li>
                                    <a href="#!"><i class="fab fa-facebook-f"></i> &nbsp; Facebook </a>
                                </li>
                                <li>
                                    <a href="#!"><i class="fab fa-twitter"></i>&nbsp;  twitter </a>
                                </li>
                                <li>
                                    <a href="#!"><i class="fab fa-youtube"></i>&nbsp; youtube </a>
                                </li>
                                <li>
                                    <a href="#!"><i class="fab fa-linkedin-in"></i>&nbsp; linked-in </a>
                                </li>
                            </ul>
                        </div>
                    </div>
               
                </div>
            </div>
        
        </footer>

    </div>

    <!-- BUY TEMPLATE
    ================================================== -->
   
    <!-- start scroll to top -->
    <a href="#!" class="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
    <!-- end scroll to top -->

    <!-- all js include start -->

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- popper js -->
    <script src="js/popper.min.js"></script>

    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>

    <!-- core.min.js -->
    <script src="js/core.min.js"></script>

    <!-- search -->
    <script src="search/search.js"></script>

    <!-- custom scripts -->
    <script src="js/main.js"></script>

    <!-- form plugins js -->
    <script src="quform/js/plugins.js"></script>

    <!-- form scripts js -->
    <script src="quform/js/scripts.js"></script>

    <!-- all js include end -->

</body>


<!-- Mirrored from jobboard.websitelayout.net/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Sep 2022 12:48:03 GMT -->
</html>