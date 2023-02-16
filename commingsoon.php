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
$id = $data['uid'];
$_SESSION['sendfrom'] =$id;
    }
    
  }
}

?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from jobboard.websitelayout.net/index-02.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Sep 2022 12:46:46 GMT -->

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

    <style>
    a.navbar-brand.logodefault {
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 20px;
        font-family: cursive;
    }

    .profile_img {
        width: 100%;
        max-width: 50px;
    }

    .job_offer {
        overflow: scroll;
        height: 100vh;
        overflow-x: hidden;
    }

    .farmer_con {
        position: relative;
        left: -30px;
        top: 30px;
    }

    .farmer_con ul {

        display: flex;
        list-style: none;
        gap: 20px;

        font-size: 18px;

    }

    a.footer-logo {
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 20px;
        color: white;
        font-family: cursive;
    }

    .footer_info {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    i.fa.fa-search {
        font-size: 20px;
    }

    main {
        width: 100%;
        min-height: 100vh;
        overflow: hidden;
        background-color: #e9e9e9;
        padding: 2rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .containerr {
        width: 26vmin;
        height: 22vmin;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        padding: 1em 0;
        position: relative;
        font-size: 16px;
        border-radius: 0.5em;
        background-color: #353636;
        margin-left: 9px;
        background-image: url(img/bg/5.jpg);
        background-position: center;
        background-size: cover;
        background-blend-mode: overlay;
    }

    @media (max-width: 850px) {
        .box {
            height: 420px;
            max-width: 550px;
            overflow: auto;
            overflow-x: hidden;
        }
    }

    .login-with-google-btn {
        text-align: center;
        display: inline-block;
        width: 100%;
        height: 43px;
        background-color: #151111;
        color: #fff;
        border: none;
        cursor: pointer;
        border-radius: 0.8rem;
        font-size: 0.8rem;
        margin-bottom: 1rem;
        transition: 0.3s;
        transition: background-color .3s, box-shadow .3s;
        padding: 12px 16px 12px 42px;
        border: none;
        border-radius: 3px;
        box-shadow: 0 -1px 0 rgb(0 0 0 / 4%), 0 1px 1px rgb(0 0 0 / 25%);
        color: #757575;
        font-size: 14px;
        font-weight: 500;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
        background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48cGF0aCBkPSJNMTcuNiA5LjJsLS4xLTEuOEg5djMuNGg0LjhDMTMuNiAxMiAxMyAxMyAxMiAxMy42djIuMmgzYTguOCA4LjggMCAwIDAgMi42LTYuNnoiIGZpbGw9IiM0Mjg1RjQiIGZpbGwtcnVsZT0ibm9uemVybyIvPjxwYXRoIGQ9Ik05IDE4YzIuNCAwIDQuNS0uOCA2LTIuMmwtMy0yLjJhNS40IDUuNCAwIDAgMS04LTIuOUgxVjEzYTkgOSAwIDAgMCA4IDV6IiBmaWxsPSIjMzRBODUzIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBkPSJNNCAxMC43YTUuNCA1LjQgMCAwIDEgMC0zLjRWNUgxYTkgOSAwIDAgMCAwIDhsMy0yLjN6IiBmaWxsPSIjRkJCQzA1IiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBkPSJNOSAzLjZjMS4zIDAgMi41LjQgMy40IDEuM0wxNSAyLjNBOSA5IDAgMCAwIDEgNWwzIDIuNGE1LjQgNS40IDAgMCAxIDUtMy43eiIgZmlsbD0iI0VBNDMzNSIgZmlsbC1ydWxlPSJub256ZXJvIi8+PHBhdGggZD0iTTAgMGgxOHYxOEgweiIvPjwvZz48L3N2Zz4=);
        background-color: white;
        background-repeat: no-repeat;
        background-position: 12px 11px;
    }

    &:hover {
        box-shadow: 0 -1px 0 rgba(0, 0, 0, .04), 0 2px 4px rgba(0, 0, 0, .25);
    }

    &:active {
        background-color: #eeeeee;
    }

    &:focus {
        outline: none;
        box-shadow:
            0 -1px 0 rgba(0, 0, 0, .04),
            0 2px 4px rgba(0, 0, 0, .25),
            0 0 0 3px #c8dafc;
    }

    a {
        text-decoration: none;
    }

    .inner-box {
        background: white;
    }

    .whimg1 {
        max-height: 480px;
        height: 100%;
        width: 100%;
        max-width: 360px;
    }

    .whimg2 {
        max-height: 330px;
        height: 100%;
        width: 100%;
        max-width: 320px;
    }

    .whimg3 {
        max-height: 330px;
        height: 100%;
        width: 100%;
        max-width: 320px;
    }

    .banner2 .job-search-form button {
        height: 46px;
        padding: 12px 20px;
        border-radius: 5px;
        width: 100%;
        display: inline-block;
        transition: .3s;
        line-height: 17px;
    }

    .farmer_con {
        position: relative;
        left: -30px;
        top: 30px;
    }

    .farmer_con ul {

        display: flex;
        list-style: none;
        gap: 20px;

        font-size: 18px;

    }

    .fprofile_btn {
        width: 100%;
        max-width: 160px;
        margin-top: 15px;

    }

    .fprofile_btn2 {
        width: 100%;
        max-width: 160px;
        margin-top: 30px;
    }

    .fprofile_btn3 {
        width: 100%;
        max-width: 160px;
        margin-top: 30px;
    }
   
    </style>

</head>

<body>

    <!-- PAGE LOADING
    ================================================== -->

    <!-- MAIN WRAPPER
    ================================================== -->
    <div class="main-wrapper">
        <?php
        include "nav/w_nav.php";
    ?>

    <div class="container" style="    height: 97%;
    padding: 30%;    text-align: center;">
        <h2>Comming soon..</h2>
    </div>



 <!-- FOOTER
        ================================================== -->
        <footer class="bg-light">
            <div class="container">
                <div class="row mt-n2-6">
                    <div class="col-sm-6 col-lg-5 mt-2-6">
                        <a href="#!" class="footer-logo"><img src="img/logos/logo.png" class="mb-1-6" alt="..."></a>
                        <p>Advertise your jobs to hundreds of thousands of monthly customers and seek 15.8 million CV in
                            our database.</p>
                        <ul class="contact-list black">
                            <li class="d-flex"><span class="fa fa-home pe-3"></span><a href="#!">66 Guild Street 512B,
                                    Great North Town.</a></li>
                            <li class="d-flex"><span class="fa fa-phone-alt pe-3"></span><a href="#!">(+44) 123 456
                                    789</a></li>
                            <li class="d-flex"><span class="fa fa-envelope pe-3"></span><a
                                    href="#!">info@example.com</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-lg-2 offset-lg-1 mt-2-6">
                        <div class="ps-sm-1-6 ps-lg-0">
                            <h3 class="h5 mb-1-6 mb-lg-1-9">Information</h3>
                            <ul class="footer-list-style2">
                                <li><a href="aboutus.html">About us</a></li>
                                <li><a href="blog-grid.html">Blog</a></li>
                                <li><a href="how-it-works.html">Our Process</a></li>
                                <li><a href="pricing-plans.html">Our Pricing</a></li>
                                <li><a href="contact-us.html">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-2 mt-2-6">
                        <h3 class="h5 mb-1-6 mb-lg-1-9">Candidates</h3>
                        <ul class="footer-list-style2">
                            <li><a href="candidate-applied-job.html">Applied Job</a></li>
                            <li><a href="candidate-cv-manager.html">CV Manager</a></li>
                            <li><a href="candidate-shortlisted-jobs.html">Shortlisted Jobs</a></li>
                            <li><a href="candidate-job-alerts.html">Job Alerts</a></li>
                            <li><a href="candidate-dashboard.html">Dashboard</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-lg-2 mt-2-6">
                        <div class="ps-sm-1-6 ps-lg-0">
                            <h3 class="h5 mb-1-6 mb-lg-1-9">Employers</h3>
                            <ul class="footer-list-style2">
                                <li><a href="employer-packages.html">Job Packages</a></li>
                                <li><a href="employer-company-profile.html">Company Profile</a></li>
                                <li><a href="employer-manage-job.html">Manage Job</a></li>
                                <li><a href="employer-resume-alerts.html">Resume Alerts</a></li>
                                <li><a href="employer-post-job.html">Post a Job</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bar bg-white">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <p class="d-inline-block mb-0">&copy; <span class="current-year"></span> Easy Farming
                                <a href="https://www.chitrakootweb.com/" target="_blank"
                                    class="text-primary secondary-hover">Aggregate Agro</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
