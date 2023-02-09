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
<!-- Mirrored from jobboard.websitelayout.net/index-04.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Sep 2022 12:47:41 GMT -->

<head>
    <!-- metas -->
    <meta charset="utf-8" />
    <meta name="author" content="Chitrakoot Web" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="keywords" content="Aggrotech" />
    <meta name="description" content="Aggregate Agro" />

    <!-- title  -->
    <title>Aggregate Agro</title>
    <style>
    img.rounded-circle {
        width: 50px;
        height: 45px;
    }

    .rounded-circle {
        border-radius: 50% !important;
    }

    .section_1{
        background-repeat: no-repeat;
    background-position: inherit;
    background-size: cover;
    }



.avatar_req{
    width: 15%;
    max-width: 100%;
    position: relative;
    left: 160px;
}
    </style>

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
    <link rel="stylesheet" href="quform/css/base.css" />

    <!-- core style css -->
    <link href="css/styles.css" rel="stylesheet" />
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
        include "nav.php";
        ?>

        <!-- BANNER
        ================================================== -->
        <section class="top-position1 bg-img pt-18 pt-md-20 pt-lg-24 pb-6 pb-md-10 section_1 " data-overlay-dark="2"
            data-background="img/bg/index4bg_01.jpeg">
            <div class="container pb-sm-6 pb-md-8 pb-lg-12">
                <div class="row align-items-center justify-content-center text-center pt-sm-7">
                    <div class="col-xl-9 col-xxl-7 mb-1-9 mb-lg-0">
                        <div>
                            <h1 class="text-white display-sm-14 display-lg-10">
                                Find The Best Worker
                            </h1>
                        </div>
                        <div class="banner-4-form mb-2-9">
                            <form action="#!">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="worker, Keyword"
                                        aria-label="Job title, Keyword" aria-describedby="button-addon2" />
                                    <button class="butn" type="button" id="button-addon2">
                                        Find
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- Job Search Form -->
                        <!-- Popular Search -->
                        <div class="row">
                            <div class="col-lg-12"></div>
                        </div>
                        <!-- End Popular Search -->
                    </div>
                </div>
            </div>
        </section>

        <!-- RECENT JOBS
        ================================================== -->
        <section>
            <div class="container">
                <div class="section-heading4">
                    <span>Worker</span>
                    <h2>Latest job request</h2>
                </div>
                <div class="recent-jobs owl-carousel owl-theme">
                    <div class="card card-style10">
                        <div class="card-body">
                            <!-- <span class="popular-jobs-status">Full Time</span> -->
                       
                            <div class="popular-jobs-box avatar_req">
                                <img class="mb-4 border-radius-10 " src="img/avatar/user.png" alt="..." />
                                </div>

                                <div>
                                <h4 class="h5">
                                    <a href="job-details.html">Security Ltd.</a>
                                </h4>
                               
                            </div>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="fas fa-map-marker-alt pe-2 text-secondary"></i>Canada</span>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="far fa-clock pe-2 text-secondary"></i>$25K</span>
                            <span><i class="ti-briefcase pe-2 text-secondary"></i>5 year</span>
                        </div>
                        <a href="job-details.html" class="butn butn-apply">View Profile</a>
                    </div>

                    <div class="card card-style10">
                        <div class="card-body">
                            <!-- <span class="popular-jobs-status">Full Time</span> -->
                       
                            <div class="popular-jobs-box avatar_req">
                                <img class="mb-4 border-radius-10 " src="img/avatar/user.png" alt="..." />
                                </div>

                                <div>
                                <h4 class="h5">
                                    <a href="job-details.html">Security Ltd.</a>
                                </h4>
                               
                            </div>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="fas fa-map-marker-alt pe-2 text-secondary"></i>Canada</span>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="far fa-clock pe-2 text-secondary"></i>$25K</span>
                            <span><i class="ti-briefcase pe-2 text-secondary"></i>5 year</span>
                        </div>
                        <a href="job-details.html" class="butn butn-apply">View Profile</a>
                    </div>

                    <div class="card card-style10">
                        <div class="card-body">
                            <!-- <span class="popular-jobs-status">Full Time</span> -->
                       
                            <div class="popular-jobs-box avatar_req">
                                <img class="mb-4 border-radius-10 " src="img/avatar/user.png" alt="..." />
                                </div>

                                <div>
                                <h4 class="h5">
                                    <a href="job-details.html">Security Ltd.</a>
                                </h4>
                               
                            </div>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="fas fa-map-marker-alt pe-2 text-secondary"></i>Canada</span>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="far fa-clock pe-2 text-secondary"></i>$25K</span>
                            <span><i class="ti-briefcase pe-2 text-secondary"></i>5 year</span>
                        </div>
                        <a href="job-details.html" class="butn butn-apply">View Profile</a>
                    </div>

                    <div class="card card-style10">
                        <div class="card-body">
                            <!-- <span class="popular-jobs-status">Full Time</span> -->
                       
                            <div class="popular-jobs-box avatar_req">
                                <img class="mb-4 border-radius-10 " src="img/avatar/user.png" alt="..." />
                                </div>

                                <div>
                                <h4 class="h5">
                                    <a href="job-details.html">Security Ltd.</a>
                                </h4>
                               
                            </div>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="fas fa-map-marker-alt pe-2 text-secondary"></i>Canada</span>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="far fa-clock pe-2 text-secondary"></i>$25K</span>
                            <span><i class="ti-briefcase pe-2 text-secondary"></i>5 year</span>
                        </div>
                        <a href="job-details.html" class="butn butn-apply">View Profile</a>
                    </div>

                    <div class="card card-style10">
                        <div class="card-body">
                            <!-- <span class="popular-jobs-status">Full Time</span> -->
                       
                            <div class="popular-jobs-box avatar_req">
                                <img class="mb-4 border-radius-10 " src="img/avatar/user.png" alt="..." />
                                </div>

                                <div>
                                <h4 class="h5">
                                    <a href="job-details.html">Security Ltd.</a>
                                </h4>
                               
                            </div>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="fas fa-map-marker-alt pe-2 text-secondary"></i>Canada</span>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="far fa-clock pe-2 text-secondary"></i>$25K</span>
                            <span><i class="ti-briefcase pe-2 text-secondary"></i>5 year</span>
                        </div>
                        <a href="job-details.html" class="butn butn-apply">View Profile</a>
                    </div>

                    <div class="card card-style10">
                        <div class="card-body">
                            <!-- <span class="popular-jobs-status">Full Time</span> -->
                       
                            <div class="popular-jobs-box avatar_req">
                                <img class="mb-4 border-radius-10 " src="img/avatar/user.png" alt="..." />
                                </div>

                                <div>
                                <h4 class="h5">
                                    <a href="job-details.html">Security Ltd.</a>
                                </h4>
                               
                            </div>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="fas fa-map-marker-alt pe-2 text-secondary"></i>Canada</span>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="far fa-clock pe-2 text-secondary"></i>$25K</span>
                            <span><i class="ti-briefcase pe-2 text-secondary"></i>5 year</span>
                        </div>
                        <a href="job-details.html" class="butn butn-apply">View Profile</a>
                    </div>

                    
                    <!-- <div class="card card-style10">
                        <div class="card-body">
                            <span class="popular-jobs-status">Full Time</span>
                            <a class="favourite" href="#"><i class="far fa-heart"></i></a>
                            <div class="popular-jobs-box">
                                <img class="mb-4 border-radius-10" src="img/content/job-02.jpg" alt="..." />
                                <h4 class="h5">
                                    <a href="job-details.html">Creative Tech Ltd.</a>
                                </h4>
                                <p class="text-muted font-weight-500">Sr. Project Manager</p>
                            </div>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="fas fa-map-marker-alt pe-2 text-secondary"></i>California</span>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="far fa-clock pe-2 text-secondary"></i>$15K</span>
                            <span><i class="ti-briefcase pe-2 text-secondary"></i>3 year</span>
                        </div>
                        <a href="job-details.html" class="butn butn-apply">Apply Now</a>
                    </div>
                    <div class="card card-style10">
                        <div class="card-body">
                            <span class="popular-jobs-status">Part Time</span>
                            <a class="favourite" href="#"><i class="far fa-heart"></i></a>
                            <div class="popular-jobs-box">
                                <img class="mb-4 border-radius-10" src="img/content/job-03.jpg" alt="..." />
                                <h4 class="h5">
                                    <a href="job-details.html">Bedford Ltd.</a>
                                </h4>
                                <p class="text-muted font-weight-500">UI / UX Designer</p>
                            </div>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="fas fa-map-marker-alt pe-2 text-secondary"></i>New
                                York</span>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="far fa-clock pe-2 text-secondary"></i>$18K</span>
                            <span><i class="ti-briefcase pe-2 text-secondary"></i>8 year</span>
                        </div>
                        <a href="job-details.html" class="butn butn-apply">Apply Now</a>
                    </div>
                    <div class="card card-style10">
                        <div class="card-body">
                            <span class="popular-jobs-status">Full Time</span>
                            <a class="favourite" href="#"><i class="far fa-heart"></i></a>
                            <div class="popular-jobs-box">
                                <img class="mb-4 border-radius-10" src="img/content/job-04.jpg" alt="..." />
                                <h4 class="h5">
                                    <a href="job-details.html">Saspol Limited</a>
                                </h4>
                                <p class="text-muted font-weight-500">Software Engineer</p>
                            </div>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="fas fa-map-marker-alt pe-2 text-secondary"></i>London</span>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="far fa-clock pe-2 text-secondary"></i>$20K</span>
                            <span><i class="ti-briefcase pe-2 text-secondary"></i>2 year</span>
                        </div>
                        <a href="job-details.html" class="butn butn-apply">Apply Now</a>
                    </div>
                    <div class="card card-style10">
                        <div class="card-body">
                            <span class="popular-jobs-status">Part Time</span>
                            <a class="favourite" href="#"><i class="far fa-heart"></i></a>
                            <div class="popular-jobs-box">
                                <img class="mb-4 border-radius-10" src="img/content/job-05.jpg" alt="..." />
                                <h4 class="h5">
                                    <a href="job-details.html">Depan insider ltd</a>
                                </h4>
                                <p class="text-muted font-weight-500">Content Writing</p>
                            </div>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="fas fa-map-marker-alt pe-2 text-secondary"></i>UK</span>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="far fa-clock pe-2 text-secondary"></i>$40K</span>
                            <span><i class="ti-briefcase pe-2 text-secondary"></i>7 year</span>
                        </div>
                        <a href="job-details.html" class="butn butn-apply">Apply Now</a>
                    </div>
                    <div class="card card-style10">
                        <div class="card-body">
                            <span class="popular-jobs-status">Full Time</span>
                            <a class="favourite" href="#"><i class="far fa-heart"></i></a>
                            <div class="popular-jobs-box">
                                <img class="mb-4 border-radius-10" src="img/content/job-06.jpg" alt="..." />
                                <h4 class="h5">
                                    <a href="job-details.html">Oryx International</a>
                                </h4>
                                <p class="text-muted font-weight-500">.Net Developer</p>
                            </div> -->
                            <!-- <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="fas fa-map-marker-alt pe-2 text-secondary"></i>Japan</span>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="far fa-clock pe-2 text-secondary"></i>$90K</span>
                            <span><i class="ti-briefcase pe-2 text-secondary"></i>1 year</span>
                        </div> -->
                        <!-- <a href="job-details.html" class="butn butn-apply">Apply Now</a>
                    </div> -->
                </div>
            </div>
        </section>

        <!-- TOP COMPANY
        ================================================== -->
        <section class="bg-primary-light company-style-02">
            <div class="container">
                <div class="section-heading4">
                    <span>seller</span>
                    <h2>Purchase Product & Equipment</h2>
                </div>
                <div class="row mt-n1-9">
                    <div class="col-md-6 mt-1-9">
                        <div
                            class="border border-color-extra-light-gray border-radius-10 bg-white px-4 py-1-9 position-relative overflow-hidden text-center text-xl-start h-100">
                            <div class="row align-items-center">
                                <div class="col-xl-9 mb-4 mb-xl-0">
                                    <div class="d-xl-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <div class="text-center text-xl-start mb-4 mb-xl-0">
                                                <img src="img/bg/feuipment_01.jpg" alt="..." />
                                            </div>
                                        </div>
                                        <div
                                            class="flex-grow-1 border-xl-start border-color-extra-light-gray ms-xl-4 ps-xl-4">
                                            <h4 class="h5 mb-3">
                                                <a href="employer-details.html">Conzio construction</a>
                                            </h4>
                                            <div class="display-31 text-warning mb-3">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <span
                                                    class="bg-primary px-2 py-1 ms-2 display-31 text-white font-weight-600 border-radius-10">4.0</span>
                                            </div>
                                            <ul class="list-style2 mb-0">
                                                <li>
                                                    <i class="ti-briefcase pe-2 text-secondary"></i>Marketing
                                                </li>
                                                <li>
                                                    <i class="ti-location-pin pe-2 text-secondary"></i>Boston, USA
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 text-xl-end">
                                    <a href="employer-details.html" class="butn butn-md radius">08 Jobs</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-1-9">
                        <div
                            class="border border-color-extra-light-gray border-radius-10 bg-white px-4 py-1-9 position-relative overflow-hidden text-center text-xl-start h-100">
                            <div class="featured-lable">Featured</div>
                            <div class="row align-items-center">
                                <div class="col-xl-9 mb-4 mb-xl-0">
                                    <div class="d-block d-xl-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <div class="text-center text-xl-start mb-4 mb-xl-0">
                                                <img src="img/content/company-02.jpg" alt="..." />
                                            </div>
                                        </div>
                                        <div
                                            class="flex-grow-1 border-xl-start border-color-extra-light-gray ms-xl-4 ps-xl-4">
                                            <h4 class="h5 mb-3">
                                                <a href="employer-details.html">Midway Overline</a>
                                            </h4>
                                            <div class="display-31 text-warning mb-3">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <span
                                                    class="bg-primary px-2 py-1 ms-2 display-31 text-white font-weight-600 border-radius-10">5.0</span>
                                            </div>
                                            <ul class="list-style2 mb-0">
                                                <li>
                                                    <i class="ti-briefcase pe-2 text-secondary"></i>PHP
                                                    Developer
                                                </li>
                                                <li>
                                                    <i class="ti-location-pin pe-2 text-secondary"></i>Toronto, Canada
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 text-xl-end">
                                    <a href="employer-details.html" class="butn butn-md radius">05 Jobs</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-1-9">
                        <div
                            class="border border-color-extra-light-gray border-radius-10 bg-white px-4 py-1-9 position-relative overflow-hidden text-center text-xl-start h-100">
                            <div class="featured-lable">Featured</div>
                            <div class="row align-items-center">
                                <div class="col-xl-9 mb-4 mb-xl-0">
                                    <div class="d-block d-xl-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <div class="text-center text-xl-start mb-4 mb-xl-0">
                                                <img src="img/content/company-03.jpg" alt="..." />
                                            </div>
                                        </div>
                                        <div
                                            class="flex-grow-1 border-xl-start border-color-extra-light-gray ms-xl-4 ps-xl-4">
                                            <h4 class="h5 mb-3">
                                                <a href="employer-details.html">Ktone Software</a>
                                            </h4>
                                            <div class="display-31 text-warning mb-3">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <span
                                                    class="bg-primary px-2 py-1 ms-2 display-31 text-white font-weight-600 border-radius-10">5.0</span>
                                            </div>
                                            <ul class="list-style2 mb-0">
                                                <li>
                                                    <i class="ti-briefcase pe-2 text-secondary"></i>Accounting
                                                </li>
                                                <li>
                                                    <i class="ti-location-pin pe-2 text-secondary"></i>London, UK
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 text-xl-end">
                                    <a href="employer-details.html" class="butn butn-md radius">02 Jobs</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-1-9">
                        <div
                            class="border border-color-extra-light-gray border-radius-10 bg-white px-4 py-1-9 position-relative overflow-hidden text-center text-xl-start h-100">
                            <div class="row align-items-center">
                                <div class="col-xl-9 mb-4 mb-xl-0">
                                    <div class="d-block d-xl-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <div class="text-center text-xl-start mb-4 mb-xl-0">
                                                <img src="img/content/company-04.jpg" alt="..." />
                                            </div>
                                        </div>
                                        <div
                                            class="flex-grow-1 border-xl-start border-color-extra-light-gray ms-xl-4 ps-xl-4">
                                            <h4 class="h5 mb-3">
                                                <a href="employer-details.html">Alpha Kem</a>
                                            </h4>
                                            <div class="display-31 text-warning mb-3">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <span
                                                    class="bg-primary px-2 py-1 ms-2 display-31 text-white font-weight-600 border-radius-10">5.0</span>
                                            </div>
                                            <ul class="list-style2 mb-0">
                                                <li>
                                                    <i class="ti-briefcase pe-2 text-secondary"></i>Content Writer
                                                </li>
                                                <li>
                                                    <i class="ti-location-pin pe-2 text-secondary"></i>Nizhny, Russia
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 text-xl-end">
                                    <a href="employer-details.html" class="butn butn-md radius">03 Jobs</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-1-9">
                        <div
                            class="border border-color-extra-light-gray border-radius-10 bg-white px-4 py-1-9 position-relative overflow-hidden text-center text-xl-start h-100">
                            <div class="featured-lable">Featured</div>
                            <div class="row align-items-center">
                                <div class="col-xl-9 mb-4 mb-xl-0">
                                    <div class="d-block d-xl-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <div class="text-center text-xl-start mb-4 mb-xl-0">
                                                <img src="img/content/company-05.jpg" alt="..." />
                                            </div>
                                        </div>
                                        <div
                                            class="flex-grow-1 border-xl-start border-color-extra-light-gray ms-xl-4 ps-xl-4">
                                            <h4 class="h5 mb-3">
                                                <a href="employer-details.html">Waft Technologies</a>
                                            </h4>
                                            <div class="display-31 text-warning mb-3">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <span
                                                    class="bg-primary px-2 py-1 ms-2 display-31 text-white font-weight-600 border-radius-10">4.0</span>
                                            </div>
                                            <ul class="list-style2 mb-0">
                                                <li>
                                                    <i class="ti-briefcase pe-2 text-secondary"></i>Software Engineer
                                                </li>
                                                <li>
                                                    <i class="ti-location-pin pe-2 text-secondary"></i>Utrecht,
                                                    Netherlands
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 text-xl-end">
                                    <a href="employer-details.html" class="butn butn-md radius">02 Jobs</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-1-9">
                        <div
                            class="border border-color-extra-light-gray border-radius-10 bg-white px-4 py-1-9 position-relative overflow-hidden text-center text-xl-start h-100">
                            <div class="row align-items-center">
                                <div class="col-xl-9 mb-4 mb-xl-0">
                                    <div class="d-block d-xl-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <div class="text-center text-xl-start mb-4 mb-xl-0">
                                                <img src="img/content/company-06.jpg" alt="..." />
                                            </div>
                                        </div>
                                        <div
                                            class="flex-grow-1 border-xl-start border-color-extra-light-gray ms-xl-4 ps-xl-4">
                                            <h4 class="h5 mb-3">
                                                <a href="employer-details.html">Sai Web Infotech</a>
                                            </h4>
                                            <div class="display-31 text-warning mb-3">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <span
                                                    class="bg-primary px-2 py-1 ms-2 display-31 text-white font-weight-600 border-radius-10">5.0</span>
                                            </div>
                                            <ul class="list-style2 mb-0">
                                                <li>
                                                    <i class="ti-briefcase pe-2 text-secondary"></i>Full-Stack Developer
                                                </li>
                                                <li>
                                                    <i class="ti-location-pin pe-2 text-secondary"></i>Vienna, Australia
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 text-xl-end">
                                    <a href="employer-details.html" class="butn butn-md radius">03 Jobs</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- TESTIMONIAL
        ================================================== -->
        <section>
            <div class="container">
                <div class="section-heading4">
                    <span>Testimonials</span>
                    <h2>Our Satisfied Client</h2>
                </div>
                <div class="testimonial4-carousel owl-carousel owl-theme">
                    <div class="testimonial-wrapper">
                        <div class="d-sm-flex align-items-center">
                            <div class="flex-shrink-0 mb-1-6 mb-sm-0">
                                <div class="testimonial-img">
                                    <img src="img/avatar/avatar-07.jpg" alt="..." class="border-radius-10" />
                                    <i class="fas fa-quote-left"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-sm-1-9 text-center text-sm-start">
                                <p class="display-29 display-xl-28">
                                    Wow what great service, I love it! You guys rock! I am
                                    completely blown away. Thank you.
                                </p>
                                <h6 class="h5 mb-1">Eva Kleist</h6>
                                <span class="text-secondary">Senior Manager</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-wrapper">
                        <div class="d-sm-flex align-items-center">
                            <div class="flex-shrink-0 mb-1-6 mb-sm-0">
                                <div class="testimonial-img">
                                    <img src="img/avatar/avatar-08.jpg" alt="..." class="border-radius-10" />
                                    <i class="fas fa-quote-left"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-sm-1-9 text-center text-sm-start">
                                <p class="display-29 display-xl-28">
                                    I would gladly pay over 600 dollars for jobboard. Jobboard
                                    is worth much more than I paid.
                                </p>
                                <h6 class="h5 mb-1">Marko Konig</h6>
                                <span class="text-secondary">Web Designer</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-wrapper">
                        <div class="d-sm-flex align-items-center">
                            <div class="flex-shrink-0 mb-1-6 mb-sm-0">
                                <div class="testimonial-img">
                                    <img src="img/avatar/avatar-09.jpg" alt="..." class="border-radius-10" />
                                    <i class="fas fa-quote-left"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-sm-1-9 text-center text-sm-start">
                                <p class="display-29 display-xl-28">
                                    I have gotten at least 50 times the value from jobboard. I
                                    didn't even need training. Thanks.
                                </p>
                                <h6 class="h5 mb-1">Rosa Olsen</h6>
                                <span class="text-secondary">Apps Developer</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-wrapper">
                        <div class="d-sm-flex align-items-center">
                            <div class="flex-shrink-0 mb-1-6 mb-sm-0">
                                <div class="testimonial-img">
                                    <img src="img/avatar/avatar-10.jpg" alt="..." class="border-radius-10" />
                                    <i class="fas fa-quote-left"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-sm-1-9 text-center text-sm-start">
                                <p class="display-29 display-xl-28">
                                    Since I invested in jobboard I made over more dollars
                                    profits. jobboard is the coolest thing!
                                </p>
                                <h6 class="h5 mb-1">Eshan Marshall</h6>
                                <span class="text-secondary">Business Manager</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- EXTRA
        ================================================== -->
        <section class="bg-primary-light">
            <div class="container">
                <div class="row align-items-center mt-n1-9">
                    <div class="col-xl-6 order-2 order-lg-1 mt-1-9">
                        <h2 class="h3 text-capitalize font-weight-700 mb-4">
                            Find Talent From The Featured Ones For Your Dream Job.
                        </h2>
                        <p class="mb-4">
                            Just due to the fact you don’t recognise what profession you
                            need doesn’t imply you don’t recognise what you’re right at. A
                            first rate manner to attention to your capabilities is to make a
                            listing of your strengths. If that doesn’t come evidently to
                            you, ask a chum or relied on co-employee their opinion.
                        </p>
                        <a href="job-grid.html" class="butn">Find Jobs Now</a>
                    </div>
                    <div class="col-xl-6 mb-2-5 mb-lg-0 order-1 order-lg-2 mt-1-9">
                        <div class="ps-xl-8">
                            <div class="row justify-content-center mt-n1-9">
                                <div class="col-sm-6 mt-1-9 text-center text-sm-start">
                                    <div
                                        class="d-sm-flex align-items-center border border-color-extra-light-gray border-radius-10 bg-white p-3 w-100 h-100">
                                        <div class="flex-shrink-0 mb-3 mb-sm-0">
                                            <img src="img/icons/icon-22.png" alt="..." />
                                        </div>
                                        <div
                                            class="flex-grow-1 border-sm-start border-color-extra-light-gray ps-sm-3 ps-xl-4 ms-sm-3 ms-xl-4">
                                            <h3 class="countup h1 text-secondary mb-1">1327</h3>
                                            <span class="font-weight-500 text-muted">Job Posted</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mt-1-9 text-center text-sm-start">
                                    <div
                                        class="d-sm-flex align-items-center border border-color-extra-light-gray border-radius-10 bg-white p-3 w-100 h-100">
                                        <div class="flex-shrink-0 mb-3 mb-sm-0">
                                            <img src="img/icons/icon-23.png" alt="..." />
                                        </div>
                                        <div
                                            class="flex-grow-1 border-sm-start border-color-extra-light-gray ps-sm-3 ps-xl-4 ms-sm-3 ms-xl-4">
                                            <h3 class="countup h1 text-secondary mb-1">150</h3>
                                            <span class="font-weight-500 text-muted">Jobs Filled</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mt-1-9 text-center text-sm-start">
                                    <div
                                        class="d-sm-flex align-items-center border border-color-extra-light-gray border-radius-10 bg-white p-3 w-100 h-100">
                                        <div class="flex-shrink-0 mb-3 mb-sm-0">
                                            <img src="img/icons/icon-24.png" alt="..." />
                                        </div>
                                        <div
                                            class="flex-grow-1 border-sm-start border-color-extra-light-gray ps-sm-3 ps-xl-4 ms-sm-3 ms-xl-4">
                                            <h3 class="countup h1 text-secondary mb-1">220</h3>
                                            <span class="font-weight-500 text-muted">Companie</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mt-1-9 text-center text-sm-start">
                                    <div
                                        class="d-sm-flex align-items-center border border-color-extra-light-gray border-radius-10 bg-white p-3 w-100 h-100">
                                        <div class="flex-shrink-0 mb-3 mb-sm-0">
                                            <img src="img/icons/icon-25.png" alt="..." />
                                        </div>
                                        <div
                                            class="flex-grow-1 border-sm-start border-color-extra-light-gray ps-sm-3 ps-xl-4 ms-sm-3 ms-xl-4">
                                            <h3 class="countup h1 text-secondary mb-1">2250</h3>
                                            <span class="font-weight-500 text-muted">Candidate</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- BLOG
        ================================================== -->
        <section>
            <div class="container">
                <div class="section-heading4">
                    <span>Our Blogs</span>
                    <h2>Recent News Article</h2>
                </div>
                <div class="row mt-n1-9">
                    <div class="col-xl-6 mt-1-9">
                        <div
                            class="d-block d-md-flex border border-color-extra-light-gray bg-white border-radius-10 p-3 h-100">
                            <div class="col-md-5 bg-img cover-background border-radius-10 min-height-250"
                                data-background="img/blog/blog-01.jpg"></div>
                            <div class="col-md-7">
                                <div class="px-md-1-9 pt-4 pb-2 py-md-4">
                                    <ul class="list-style2 mb-3">
                                        <li><a href="#!">18 Apr, 2022</a></li>
                                        <li><a href="#!">Comment</a>(<span>12</span>)</li>
                                    </ul>
                                    <h4 class="h5 mb-3">
                                        <a href="blog-details.html">How To Make A Perfect Cv That Attracts The
                                            Attention...</a>
                                    </h4>
                                    <p class="mb-3">
                                        A job ravenously at the same time as Far plenty that one
                                        rank beheld after outside.
                                    </p>
                                    <div
                                        class="border-top border-color-extra-light-gray d-flex justify-content-between align-items-center pt-3">
                                        <div>
                                            <img class="border-radius-50 me-2 vertical-align-middle w-40px"
                                                src="img/avatar/avatar-01.jpg" alt="..." />
                                            <h6 class="mb-0 d-inline-block display-30 font-weight-500">
                                                Siemon Smelt
                                            </h6>
                                        </div>
                                        <a href="blog-details.html" class="font-weight-600">Read More<i
                                                class="fas fa-long-arrow-alt-right align-middle ms-2 display-30"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 mt-1-9">
                        <div
                            class="d-block d-md-flex border border-color-extra-light-gray bg-white border-radius-10 p-3 h-100">
                            <div class="col-md-5 bg-img cover-background border-radius-10 min-height-250"
                                data-background="img/blog/blog-02.jpg"></div>
                            <div class="col-md-7">
                                <div class="px-md-1-9 pt-4 pb-2 py-md-4px-md-1-9 pt-4 pb-2 py-md-4">
                                    <ul class="list-style2 mb-3">
                                        <li><a href="#!">15 Apr, 2022</a></li>
                                        <li><a href="#!">Comment</a>(<span>08</span>)</li>
                                    </ul>
                                    <h4 class="h5 mb-3">
                                        <a href="blog-details.html">Points To Be Considered Before Accept Job
                                            Offer!...</a>
                                    </h4>
                                    <p class="mb-3">
                                        A job ravenously at the same time as Far plenty that one
                                        rank beheld after outside.
                                    </p>
                                    <div
                                        class="border-top border-color-extra-light-gray d-flex justify-content-between align-items-center pt-3">
                                        <div>
                                            <img class="border-radius-50 me-2 vertical-align-middle w-40px"
                                                src="img/avatar/avatar-02.jpg" alt="..." />
                                            <h6 class="mb-0 d-inline-block display-30 font-weight-500">
                                                Johanna Hoch
                                            </h6>
                                        </div>
                                        <a href="blog-details.html" class="font-weight-500">Read More<i
                                                class="fas fa-long-arrow-alt-right align-middle ms-2 display-30"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 mt-1-9">
                        <div
                            class="d-block d-md-flex border border-color-extra-light-gray bg-white border-radius-10 p-3 h-100">
                            <div class="col-md-5 bg-img cover-background border-radius-10 min-height-250"
                                data-background="img/blog/blog-03.jpg"></div>
                            <div class="col-md-7">
                                <div class="px-md-1-9 pt-4 pb-2 py-md-4">
                                    <ul class="list-style2 mb-3">
                                        <li><a href="#!">14 Apr, 2022</a></li>
                                        <li><a href="#!">Comment</a>(<span>10</span>)</li>
                                    </ul>
                                    <h4 class="h5 mb-3">
                                        <a href="blog-details.html">Most Powerful Thing You've Self Coaching
                                            Scholars...</a>
                                    </h4>
                                    <p class="mb-3">
                                        A job ravenously at the same time as Far plenty that one
                                        rank beheld after outside.
                                    </p>
                                    <div
                                        class="border-top border-color-extra-light-gray d-flex justify-content-between align-items-center pt-3">
                                        <div>
                                            <img class="border-radius-50 me-2 vertical-align-middle w-40px"
                                                src="img/avatar/avatar-03.jpg" alt="..." />
                                            <h6 class="mb-0 d-inline-block display-30 font-weight-500">
                                                Arnaud Brian
                                            </h6>
                                        </div>
                                        <a href="blog-details.html" class="font-weight-500">Read More<i
                                                class="fas fa-long-arrow-alt-right align-middle ms-2 display-30"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 mt-1-9">
                        <div
                            class="d-block d-md-flex border border-color-extra-light-gray bg-white border-radius-10 p-3 h-100">
                            <div class="col-md-5 bg-img cover-background border-radius-10 min-height-250"
                                data-background="img/blog/blog-04.jpg"></div>
                            <div class="col-md-7">
                                <div class="px-md-1-9 pt-4 pb-2 py-md-4">
                                    <ul class="list-style2">
                                        <li><a href="#!">11 Apr, 2022</a></li>
                                        <li><a href="#!">Comment</a>(<span>05</span>)</li>
                                    </ul>
                                    <h4 class="h5 mb-3">
                                        <a href="blog-details.html">Job Interview Tips For Older Workers...</a>
                                    </h4>
                                    <p class="mb-3">
                                        A job ravenously at the same time as Far plenty that one
                                        rank beheld after outside.
                                    </p>
                                    <div
                                        class="border-top border-color-extra-light-gray d-flex justify-content-between align-items-center pt-3">
                                        <div>
                                            <img class="border-radius-50 me-2 vertical-align-middle w-40px"
                                                src="img/avatar/avatar-04.jpg" alt="..." />
                                            <h6 class="mb-0 d-inline-block display-30 font-weight-500">
                                                Yolande Quirion
                                            </h6>
                                        </div>
                                        <a href="blog-details.html" class="font-weight-500">Read More<i
                                                class="fas fa-long-arrow-alt-right align-middle ms-2 display-30"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FOOTER
        ================================================== -->
        <footer>
            <div class="container">
                <div class="row mt-n2-6">
                    <div class="col-sm-6 col-xl-4 mt-2-6">
                        <h3 class="h5 mb-1-6 text-white">Contact Us</h3>
                        <p class="mb-1-6 text-white opacity9">
                            Advertise your jobs to hundreds of thousands of monthly
                            customers and seek 15.8 million CV in our database.
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
                            <h3 class="h5 mb-1-6 text-white">Information</h3>
                            <ul class="footer-list-style1">
                                <li><a href="aboutus.html">About us</a></li>
                                <li><a href="blog-grid.html">Blog</a></li>
                                <li><a href="how-it-works.html">Our Process</a></li>
                                <li><a href="pricing-plans.html">Our Pricing</a></li>
                                <li><a href="contact-us.html">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-2 mt-2-6">
                        <div class="ps-xl-1-9">
                            <h3 class="h5 mb-1-6 text-white">Candidates</h3>
                            <ul class="footer-list-style1">
                                <li><a href="candidate-applied-job.html">Applied Job</a></li>
                                <li><a href="candidate-cv-manager.html">CV Manager</a></li>
                                <li>
                                    <a href="candidate-shortlisted-jobs.html">Shortlisted Jobs</a>
                                </li>
                                <li><a href="candidate-job-alerts.html">Job Alerts</a></li>
                                <li><a href="candidate-dashboard.html">Dashboard</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bar borders-top border-color-light-white">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center mb-3">
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
                        <div class="col-md-12 text-center">
                            <p class="d-inline-block text-white mb-0">
                                &copy; <span class="current-year"></span>
                                <a href="https://www.chitrakootweb.com/" target="_blank"
                                    class="text-primary white-hover">Aggregate Agro</a>
                            </p>
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

<!-- Mirrored from jobboard.websitelayout.net/index-04.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Sep 2022 12:47:56 GMT -->

</html>