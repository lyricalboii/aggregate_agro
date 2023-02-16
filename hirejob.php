
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
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from jobboard.websitelayout.net/candidate-applied-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Sep 2022 12:48:19 GMT -->
<head>

    <!-- metas -->
    <meta charset="utf-8">
    <meta name="author" content="Chitrakoot Web" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="keywords" content="Job Portal HTML Template" />
    <meta name="description" content="Job Board - Job Portal HTML Template" />

    <!-- title  -->
    <title>Aggregate Agro</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="img/logos/logo.png" />  
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
    
    <link href="css/dashboard.css" rel="stylesheet" />
    <style>
        .list-style li {
            padding-left: 0px;
            margin-left: 0px;
        }
        .list-style li:before {
            position: inherit;
        }
        .list-style li button {
        border-color: rgba(38, 174, 97, 0.1);
        display: block;
        background: rgba(38, 174, 97, 0.1);
        color: #26ae61;
        border-radius: 10px;
        font-size: 15px;
        text-align: center;
        transition: all 300ms ease;
        }
        #hour{
            display: none;
        }
        #fixed{
            display: none;
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

    
    <?php
    include "nav/w_nav.php";
    ?>

<section class="bg-very-light-gray">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 mb-2-2 mb-lg-0">
                <div class="p-1-6 p-sm-1-9 p-lg-2-2 border border-radius-10 border-color-extra-light-gray bg-white h-100" id="actionBlock">
                    <h2 class="h3 mb-2-5 text-center text-capitalize">Your Job details</h2>
                    <form class="contact quform" action="https://jobboard.websitelayout.net/quform/contact.php" method="post" enctype="multipart/form-data" onclick="">
                        <div class="quform-elements">
                            <div class="row">

                                <!-- Begin Text input element -->
                                <div class="col-md-6">
                                    <div class="quform-element form-group">
                                        <label for="name">Your Name <span class="quform-required">*</span></label>
                                        <div class="quform-input">
                                            <input class="form-control border-radius-10" id="name" type="text" name="name" placeholder="Your name here" value="<?php echo $userinfo['fullname']; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Text input element -->

                                <!-- Begin Text input element -->
                                <div class="col-md-6">
                                    <div class="quform-element form-group">
                                        <label for="email">Your Email <span class="quform-required">*</span></label>
                                        <div class="quform-input">
                                            <input class="form-control border-radius-10" id="email" type="text" name="email" placeholder="Your email here" value="<?php echo $userinfo['email']; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Text input element -->

                                <!-- Begin Text input element -->
                                <div class="col-md-12">
                                    <div class="quform-element form-group quform-select-replaced">
                                        <label for="subject">Your Subject (WorkTitle) <span class="quform-required">*</span></label>
                                        <div class="quform-input">
                                            <input class="form-control border-radius-10" id="subject" type="text" name="subject" placeholder="Your subject here" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Text input element -->

                                <!-- Begin Text input element -->
                                <div class="col-md-12">
                                    <div class="quform-element form-group">
                                        <label for="phone">Payment method</label>
                                        <div class="quform-input">
                                            
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pay_method" id="hour_pay" onchange="handleChange1();" required>
                            <label class="form-check-label" for="flexRadioDefault1">
                            Pay by the hour
                        </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pay_method" id="fixed_pay" onchange="handleChange2();" required>
                            <label class="form-check-label" for="flexRadioDefault2">
                            Pay fixed price
                        </label>
                        </div>
                    
                                        </div>
                                    </div>
                                </div>
                                <!-- End Text input element -->

                                
                                
                                <div class="col-md-12" id="hour" >
                                    <div class="quform-element form-group quform-select-replaced">
                                        <label for="subject">Enter the Ammount / Hour <span class="quform-required">*</span></label>
                                        <div class="quform-input">
                                            <input class="form-control border-radius-10" id="hour_price" type="number" name="hour_price" placeholder="Ammount / Hour">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" id="fixed">
                                    <div class="quform-element form-group quform-select-replaced">
                                        <label for="subject">Enter Your fixed Ammount <span class="quform-required">*</span></label>
                                        <div class="quform-input">
                                            <input class="form-control border-radius-10" id="fix_price" type="number" name="fix_price" placeholder="Your budget" >
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Begin Textarea element -->
                                <div class="col-md-12">
                                    <div class="quform-element form-group">
                                        <label for="message">Description <span class="quform-required">*</span></label>
                                        <div class="quform-input">
                                            <textarea class="form-control border-radius-10" id="message" name="message" rows="3" placeholder="Tell us a few words" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Textarea element -->


                                <!-- Begin Captcha element -->
                                <!-- <div class="col-md-12">
                                    <div class="quform-element">
                                        <div class="form-group">
                                            <div class="quform-input">
                                                <input class="form-control border-radius-10" id="type_the_word" type="text" name="type_the_word" placeholder="Type the below word">
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
                                </div> -->
                                <!-- End Captcha element -->

                                <!-- Begin Submit button -->
                                <div class="col-md-12">
                                    <div class="quform-submit-inner">
                                    <div id="btn_loader" style="display: none;">  
                                            <img src="img/gif/load.gif" alt="" style="height: 3rem;width: 3rem;">
                                    </div>
                                        <button class="butn border-0 post_project" type="submit" id="post_project"><span>Yes, post my work</span></button>
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
                            <span class="text-muted d-block mb-1">(+44) 123 456 789</span>

                        </div>
                    </div>
                    <div class="d-flex mb-4 pb-3 border-bottom border-color-extra-light-gray">
                        <div class="flex-shrink-0 mt-2">
                            <i class="far fa-envelope-open text-primary fs-2"></i>
                        </div>
                        <div class="flex-grow-1 ms-4">
                            <h3 class="h5 font-weight-500">Email Address</h3>
                            <span class="text-muted d-block mb-1">info@example.com</span>
                            <span class="text-muted">info@domain.com</span>
                        </div>
                    </div>
                    <div class="d-flex mb-4 pb-3 border-bottom border-color-extra-light-gray">
                        <div class="flex-shrink-0 mt-2">
                            <i class="fas fa-map-marker-alt text-primary fs-2"></i>
                        </div>
                        <div class="flex-grow-1 ms-4">
                            <h3 class="h5 font-weight-500">Loaction</h3>
                            <address class="text-muted d-block mb-0 w-md-80 w-xl-70">66 Guild Street 512B, Great North Town.</address>
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
        <footer class="pt-0">
            <div class="container border-bottom border-color-light-white py-2-5 py-md-6 mb-6 mb-md-8 mb-lg-10">
                <div class="row justify-content-center align-items-center mt-n1-9">
                    <div class="col-xl-6 mt-1-9">
                        <div class="d-sm-flex align-items-center">
                            <div class="flex-shrink-0 mb-1-6 mb-sm-0">
                                <a href="index.html" class="footer-logo"><img src="img/logos/logo-white.png" alt="..."></a>
                            </div>
                            <div class="flex-grow-1 border-sm-start border-color-light-white ms-sm-4 ps-sm-4 border-width-2">
                                <p class="mb-0 display-30 text-white opacity9 w-lg-95">Create a free account to discover lots of Jobs & Career Opportunities around you!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 mt-1-9">
                        <div class="row">
                            <div class="col-sm-4 mb-1-9 mb-sm-0">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img src="img/icons/icon-09.png" alt="...">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h3 class="h2 mb-1 countup font-weight-700 text-white">1327</h3>
                                        <p class="mb-0 font-weight-600 text-white opacity9 display-30">Job Posted</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 mb-1-9 mb-sm-0">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img src="img/icons/icon-10.png" alt="...">
                                    </div>
                                    <div class="flex-grow-1 ms-4">
                                        <h3 class="h2 mb-1 countup font-weight-700 text-white">150</h3>
                                        <p class="mb-0 font-weight-600 text-white opacity9 display-30">Job Filled</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img src="img/icons/icon-11.png" alt="...">
                                    </div>
                                    <div class="flex-grow-1 ms-4">
                                        <h3 class="h2 mb-1 countup font-weight-700 text-white">220</h3>
                                        <p class="mb-0 font-weight-600 text-white opacity9 display-30">Companies</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row mt-n2-6">
                    <div class="col-sm-6 col-lg-3 mt-2-6">
                        <h3 class="h5 mb-1-6 mb-lg-1-9 text-white">Contact Us</h3>
                        <p class="mb-1-6 text-white opacity9">Advertise your jobs to hundreds of thousands of monthly customers and seek 15.8 million CV in our database.</p>
                        <ul class="contact-list">
                            <li class="d-flex"><span class="fa fa-home pe-3 text-white"></span><a href="#!">66 Guild Street 512B, Great North Town.</a></li>
                            <li class="d-flex"><span class="fa fa-phone-alt pe-3 text-white"></span><a href="#!">(+44) 123 456 789</a></li>
                            <li class="d-flex"><span class="fa fa-envelope pe-3 text-white"></span><a href="#!">info@example.com</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-lg-2 mt-2-6">
                        <div class="ps-sm-1-9">
                            <h3 class="h5 mb-1-6 mb-lg-1-9 text-white">Information</h3>
                            <ul class="footer-list-style1">
                                <li><a href="aboutus.html">About us</a></li>
                                <li><a href="blog-grid.html">Blog</a></li>
                                <li><a href="how-it-works.html">Our Process</a></li>
                                <li><a href="pricing-plans.html">Our Pricing</a></li>
                                <li><a href="contact-us.html">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-2 mt-2-6">
                        <div class="ps-lg-1-9">
                            <h3 class="h5 mb-1-6 mb-lg-1-9 text-white">Candidates</h3>
                            <ul class="footer-list-style1">
                                <li><a href="candidate-applied-job.html">Applied Job</a></li>
                                <li><a href="candidate-cv-manager.html">CV Manager</a></li>
                                <li><a href="candidate-shortlisted-jobs.html">Shortlisted Jobs</a></li>
                                <li><a href="candidate-job-alerts.html">Job Alerts</a></li>
                                <li><a href="candidate-dashboard.html">Dashboard</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-2 mt-2-6">
                        <div class="ps-sm-1-9 ps-lg-2-2 ps-xl-2-5">
                            <h3 class="h5 mb-1-6 mb-lg-1-9 text-white">Employers</h3>
                            <ul class="footer-list-style1">
                                <li><a href="employer-packages.html">Job Packages</a></li>
                                <li><a href="employer-company-profile.html">Company Profile</a></li>
                                <li><a href="employer-manage-job.html">Manage Job</a></li>
                                <li><a href="employer-resume-alerts.html">Resume Alerts</a></li>
                                <li><a href="employer-post-job.html">Post a Job</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mt-2-6">
                        <div class="ps-lg-2-2 ps-xl-2-5">
                            <h3 class="h5 mb-1-6 mb-lg-1-9 text-white">Join Newsletter</h3>
                            <p class="text-white mb-4">Subscribe to get the latest jobs posted, candidates...</p>
                            <form class="quform newsletter-form" action="https://jobboard.websitelayout.net/quform/newsletter-two.php" method="post" enctype="multipart/form-data" onclick="">
                                <div class="quform-elements">
                                    <div class="row">
                                        <!-- Begin Text input element -->
                                        <div class="col-md-12">
                                            <div class="quform-element">
                                                <div class="quform-input">
                                                    <input class="form-control" id="email_address" type="text" name="email_address" placeholder="Subscribe with us" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->

                                        <!-- Begin Submit button -->
                                        <div class="col-md-12">
                                            <div class="quform-submit-inner">
                                                <button class="btn btn-white text-primary m-0" type="submit"><span><i class="fas fa-paper-plane text-primary"></i></span></button>
                                            </div>
                                            <div class="quform-loading-wrap text-start"><span class="quform-loading"></span></div>
                                        </div>
                                        <!-- End Submit button -->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bar borders-top border-color-light-white">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 text-center text-md-start mt-3 mt-md-0 order-2 order-md-1">
                            <p class="d-inline-block text-white mb-0">&copy; <span class="current-year"></span> Job Board Powered by
                                <a href="https://www.chitrakootweb.com/" target="_blank" class="text-primary white-hover">Chitrakoot Web</a>
                                
                            </p>
                        </div>
                        <div class="col-md-5 text-center text-md-end order-1 order-md-2">
                            <p class="text-white d-inline-block mb-0 align-middle">Follow Us :</p>
                            <ul class="footer-social-style1">
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
        </footer>

    </div>
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
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
 function handleChange1(){
     document.getElementById("fixed").style.display = 'none'
     if(document.getElementById("hour").style.display = 'none'){
         document.getElementById("hour").style.display = 'inline';
         document.getElementById("hour").setAttribute("required","true");


    }else{
        document.getElementById("hour").style.display = 'none';
        document.getElementById("hour").setAttribute("required","false");
    }
 }
 function handleChange2(){
    document.getElementById("hour").style.display = 'none'
    if(document.getElementById("fixed").style.display = 'none'){
        document.getElementById("fixed").style.display = 'inline'
        document.getElementById("fixed").setAttribute("required","true");

    }else{
        document.getElementById("fixed").style.display = 'none';
        document.getElementById("fixed").removeAttribute("required");
        document.getElementById("fixed").setAttribute("required","false");

    }
 }
</script>


<script>
        $(document).on('click', '.post_project', function (e) {
            e.preventDefault();

            
                var student_id1 = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "post_job.php",
                    data: {
                        'name': $('#name').val(),
                        'email': $('#email').val(),
                        'subject': $('#subject').val(),
                        'hour_price': $('#hour_price').val(),
                        'fix_price': $('#fix_price').val(),
                        'message': $('#message').val(),
                        
                    },
                    beforeSend: function(){
                        $("#btn_loader").css("display", "block");
                        $("#post_project").css("display", "none");
                    },
                    
                    complete: function(){

                        $("#btn_loader").css("display", "none");
                        $("#post_project").css("display", "block");

                    },
                    success: function (response) {

                        var res = jQuery.parseJSON(response);
                        if(res.status == 500) {
                            console.log("error");
                        }else{
                            

                            console.log("success");
                            
                        }
                    }
                    
                });
        });
       

    </script>

</body>


<!-- Mirrored from jobboard.websitelayout.net/candidate-applied-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Sep 2022 12:48:19 GMT -->
</html>
