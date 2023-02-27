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


<!-- Mirrored from jobboard.websitelayout.net/candidate-job-alerts.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Sep 2022 12:48:19 GMT -->
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

    <!-- dashboard css -->
    <link href="css/dashboard.css" rel="stylesheet" />

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
        include "nav/f_nav.php";
    ?>

        <!-- EMPLOYER DASHBOARD
        ================================================== -->
        <section class="py-0">
            <div class="row g-0">
               
                <div class="col-lg-12">
                    <div class="dashboard-right-sidebar">
                        <div class="row mb-2-2">
                            <div class="col-lg-12 mb-1-9">
                                <h3 class="mb-3">Job Alerts</h3>
                         
                            </div>
                            <div class="col-lg-12">
                                <div class="dashboard-title">
                                    <div class="d-md-flex justify-content-between align-items-center">
                                        <div class="mb-4 mb-md-0">
                                            <h4 class="mb-0 h5">Recently <span class="text-primary">Job Requests</span></h4>
                                        </div>
                                        <form action="#!" method="post" enctype="multipart/form-data" onclick="">
                                            <div class="quform-elements">
                                                <div class="row align-items-center">

                                                    <!-- Begin Select element -->
                                                    <div class="col-md-5 mb-4 mb-md-0">
                                                        <div class="quform-element">
                                                            <div class="quform-input">
                                                                <select id="show" class="form-control form-select" name="show">
                                                                    <option value="">Show</option>
                                                                    <option value="Show 10">Show 10</option>
                                                                    <option value="Show 20">Show 20</option>
                                                                    <option value="Show 30">Show 30</option>
                                                                    <option value="Show 40">Show 40</option>
                                                                    <option value="Show 50">Show 50</option>
                                                                    <option value="Show 60">Show 60</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Select element -->

                                                    <!-- Begin Select element -->
                                                    <div class="col-md-7">
                                                        <div class="quform-element">
                                                            <div class="quform-input">
                                                                <select id="sortby-month" class="form-control form-select" name="sortby-month">
                                                                    <option value="">Last 7 days</option>
                                                                    <option value="Last 6 Months">Last 2 Months</option>
                                                                    <option value="Last 12 Months">Last 4 Months</option>
                                                                    <option value="Last 16 Months">Last 6 Months</option>
                                                                    <option value="Last 24 Months">Last 8 Months</option>
                                                                    <option value="Last 5 Year">Last 1 Year</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Select element -->

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="dashboard-widget">
                                    <div class="table-responsive">
                                        <table class="table custome-table">
                                            <thead>
                                                <tr>
                                                    <th>Location</th>
                                                    <th>Name</th>
                                                    <th>Date</th>
                                                    <th>Experience</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h6>Gujarat</h6><span class="text-muted display-30"><i class="ti-location-pin"></i> Amreli</span>
                                                    </td>
                                                    <td>Hareshbhai Desai</td>
                                                    <td>22/01/2023</td>
                                                    <td>2 Years</td>
                                                    <td>
                                                        <ul class="action-list">
                                                            <li><a href="#!"><span class="ti-eye"></span></a></li>
                                                            <li><a href="#!"><span class="ti-pencil-alt"></span></a></li>
                                                            <li><a href="#!"><span class="ti-trash"></span></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>Gujarat</h6><span class="text-muted display-30"><i class="ti-location-pin"></i> Amreli</span>
                                                    </td>
                                                    <td>Hareshbhai Desai</td>
                                                    <td>22/01/2023</td>
                                                    <td>2 Years</td>
                                                    <td>
                                                        <ul class="action-list">
                                                            <li><a href="#!"><span class="ti-eye"></span></a></li>
                                                            <li><a href="#!"><span class="ti-pencil-alt"></span></a></li>
                                                            <li><a href="#!"><span class="ti-trash"></span></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>Gujarat</h6><span class="text-muted display-30"><i class="ti-location-pin"></i> Amreli</span>
                                                    </td>
                                                    <td>Hareshbhai Desai</td>
                                                    <td>22/01/2023</td>
                                                    <td>2 Years</td>
                                                    <td>
                                                        <ul class="action-list">
                                                            <li><a href="#!"><span class="ti-eye"></span></a></li>
                                                            <li><a href="#!"><span class="ti-pencil-alt"></span></a></li>
                                                            <li><a href="#!"><span class="ti-trash"></span></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>Gujarat</h6><span class="text-muted display-30"><i class="ti-location-pin"></i> Amreli</span>
                                                    </td>
                                                    <td>Hareshbhai Desai</td>
                                                    <td>22/01/2023</td>
                                                    <td>2 Years</td>
                                                    <td>
                                                        <ul class="action-list">
                                                            <li><a href="#!"><span class="ti-eye"></span></a></li>
                                                            <li><a href="#!"><span class="ti-pencil-alt"></span></a></li>
                                                            <li><a href="#!"><span class="ti-trash"></span></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>Gujarat</h6><span class="text-muted display-30"><i class="ti-location-pin"></i> Amreli</span>
                                                    </td>
                                                    <td>Hareshbhai Desai</td>
                                                    <td>22/01/2023</td>
                                                    <td>2 Years</td>
                                                    <td>
                                                        <ul class="action-list">
                                                            <li><a href="#!"><span class="ti-eye"></span></a></li>
                                                            <li><a href="#!"><span class="ti-pencil-alt"></span></a></li>
                                                            <li><a href="#!"><span class="ti-trash"></span></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>Gujarat</h6><span class="text-muted display-30"><i class="ti-location-pin"></i> Amreli</span>
                                                    </td>
                                                    <td>Hareshbhai Desai</td>
                                                    <td>22/01/2023</td>
                                                    <td>2 Years</td>
                                                    <td>
                                                        <ul class="action-list">
                                                            <li><a href="#!"><span class="ti-eye"></span></a></li>
                                                            <li><a href="#!"><span class="ti-pencil-alt"></span></a></li>
                                                            <li><a href="#!"><span class="ti-trash"></span></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>Gujarat</h6><span class="text-muted display-30"><i class="ti-location-pin"></i> Amreli</span>
                                                    </td>
                                                    <td>Hareshbhai Desai</td>
                                                    <td>22/01/2023</td>
                                                    <td>2 Years</td>
                                                    <td>
                                                        <ul class="action-list">
                                                            <li><a href="#!"><span class="ti-eye"></span></a></li>
                                                            <li><a href="#!"><span class="ti-pencil-alt"></span></a></li>
                                                            <li><a href="#!"><span class="ti-trash"></span></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>Gujarat</h6><span class="text-muted display-30"><i class="ti-location-pin"></i> Amreli</span>
                                                    </td>
                                                    <td>Hareshbhai Desai</td>
                                                    <td>22/01/2023</td>
                                                    <td>2 Years</td>
                                                    <td>
                                                        <ul class="action-list">
                                                            <li><a href="#!"><span class="ti-eye"></span></a></li>
                                                            <li><a href="#!"><span class="ti-pencil-alt"></span></a></li>
                                                            <li><a href="#!"><span class="ti-trash"></span></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>Gujarat</h6><span class="text-muted display-30"><i class="ti-location-pin"></i> Amreli</span>
                                                    </td>
                                                    <td>Hareshbhai Desai</td>
                                                    <td>22/01/2023</td>
                                                    <td>2 Years</td>
                                                    <td>
                                                        <ul class="action-list">
                                                            <li><a href="#!"><span class="ti-eye"></span></a></li>
                                                            <li><a href="#!"><span class="ti-pencil-alt"></span></a></li>
                                                            <li><a href="#!"><span class="ti-trash"></span></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>Gujarat</h6><span class="text-muted display-30"><i class="ti-location-pin"></i> Amreli</span>
                                                    </td>
                                                    <td>Hareshbhai Desai</td>
                                                    <td>22/01/2023</td>
                                                    <td>2 Years</td>
                                                    <td>
                                                        <ul class="action-list">
                                                            <li><a href="#!"><span class="ti-eye"></span></a></li>
                                                            <li><a href="#!"><span class="ti-pencil-alt"></span></a></li>
                                                            <li><a href="#!"><span class="ti-trash"></span></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>Gujarat</h6><span class="text-muted display-30"><i class="ti-location-pin"></i> Amreli</span>
                                                    </td>
                                                    <td>Hareshbhai Desai</td>
                                                    <td>22/01/2023</td>
                                                    <td>2 Years</td>
                                                    <td>
                                                        <ul class="action-list">
                                                            <li><a href="#!"><span class="ti-eye"></span></a></li>
                                                            <li><a href="#!"><span class="ti-pencil-alt"></span></a></li>
                                                            <li><a href="#!"><span class="ti-trash"></span></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>Gujarat</h6><span class="text-muted display-30"><i class="ti-location-pin"></i> Amreli</span>
                                                    </td>
                                                    <td>Hareshbhai Desai</td>
                                                    <td>22/01/2023</td>
                                                    <td>2 Years</td>
                                                    <td>
                                                        <ul class="action-list">
                                                            <li><a href="#!"><span class="ti-eye"></span></a></li>
                                                            <li><a href="#!"><span class="ti-pencil-alt"></span></a></li>
                                                            <li><a href="#!"><span class="ti-trash"></span></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    
                    </div>
                    
                </div>
            </div>
            
        </section>
        

    </div>

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


<!-- Mirrored from jobboard.websitelayout.net/candidate-job-alerts.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Sep 2022 12:48:19 GMT -->
</html>