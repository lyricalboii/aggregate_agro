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

.prod_1{
    max-width: 100%;
}

.prod1_img{
    width: 60%;
}

.prod_main{
    height: 10%;
}

.crop_1{
    width: 55%;
    max-width: 100%;
    position: relative;
    left: 90px;
}

.crop1_img{
 
}
 
.footer_row{
    justify-content: center;
    align-items: center;

}

.footer_container{
    padding-bottom: 50px;
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
        include "nav/f_nav.php";
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
                    <?php
                    echo $id;
                    $query = "SELECT * FROM `request` WHERE `receivingid` = $id";
                    $result_query = mysqli_query($con,$query);
                    $num = mysqli_num_rows($result_query);
                    if($num <= 0){
                        echo "no request available";
                    }else{
                        while($row = mysqli_fetch_assoc($result_query)){
                            echo $row['fullname'];
                        }
                    }
                    ?>
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
                    <div class="col-md-6 mt-1-9 prod_main">
                        <div
                            class="border border-color-extra-light-gray border-radius-10 bg-white px-4 py-1-9 position-relative overflow-hidden text-center text-xl-start h-100">
                            <div class="row align-items-center">
                                <div class="col-xl-9 mb-4 mb-xl-0">
                                    <div class="d-xl-flex align-items-center">
                                        <div class="">
                                            <div class="text-center text-xl-start mb-4 mb-xl-0 prod_1">
                                                <img class="prod1_img" src="img/bg/feuipment_01.jpg" alt="..." />
                                            </div>
                                        </div>

                                        <div
                                            class="flex-grow-1 border-xl-start border-color-extra-light-gray ms-xl-4 ps-xl-4">
                                            <h4 class="h5 mb-3">
                                                <a href="employer-details.html">fertilizer</a>
                                            </h4>
                                            <ul class="list-style2 mb-0">
                                                <!-- <li>
                                                    <i class="ti-briefcase pe-2 text-secondary"></i>
                                                </li> -->
                                                <li>
                                                    <i class="ti-location-pin pe-2 text-secondary"></i>junagadh
                                                </li>
                                            </ul>
                                            <div class="col-xl-3 text-xl-end" style="margin-top:10px;">
                                    <a href="employer-details.html" class="butn butn-md radius">Explore</a>
                                </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-1-9 prod_main">
                        <div
                            class="border border-color-extra-light-gray border-radius-10 bg-white px-4 py-1-9 position-relative overflow-hidden text-center text-xl-start h-100">
                            <div class="row align-items-center">
                                <div class="col-xl-9 mb-4 mb-xl-0">
                                    <div class="d-xl-flex align-items-center">
                                        <div class="">
                                            <div class="text-center text-xl-start mb-4 mb-xl-0 prod_1">
                                                <img class="prod1_img" src="img/bg/feuipment_01.jpg" alt="..." />
                                            </div>
                                        </div>

                                        <div
                                            class="flex-grow-1 border-xl-start border-color-extra-light-gray ms-xl-4 ps-xl-4">
                                            <h4 class="h5 mb-3">
                                                <a href="employer-details.html">fertilizer</a>
                                            </h4>
                                            <ul class="list-style2 mb-0">
                                                <!-- <li>
                                                    <i class="ti-briefcase pe-2 text-secondary"></i>
                                                </li> -->
                                                <li>
                                                    <i class="ti-location-pin pe-2 text-secondary"></i>junagadh
                                                </li>
                                            </ul>
                                            <div class="col-xl-3 text-xl-end" style="margin-top:10px;">
                                    <a href="employer-details.html" class="butn butn-md radius">Explore</a>
                                </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-1-9 prod_main">
                        <div
                            class="border border-color-extra-light-gray border-radius-10 bg-white px-4 py-1-9 position-relative overflow-hidden text-center text-xl-start h-100">
                            <div class="row align-items-center">
                                <div class="col-xl-9 mb-4 mb-xl-0">
                                    <div class="d-xl-flex align-items-center">
                                        <div class="">
                                            <div class="text-center text-xl-start mb-4 mb-xl-0 prod_1">
                                                <img class="prod1_img" src="img/bg/feuipment_01.jpg" alt="..." />
                                            </div>
                                        </div>

                                        <div
                                            class="flex-grow-1 border-xl-start border-color-extra-light-gray ms-xl-4 ps-xl-4">
                                            <h4 class="h5 mb-3">
                                                <a href="employer-details.html">fertilizer</a>
                                            </h4>
                                            <ul class="list-style2 mb-0">
                                                <!-- <li>
                                                    <i class="ti-briefcase pe-2 text-secondary"></i>
                                                </li> -->
                                                <li>
                                                    <i class="ti-location-pin pe-2 text-secondary"></i>junagadh
                                                </li>
                                            </ul>
                                            <div class="col-xl-3 text-xl-end" style="margin-top:10px;">
                                    <a href="employer-details.html" class="butn butn-md radius">Explore</a>
                                </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-1-9 prod_main">
                        <div
                            class="border border-color-extra-light-gray border-radius-10 bg-white px-4 py-1-9 position-relative overflow-hidden text-center text-xl-start h-100">
                            <div class="row align-items-center">
                                <div class="col-xl-9 mb-4 mb-xl-0">
                                    <div class="d-xl-flex align-items-center">
                                        <div class="">
                                            <div class="text-center text-xl-start mb-4 mb-xl-0 prod_1">
                                                <img class="prod1_img" src="img/bg/feuipment_01.jpg" alt="..." />
                                            </div>
                                        </div>

                                        <div
                                            class="flex-grow-1 border-xl-start border-color-extra-light-gray ms-xl-4 ps-xl-4">
                                            <h4 class="h5 mb-3">
                                                <a href="employer-details.html">fertilizer</a>
                                            </h4>
                                            <ul class="list-style2 mb-0">
                                                <!-- <li>
                                                    <i class="ti-briefcase pe-2 text-secondary"></i>
                                                </li> -->
                                                <li>
                                                    <i class="ti-location-pin pe-2 text-secondary"></i>junagadh
                                                </li>
                                            </ul>
                                            <div class="col-xl-3 text-xl-end" style="margin-top:10px;">
                                    <a href="employer-details.html" class="butn butn-md radius">Explore</a>
                                </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-1-9 prod_main">
                        <div
                            class="border border-color-extra-light-gray border-radius-10 bg-white px-4 py-1-9 position-relative overflow-hidden text-center text-xl-start h-100">
                            <div class="row align-items-center">
                                <div class="col-xl-9 mb-4 mb-xl-0">
                                    <div class="d-xl-flex align-items-center">
                                        <div class="">
                                            <div class="text-center text-xl-start mb-4 mb-xl-0 prod_1">
                                                <img class="prod1_img" src="img/bg/feuipment_01.jpg" alt="..." />
                                            </div>
                                        </div>

                                        <div
                                            class="flex-grow-1 border-xl-start border-color-extra-light-gray ms-xl-4 ps-xl-4">
                                            <h4 class="h5 mb-3">
                                                <a href="employer-details.html">fertilizer</a>
                                            </h4>
                                            <ul class="list-style2 mb-0">
                                                <!-- <li>
                                                    <i class="ti-briefcase pe-2 text-secondary"></i>
                                                </li> -->
                                                <li>
                                                    <i class="ti-location-pin pe-2 text-secondary"></i>junagadh
                                                </li>
                                            </ul>
                                            <div class="col-xl-3 text-xl-end" style="margin-top:10px;">
                                    <a href="employer-details.html" class="butn butn-md radius">Explore</a>
                                </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-1-9 prod_main">
                        <div
                            class="border border-color-extra-light-gray border-radius-10 bg-white px-4 py-1-9 position-relative overflow-hidden text-center text-xl-start h-100">
                            <div class="row align-items-center">
                                <div class="col-xl-9 mb-4 mb-xl-0">
                                    <div class="d-xl-flex align-items-center">
                                        <div class="">
                                            <div class="text-center text-xl-start mb-4 mb-xl-0 prod_1">
                                                <img class="prod1_img" src="img/bg/feuipment_01.jpg" alt="..." />
                                            </div>
                                        </div>

                                        <div
                                            class="flex-grow-1 border-xl-start border-color-extra-light-gray ms-xl-4 ps-xl-4">
                                            <h4 class="h5 mb-3">
                                                <a href="employer-details.html">fertilizer</a>
                                            </h4>
                                            <ul class="list-style2 mb-0">
                                                <!-- <li>
                                                    <i class="ti-briefcase pe-2 text-secondary"></i>
                                                </li> -->
                                                <li>
                                                    <i class="ti-location-pin pe-2 text-secondary"></i>junagadh
                                                </li>
                                            </ul>
                                            <div class="col-xl-3 text-xl-end" style="margin-top:10px;">
                                    <a href="employer-details.html" class="butn butn-md radius">Explore</a>
                                </div>
                                            
                                        </div>
                                    </div>
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
                    <span>Yard</span>
                    <h2>Sell Your Crop</h2>
                </div>
                <div class="recent-jobs owl-carousel owl-theme">
                    <div class="card card-style10">
                        <div class="card-body">
                            <!-- <span class="popular-jobs-status">Full Time</span> -->
                       
                            <div class="popular-jobs-box crop_1">
                                <img class="mb-4 border-radius-10 crop1_img " src="img/bg/wheat.jpg" alt="..." />
                                </div>

                                <div>
                                <h4 class="h5">
                                    <a href="job-details.html">Wheat</a>
                                </h4>
                               
                            </div>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="fas fa-map-marker-alt pe-2 text-secondary"></i>Amreli</span>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="far fa-clock pe-2 text-secondary"></i>RS.2000</span>
                   
                        </div>
                        <a href="job-details.html" class="butn butn-apply">View</a>
                    </div>

                    <div class="card card-style10">
                        <div class="card-body">
                            <!-- <span class="popular-jobs-status">Full Time</span> -->
                       
                            <div class="popular-jobs-box crop_1">
                                <img class="mb-4 border-radius-10 crop1_img " src="img/bg/wheat.jpg" alt="..." />
                                </div>

                                <div>
                                <h4 class="h5">
                                    <a href="job-details.html">Wheat</a>
                                </h4>
                               
                            </div>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="fas fa-map-marker-alt pe-2 text-secondary"></i>Amreli</span>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="far fa-clock pe-2 text-secondary"></i>RS.2000</span>
                   
                        </div>
                        <a href="job-details.html" class="butn butn-apply">View</a>
                    </div>
                    <div class="card card-style10">
                        <div class="card-body">
                            <!-- <span class="popular-jobs-status">Full Time</span> -->
                       
                            <div class="popular-jobs-box crop_1">
                                <img class="mb-4 border-radius-10 crop1_img " src="img/bg/wheat.jpg" alt="..." />
                                </div>

                                <div>
                                <h4 class="h5">
                                    <a href="job-details.html">Wheat</a>
                                </h4>
                               
                            </div>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="fas fa-map-marker-alt pe-2 text-secondary"></i>Amreli</span>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="far fa-clock pe-2 text-secondary"></i>RS.2000</span>
                   
                        </div>
                        <a href="job-details.html" class="butn butn-apply">View</a>
                    </div>

                    <div class="card card-style10">
                        <div class="card-body">
                            <!-- <span class="popular-jobs-status">Full Time</span> -->
                       
                            <div class="popular-jobs-box crop_1">
                                <img class="mb-4 border-radius-10 crop1_img " src="img/bg/wheat.jpg" alt="..." />
                                </div>

                                <div>
                                <h4 class="h5">
                                    <a href="job-details.html">Wheat</a>
                                </h4>
                               
                            </div>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="fas fa-map-marker-alt pe-2 text-secondary"></i>Amreli</span>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="far fa-clock pe-2 text-secondary"></i>RS.2000</span>
                   
                        </div>
                        <a href="job-details.html" class="butn butn-apply">View</a>
                    </div>

                    <div class="card card-style10">
                        <div class="card-body">
                            <!-- <span class="popular-jobs-status">Full Time</span> -->
                       
                            <div class="popular-jobs-box crop_1">
                                <img class="mb-4 border-radius-10 crop1_img " src="img/bg/wheat.jpg" alt="..." />
                                </div>

                                <div>
                                <h4 class="h5">
                                    <a href="job-details.html">Wheat</a>
                                </h4>
                               
                            </div>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="fas fa-map-marker-alt pe-2 text-secondary"></i>Amreli</span>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="far fa-clock pe-2 text-secondary"></i>RS.2000</span>
                   
                        </div>
                        <a href="job-details.html" class="butn butn-apply">View</a>
                    </div>

                    <div class="card card-style10">
                        <div class="card-body">
                            <!-- <span class="popular-jobs-status">Full Time</span> -->
                       
                            <div class="popular-jobs-box crop_1">
                                <img class="mb-4 border-radius-10 crop1_img " src="img/bg/wheat.jpg" alt="..." />
                                </div>

                                <div>
                                <h4 class="h5">
                                    <a href="job-details.html">Wheat</a>
                                </h4>
                               
                            </div>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="fas fa-map-marker-alt pe-2 text-secondary"></i>Amreli</span>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="far fa-clock pe-2 text-secondary"></i>RS.2000</span>
                   
                        </div>
                        <a href="job-details.html" class="butn butn-apply">View</a>
                    </div>

                    <div class="card card-style10">
                        <div class="card-body">
                            <!-- <span class="popular-jobs-status">Full Time</span> -->
                       
                            <div class="popular-jobs-box crop_1">
                                <img class="mb-4 border-radius-10 crop1_img " src="img/bg/wheat.jpg" alt="..." />
                                </div>

                                <div>
                                <h4 class="h5">
                                    <a href="job-details.html">Wheat</a>
                                </h4>
                               
                            </div>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="fas fa-map-marker-alt pe-2 text-secondary"></i>Amreli</span>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="far fa-clock pe-2 text-secondary"></i>RS.2000</span>
                   
                        </div>
                        <a href="job-details.html" class="butn butn-apply">View</a>
                    </div>

                    <div class="card card-style10">
                        <div class="card-body">
                            <!-- <span class="popular-jobs-status">Full Time</span> -->
                       
                            <div class="popular-jobs-box crop_1">
                                <img class="mb-4 border-radius-10 crop1_img " src="img/bg/wheat.jpg" alt="..." />
                                </div>

                                <div>
                                <h4 class="h5">
                                    <a href="job-details.html">Wheat</a>
                                </h4>
                               
                            </div>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="fas fa-map-marker-alt pe-2 text-secondary"></i>Amreli</span>
                            <span class="border-end border-color-extra-light-gray pe-2 me-2"><i
                                    class="far fa-clock pe-2 text-secondary"></i>RS.2000</span>
                   
                        </div>
                        <a href="job-details.html" class="butn butn-apply">View</a>
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

        <!-- EXTRA
        ================================================== -->
     

        <!-- BLOG
        ================================================== -->


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

<!-- Mirrored from jobboard.websitelayout.net/index-04.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Sep 2022 12:47:56 GMT -->

</html>