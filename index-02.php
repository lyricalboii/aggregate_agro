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

        <!-- BANNER
        ================================================== -->
        <section class="banner2">
            <div class="container">
                <div class="row">
                    <div class="content-column col-lg-7">
                        <div class="inner-column pe-xxl-5">
                            <div class="banner-title mb-md-2-5">
                                <h1 class="mb-3">Achieve Your Perfect Job</h1>
                                <p class="display-28">Search Jobs to Get Opportunities</p>
                            </div>
                            <!--Start Job Search Form -->
                            <div class="job-search-form">
                                <form action="#!" method="post" enctype="multipart/form-data" onclick="">
                                    <div class="quform-elements">
                                        <div class="row mt-n3">
                                            <!-- Begin Text input element -->
                                            <div class="col-md-5 mt-3">
                                                <div class="quform-element">
                                                    <div class="quform-input">
                                                        <!-- <input id="job-search" class="form-control" type="text" name="job-search" placeholder="State" /> -->
                                                        <select name="job-search" id="job-search" class="form-control">
                                                            <option>Gujarat</option>
                                                            <option>Maharashtra</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Text input element -->
                                            <!-- Begin Text input element -->
                                            <div class="col-md-4 mt-3">
                                                <div class="quform-element">
                                                    <div class="quform-input">
                                                        <!-- <input id="email" class="form-control" type="text" name="email" placeholder="City" /> -->
                                                        <select name="job-search" id="job-search" class="form-control">
                                                            <option>Amreli</option>
                                                            <option>Junagadh</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Text input element -->
                                            <!-- Begin Submit button -->
                                            <div class="col-md-3 mt-3">
                                                <div class="quform-submit-inner">
                                                    <button class="butn" type="submit"><span>Find Jobs</span></button>
                                                </div>
                                                <div class="quform-loading-wrap"><span class="quform-loading"></span>
                                                </div>
                                            </div>
                                            <!-- End Submit button -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--End Job Search Form -->
                            <!-- Popular Search -->
                            <div class="popular-searches">
                                <span class="pe-3 font-weight-600">Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit. Sed nulla quam excepturi nostrum hic fuga, nesciunt quo illum natus
                                    dignissimos? </span>
                            </div>
                            <!-- End Popular Search -->
                        </div>
                    </div>
                    <div class="image-column col-lg-5">
                        <div class="image-box">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <img src="img/bg/whome1.jpg" class="border-radius-5 whimg1" alt="...">
                                </div>
                                <div class="col-6">
                                    <img src="img/bg/whome2.jpg" class="mb-4 border-radius-5 whimg2" alt="...">
                                    <img src="img/bg/whome3.jpg" class="border-radius-5 whimg3" alt="...">
                                </div>
                            </div>
                            <div class="banner-image-text d-none d-sm-block">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <i class="ti-export display-25 text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h4 class="h6 mb-0">Upload Your CV</h4>
                                        <small>It only takes a few seconds</small>
                                    </div>
                                </div>
                            </div>
                            <div class="banner-image-text bottom-text text-center d-none d-sm-block">
                                <h6 class="mb-3">10k+ Candidates</h6>
                                <ul class="list-unstyled users-list m-0">
                                    <li>
                                        <img class="rounded-circle" src="img/avatar/avatar-01.jpg" alt="...">
                                    </li>
                                    <li>
                                        <img class="rounded-circle" src="img/avatar/avatar-02.jpg" alt="...">
                                    </li>
                                    <li>
                                        <img class="rounded-circle" src="img/avatar/avatar-03.jpg" alt="...">
                                    </li>
                                    <li>
                                        <img class="rounded-circle" src="img/avatar/avatar-05.jpg" alt="...">
                                    </li>
                                    <li>
                                        <img class="rounded-circle" src="img/avatar/avatar-06.jpg" alt="...">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- JOB CATEGORIES
        ================================================== -->
        <section>
            <div class="container border-bottom border-color-extra-light-gray mb-6 pb-6">
                <div class="section-heading2">
                    <span># State</span>
                    <h2><strong>Top trending</strong> State</h2>
                </div>
                <div class="job-categories owl-carousel owl-theme">
                    <div class="card card-style5">
                        <div class="categories-img bg-img cover-background min-height-250"
                            data-background="img/content/job-categorie-01.jpg"></div>
                        <div class="card-body">
                            <span class="job-position">02 Jobs</span>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="categories-icon">
                                        <img src="img/icons/icon-14.png" alt="...">
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h4 class="h5 mb-1"><a href="job-listing.html" class="text-white">Gujarat</a></h4>
                                    <p class="mb-0 display-30 text-white">Amreli, Junagadh, Bhavnagar & More..</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-style5">
                        <div class="categories-img bg-img cover-background min-height-250"
                            data-background="img/content/job-categorie-02.jpg"></div>
                        <div class="card-body">
                            <span class="job-position">86 Jobs</span>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="categories-icon">
                                        <img src="img/icons/icon-14.png" alt="...">
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h4 class="h5 mb-1"><a href="job-listing.html" class="text-white">Maharashtra</a>
                                    </h4>
                                    <p class="mb-0 display-30 text-white">Raybag, Amravati & More..</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-style5">
                        <div class="categories-img bg-img cover-background min-height-250"
                            data-background="img/content/job-categorie-03.jpg"></div>
                        <div class="card-body">
                            <span class="job-position">20 Jobs</span>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="categories-icon">
                                        <img src="img/icons/icon-14.png" alt="...">
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h4 class="h5 mb-1"><a href="job-listing.html" class="text-white">Uttar Pradesh</a>
                                    </h4>
                                    <p class="mb-0 display-30 text-white">Bikapur, Ghazipur, Ghaziabad & More..</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-style5">
                        <div class="categories-img bg-img cover-background min-height-250"
                            data-background="img/content/job-categorie-04.jpg"></div>
                        <div class="card-body">
                            <span class="job-position">12 Jobs</span>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="categories-icon">
                                        <img src="img/icons/icon-14.png" alt="...">
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h4 class="h5 mb-1"><a href="job-listing.html" class="text-white">Kerala</a></h4>
                                    <p class="mb-0 display-30 text-white">Mannar, Vengola & More ...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-style5">
                        <div class="categories-img bg-img cover-background min-height-250"
                            data-background="img/content/job-categorie-05.jpg"></div>
                        <div class="card-body">
                            <span class="job-position">55 Jobs</span>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="categories-icon">
                                        <img src="img/icons/icon-14.png" alt="...">
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h4 class="h5 mb-1"><a href="job-listing.html" class="text-white">Uttarakhand</a>
                                    </h4>
                                    <p class="mb-0 display-30 text-white">Kharsali, Mukhba & More..</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-style5">
                        <div class="categories-img bg-img cover-background min-height-250"
                            data-background="img/content/job-categorie-06.jpg"></div>
                        <div class="card-body">
                            <span class="job-position">43 Jobs</span>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="categories-icon">
                                        <img src="img/icons/icon-14.png" alt="...">
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h4 class="h5 mb-1"><a href="job-listing.html" class="text-white">Madhya Pradesh</a>
                                    </h4>
                                    <p class="mb-0 display-30 text-white">Deori, Nandi & More..</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row mt-n1-9">
                    <div class="col-sm-6 col-lg-3 mt-1-9 text-center text-sm-start">
                        <div class="d-sm-flex align-items-center">
                            <div class="flex-shrink-0 mb-3 mb-sm-0">
                                <img src="img/icons/icon-09.png" alt="...">
                            </div>
                            <div
                                class="flex-grow-1 border-sm-start border-color-extra-light-gray ps-sm-3 ps-xl-4 ms-sm-3 ms-xl-4">
                                <h3 class="countup h1 text-secondary mb-1">400</h3>
                                <span class="text-muted">Jobs Posted</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mt-1-9 text-center text-sm-start">
                        <div class="d-sm-flex align-items-center">
                            <div class="flex-shrink-0 mb-3 mb-sm-0">
                                <img src="img/icons/icon-10.png" alt="...">
                            </div>
                            <div
                                class="flex-grow-1 border-sm-start border-color-extra-light-gray ps-sm-3 ps-xl-4 ms-sm-3 ms-xl-4">
                                <h3 class="countup h1 text-secondary mb-1">125</h3>
                                <span class="font-weight-500 text-muted">Jobs Filled</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mt-1-9 text-center text-sm-start">
                        <div class="d-sm-flex align-items-center">
                            <div class="flex-shrink-0 mb-3 mb-sm-0">
                                <img src="img/icons/icon-11.png" alt="...">
                            </div>
                            <div
                                class="flex-grow-1 border-sm-start border-color-extra-light-gray ps-sm-3 ps-xl-4 ms-sm-3 ms-xl-4">
                                <h3 class="countup h1 text-secondary mb-1">220</h3>
                                <span class="font-weight-500 text-muted">City</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mt-1-9 text-center text-sm-start">
                        <div class="d-sm-flex align-items-center">
                            <div class="flex-shrink-0 mb-3 mb-sm-0">
                                <img src="img/icons/icon-21.png" alt="...">
                            </div>
                            <div
                                class="flex-grow-1 border-sm-start border-color-extra-light-gray ps-sm-3 ps-xl-4 ms-sm-3 ms-xl-4">
                                <h3 class="countup h1 text-secondary mb-1">150</h3>
                                <span class="font-weight-500 text-muted">Workers</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- RECENT JOBS
        ================================================== -->
        <section class="bg-light recent-job-style1">
            <div class="container">
                <div class="section-heading2">
                    <span># Recent Jobs</span>
                    <h2><strong>Latest job</strong></h2>
                </div>
                <div class="row mt-n1-9">
                    <?php
                    $sql55 = "SELECT * FROM user_profile";
                    $result55 = mysqli_query($con,$sql55);
                    $num55 = mysqli_num_rows($result55);
                        if($num55 > 0){
                        while($row = mysqli_fetch_assoc($result55)){
                       ?>
                    <div class="col-md-6 col-lg-4 mt-1-9">
                        <div class="card border-color-extra-light-gray h-100 border-radius-5">
                            <div class="card-body p-1-6 p-xl-1-9">
                                <div class="d-flex mb-3">
                                    <div class="flex-shrink-0">
                                        <img src="<?php
                                        if(isset($row['picture'])){
                                            echo $row['picture'];
                                        }else{
                                            echo "img/avatar/user.png";
                                        }
                                        ?>" class="border-radius-50 w-40px" alt="...">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-0"><?php echo $row['fullname']; ?></h6>
                                        <span class="text-muted display-31">
                                            <!-- Nov 18, 2021 -->
                                            <?php echo substr($row['date'], 0, 10) ?>
                                        </span>
                                    </div>
                                </div>
                                <h5 class="text-primary mb-3"><?php echo $row['approxsalary']; ?> <span
                                        class="text-muted display-31">/ Month</span> </h5>
                                <div class="mb-4">
                                    <span class="display-30 me-2"><i
                                            class="fas fa-map-marker-alt pe-2"></i><?php echo $row['address']; ?></span>
                                    <span class="display-30"><i
                                            class="far fa-clock pe-2"></i><?php echo $row['workhour']; ?></span>
                                </div>
                                <a href="job-details.php?id=<?php echo $row['uid'] ?>" class="butn butn-md radius">Apply
                                    Now</a>


                                <div class="farmer_con">
                                    <ul>
                                        <li> <a href="#"> <i class="fa-solid fa-envelope"></i></a></li>
                                        <li> <a href="#"> <i class="fa-solid fa-phone"></i></a></li>
                                        <li> <i class="fa-solid fa-circle"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    }else{
                        echo "NO data found";
                    }
                        ?>
                    <!-- <div class="col-md-6 col-lg-4 mt-1-9">
                        <div class="card border-color-extra-light-gray h-100 border-radius-5">
                            <div class="card-body p-1-6 p-xl-1-9">
                                <div class="d-flex mb-3">
                                    <div class="flex-shrink-0">
                                        <img src="img/avatar/avatar-01.jpg" class="border-radius-50 w-40px" alt="...">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-0">Michelle Herz</h6>
                                        <span class="text-muted display-31">Nov 18, 2021</span>
                                    </div>
                                </div>
                                <h5 class="text-primary mb-3">12000 <span class="text-muted display-31">/ Month</span> </h5>
                                <div class="mb-4">
                                    <span class="display-30 me-2"><i class="fas fa-map-marker-alt pe-2"></i>Amreli, Gujarat</span>
                                    <span class="display-30"><i class="far fa-clock pe-2"></i>Full Time</span>
                                </div>
                                <a href="job-details.html" class="butn butn-md radius">Apply Now</a>

                                
                                <div class="farmer_con">
                                    <ul>
                                        <li  > <a href="#"> <i class="fa-solid fa-envelope"></i></a></li>
                                        <li > <a href="#"> <i class="fa-solid fa-phone"></i></a></li>
                                        <li >  <i class="fa-solid fa-circle"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mt-1-9">
                        <div class="card border-color-extra-light-gray h-100 border-radius-5">
                            <div class="card-body p-1-6 p-xl-1-9">
                                <div class="d-flex mb-3">
                                    <div class="flex-shrink-0">
                                        <img src="img/avatar/avatar-01.jpg" class="border-radius-50 w-40px" alt="...">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-0">Michelle Herz</h6>
                                        <span class="text-muted display-31">Nov 18, 2021</span>
                                    </div>
                                </div>
                                <h5 class="text-primary mb-3">12000 <span class="text-muted display-31">/ Month</span> </h5>
                                <div class="mb-4">
                                    <span class="display-30 me-2"><i class="fas fa-map-marker-alt pe-2"></i>Amreli, Gujarat</span>
                                    <span class="display-30"><i class="far fa-clock pe-2"></i>Full Time</span>
                                </div>
                                <a href="job-details.html" class="butn butn-md radius">Apply Now</a>

                                
                                <div class="farmer_con">
                                    <ul>
                                        <li  > <a href="#"> <i class="fa-solid fa-envelope"></i></a></li>
                                        <li > <a href="#"> <i class="fa-solid fa-phone"></i></a></li>
                                        <li >  <i class="fa-solid fa-circle"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mt-1-9">
                        <div class="card border-color-extra-light-gray h-100 border-radius-5">
                            <div class="card-body p-1-6 p-xl-1-9">
                                <div class="d-flex mb-3">
                                    <div class="flex-shrink-0">
                                        <img src="img/avatar/avatar-01.jpg" class="border-radius-50 w-40px" alt="...">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-0">Michelle Herz</h6>
                                        <span class="text-muted display-31">Nov 18, 2021</span>
                                    </div>
                                </div>
                                <h5 class="text-primary mb-3">12000 <span class="text-muted display-31">/ Month</span> </h5>
                                <div class="mb-4">
                                    <span class="display-30 me-2"><i class="fas fa-map-marker-alt pe-2"></i>Amreli, Gujarat</span>
                                    <span class="display-30"><i class="far fa-clock pe-2"></i>Full Time</span>
                                </div>
                                <a href="job-details.html" class="butn butn-md radius">Apply Now</a>

                                
                                <div class="farmer_con">
                                    <ul>
                                        <li  > <a href="#"> <i class="fa-solid fa-envelope"></i></a></li>
                                        <li > <a href="#"> <i class="fa-solid fa-phone"></i></a></li>
                                        <li >  <i class="fa-solid fa-circle"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mt-1-9">
                        <div class="card border-color-extra-light-gray h-100 border-radius-5">
                            <div class="card-body p-1-6 p-xl-1-9">
                                <div class="d-flex mb-3">
                                    <div class="flex-shrink-0">
                                        <img src="img/avatar/avatar-01.jpg" class="border-radius-50 w-40px" alt="...">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-0">Michelle Herz</h6>
                                        <span class="text-muted display-31">Nov 18, 2021</span>
                                    </div>
                                </div>
                                <h5 class="text-primary mb-3">12000 <span class="text-muted display-31">/ Month</span> </h5>
                                <div class="mb-4">
                                    <span class="display-30 me-2"><i class="fas fa-map-marker-alt pe-2"></i>Amreli, Gujarat</span>
                                    <span class="display-30"><i class="far fa-clock pe-2"></i>Full Time</span>
                                </div>
                                <a href="job-details.html" class="butn butn-md radius">Apply Now</a>

                                
                                <div class="farmer_con">
                                    <ul>
                                        <li  > <a href="#"> <i class="fa-solid fa-envelope"></i></a></li>
                                        <li > <a href="#"> <i class="fa-solid fa-phone"></i></a></li>
                                        <li >  <i class="fa-solid fa-circle"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mt-1-9">
                        <div class="card border-color-extra-light-gray h-100 border-radius-5">
                            <div class="card-body p-1-6 p-xl-1-9">
                                <div class="d-flex mb-3">
                                    <div class="flex-shrink-0">
                                        <img src="img/avatar/avatar-01.jpg" class="border-radius-50 w-40px" alt="...">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-0">Michelle Herz</h6>
                                        <span class="text-muted display-31">Nov 18, 2021</span>
                                    </div>
                                </div>
                                <h5 class="text-primary mb-3">12000 <span class="text-muted display-31">/ Month</span> </h5>
                                <div class="mb-4">
                                    <span class="display-30 me-2"><i class="fas fa-map-marker-alt pe-2"></i>Amreli, Gujarat</span>
                                    <span class="display-30"><i class="far fa-clock pe-2"></i>Full Time</span>
                                </div>
                                <a href="job-details.html" class="butn butn-md radius">Apply Now</a>

                                
                                <div class="farmer_con">
                                    <ul>
                                        <li  > <a href="#"> <i class="fa-solid fa-envelope"></i></a></li>
                                        <li > <a href="#"> <i class="fa-solid fa-phone"></i></a></li>
                                        <li >  <i class="fa-solid fa-circle"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <a href="candidate-details.html" class="butn w-100 radius fprofile_btn2">More Jobs <i
                        class="fa-solid fa-arrow-right"></i></a>
            </div>
        </section>

        <!-- TOP COMPANY
        ================================================== -->


        <!-- OUR PROCESS
        ================================================== -->
        <section class="bg-light">
            <div class="container">
                <div class="section-heading2">
                    <span># How We Work</span>
                    <h2><strong>Our working</strong> process</h2>
                </div>
                <div class="row mt-n1-9">
                    <div class="col-sm-6 col-lg-3 mt-1-9">
                        <div class="process-style2 first">
                            <div class="process-arrow">
                                <div class="process-icon-box">
                                    <img src="img/icons/icon-22.png" alt="...">
                                </div>
                                <div class="process-contnet">
                                    <h4 class="h5">01. Create Account</h4>
                                    <p class="mb-0">Sign Up Your Profile</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mt-1-9">
                        <div class="process-style2">
                            <div class="process-arrow">
                                <div class="process-icon-box">
                                    <img src="img/icons/icon-23.png" alt="...">
                                </div>
                                <div class="process-contnet">
                                    <h4 class="h5">02. CV / Resume Upload</h4>
                                    <p class="mb-0">Upload By Category</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mt-1-9">
                        <div class="process-style2">
                            <div class="process-arrow">
                                <div class="process-icon-box">
                                    <img src="img/icons/icon-24.png" alt="...">
                                </div>
                                <div class="process-contnet">
                                    <h4 class="h5">03. Find Vacancy</h4>
                                    <p class="mb-0">Choose A Suitable Job</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mt-1-9">
                        <div class="process-style2 last">
                            <div class="process-arrow">
                                <div class="process-icon-box">
                                    <img src="img/icons/icon-25.png" alt="...">
                                </div>
                                <div class="process-contnet">
                                    <h4 class="h5">04. Apply Them</h4>
                                    <p class="mb-0">Get Personal Job Offer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FEATURED CANDIDATES
        ================================================== -->
        <section>
            <div class="container">
                <div class="section-heading2">
                    <span># Farmers</span>
                    <h2><strong>Top</strong> worker's</h2>
                </div>
                <div class="featured-candidate owl-carousel owl-theme">
                    <?php
                      $sql56 = "SELECT * FROM user_profile WHERE `email` NOT IN ('{$_SESSION['email']}')  limit 5 ";
                      $result56 = mysqli_query($con,$sql56);
                      $num56 = mysqli_num_rows($result56);
                          if($num56 > 0){
                          while($row1 = mysqli_fetch_assoc($result56)){
                    ?>
                    <div class="card card-style7">
                        <div class="card-body">
                            <a class="candidate-favourite" href="#!"><i class="far fa-heart"></i></a>
                            <?php
                            if(!isset($row1['picture'])){
                                ?>
                            <img src="img/avatar/user.png" style="width: 96px;height:96px;"
                                class="border-radius-50 mb-3" alt="...">

                            <?php
                            }else{
                            ?>
                            <img src="<?php echo $row1['picture']; ?>" class="border-radius-50 mb-3" alt="...">
                            <?php
                          

                          }
                            ?>
                            <div class="candidate-info">
                                <h4 class="h5"><a
                                        href="candidate-details.php?id=<?php echo $row1['uid']; ?>"><?php echo $row1['fullname']; ?></a>
                                </h4>
                                <span class="display-30 text-muted d-block mb-2 font-weight-500"></span>
                                <div class="display-30 text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="px-2 py-1 bg-primary text-white ms-2 display-31">4.0</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span><i
                                        class="ti-location-pin text-secondary me-2 display-31 display-sm-30"></i><strong>
                                        <?php 
                                    if($row1['address'] == NULL){
                                        echo substr("Address Notset",0,5).'..';
                                    }else{
                                        echo substr($row1['address'],0,5).'..'; 
                                    }

                                    ?></strong></span>
                                <span><i
                                        class="far fa-money-bill-alt text-secondary me-2 display-31 display-sm-30"></i><strong><?php
                                if($row1['approxsalary'] == NULL){
                                    echo substr("Sallary Notset",0,5).'..';
                                }else{
                                    echo $row1['approxsalary']; 
                                }
                                 ?> / Month</strong></span>
                                <span><i class="ti-briefcase text-secondary me-2 display-31 display-sm-30"></i><strong>
                                        <?php 
                                    if($row1['workhour'] == NULL){
                                        echo substr("WorkHour Notset",0,5).'..';
                                    }else{
                                        echo $row1['workhour']; 
                                    }
                                    
                                    ?></strong></span>
                            </div>
                            <a href="candidate-details.php?id=<?php echo $row1['uid']; ?>"
                                class="butn w-100 radius">View Profile</a>
                        </div>
                    </div>
                    <?php
                          }
                        }
                        else{
                          echo "Data not found";
                        }
                    ?>
                </div>
                <!-- <a href="candidate-details.html" class="butn w-100 radius fprofile_btn">More Profile <i class="fa-solid fa-arrow-right"></i></a> -->
            </div>
        </section>

        <!-- TESTIMONIAL
        ================================================== -->
        <section class="bg-light">
            <div class="container">
                <div class="section-heading2">
                    <span># Reviews</span>
                    <h2><strong>Our satisfied</strong> Users</h2>
                </div>
                <div class="testimonial2-carousel owl-carousel owl-theme">
                    <?php
                        $sql = "SELECT * FROM review limit 5";
                        $result = mysqli_query($con,$sql);
                        $num = mysqli_num_rows($result);
                            
                            while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <div class="testimonial-wrapper">
                        <div class="testimonial-icon">
                            <i class="ti-quote-left"></i>
                        </div>
                        <p class="mb-4"><?php echo substr($row['description'],0,110).'..'; ?></p>
                        <div class="testimonial-box">
                            <div class="d-sm-flex justify-content-between align-items-center">
                                <div class="mb-2 mb-sm-0">
                                    <h4 class="h5"><?php echo substr($row['name'],0,6).'..' ?></h4>
                                    <!-- <span class="designation">Web Designer</span> -->
                                </div>
                                <div class="display-31 text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                            }
                    ?>
                </div>
                <a href="candidate-details.html" class="butn w-100 radius fprofile_btn2" style="max-width: 175px;">More
                    Reviews <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </section>

        <!-- BLOG
        ================================================== -->


        <!-- NEWSLETTER
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


<!-- Mirrored from jobboard.websitelayout.net/index-02.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Sep 2022 12:47:19 GMT -->

</html>