<?php
require "db/db.php";
// $loggedin = true;

require_once 'db/config.php';
// if(!isset($_SESSION['user_token']) AND !isset($_SESSION['email'])){
//     header("location: login.php");
//     // die();
//   }else{
// if(isset($_SESSION['user_token'])){

// $sql = "SELECT * FROM user_profile WHERE token = '{$_SESSION['user_token']}'";
// $result = mysqli_query($con,$sql);

// if(mysqli_num_rows($result) > 0){
//     $userinfo = mysqli_fetch_assoc($result);
    
//  }
// }
// else{
//     $sql = "SELECT * FROM user_profile WHERE email = '{$_SESSION['email']}' ";
//     $result = mysqli_query($con,$sql);

//     if(mysqli_num_rows($result) > 0){
//         $userinfo = mysqli_fetch_assoc($result);
//     }
//   }
// }
$invalidotp = false;
$email_exist = true;
if(isset($_POST['usrotp'])){
    $usrotp = $_POST['usrotp'];
    $email = $_SESSION['email'];
    $sql_query = "SELECT * FROM `register` WHERE `email` = '$email'";
    $result_query = mysqli_query($con,$sql_query);
    $num = mysqli_num_rows($result_query);
    if($num > 0){
        $row = mysqli_fetch_assoc($result_query);
        $occupation = $row['occupation'];
        if($usrotp == $row['otp']){
            $query = "UPDATE `register` SET `verified` = '1' WHERE `register`.`email` = '$email'";
            $result = mysqli_query($con,$query);
            if($result){
              if($occupation == "worker"){
                header("location: index-02.php");
              }else if($occupation == "farmer"){
                header("location: index-04.php");
              }else{
                header("location: commingsoon.php");
              }
                echo "updated";
            }

        }else{
            $invalidotp = true;
        }
    }else{
        $email_exist = false;
        // echo "<script>
        // setTimeout(() => {
        //     location.href = 'login.php'
        // }, 3000);
        // </script>";
        header("location: login.php");
    }
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="assets/css/img/logo.png">
    <title>Agrotech</title>
    
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
    <!-- FontAwesome Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
    />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap"
    rel="stylesheet"
    />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

.job_offer{
    overflow: scroll;
    height: 100vh;
    overflow-x: hidden;
}

.farmer_con {
    position: relative;
    left: -30px;
    top: 30px;
}

.farmer_con ul{

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
  /* background-color: #e9e9e9; */
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
      .login-with-google-btn {    text-align: center;
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
    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen,Ubuntu,Cantarell,"Fira Sans","Droid Sans","Helvetica Neue",sans-serif;
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

  a{
    text-decoration: none;
  }
  
  .inner-box {
    background: white;
  }



      </style>
  </head>
  <body>

  <div class="main-wrapper">

        <!-- HEADER
        ================================================== -->
       
                    

    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            <form action="verifyotp.php" method="post" autocomplete="off" class="sign-in-form">
              <div class="logo">
                <img src="img/logos/logo.png" alt="easyclass" />
                <h4>Aggregte Agro</h4>
              </div>

              <div class="heading">
                <h2>Verify email</h2>
                <h6>Already verify?</h6>
                <a href="login.php" class="toggle">Login</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="number" class="input-field" autocomplete="off" name="usrotp" required/>
                  <label>Enter Otp</label>
                </div>

                
                <?php
                    // if($invalid){
                    //     echo '<div class="alert alert-danger" role="alert">
                    //         Invalid Login Details!
                    //     </div>'; 
                    // }
                    // if($notv){
                    //   echo '<div class="alert alert-danger" role="alert">
                    //         Email Not verified
                    //     </div>'; 
                    // }
                ?>

                <input type="submit" name="submit" value="Verify" class="sign-btn" />
                
              </div>
            </form>

            <form action="login.php" method="post" autocomplete="off" class="sign-up-form">
              <div class="logo">
                <img src="img/logos/logo.png" alt="easyclass" />
                <h4>Aggregte Agro</h4>
              </div>

              <div class="heading">
                <h2>Get Started</h2>
                <h6>Already have an account?</h6>
                <a href="#" class="toggle">Sign in</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input type="text" minlength="4" class="input-field" autocomplete="off" name="first_name" required />
                  <label>First Name</label>
                </div>

                <div class="input-wrap">
                  <input type="text" minlength="4" class="input-field" autocomplete="off" name="last_name" required />
                  <label>Last Name</label>
                </div>

                <div class="input-wrap">
                  <input type="email" class="input-field" autocomplete="off" name="mail" required />
                  <label>Email</label>
                </div>

                <div class="input-wrap">
                  <input type="number" class="input-field" autocomplete="off" name="phoneno" required />
                  <label>Mobile No</label>
                </div>

                <div class="input-wrap">
                  <input type="password" class="input-field" autocomplete="off" name="password" required />
                  <label>Password</label>
                </div>

                <div class="input-wrap">
                  <input type="password" class="input-field" autocomplete="off" name="confirm_password" required />
                  <label>Confirm Password</label>
                </div>



                <input type="submit" name="submit1" value="Sign Up" class="sign-btn" />

                <p class="text">
                  By signing up, I agree to the
                  <a href="#">Terms of Services</a> and
                  <a href="#">Privacy Policy</a>
                </p>
              </div>
            </form>
          </div>

          <div class="carousel">
            <!-- <div class="wrapper"> -->
              <div class="count_1">
              <div class="containerr">
                <!-- <i class="fa-solid fa-w"></i> -->
                <span class="num" data-val="400">000</span>
                <span class="text">Worker</span>
              </div>
        
              <div class="containerr">
                <!-- <i class="fa-solid fa-f"></i> -->
                <span class="num" data-val="340">000</span>
                <span class="text">Farmer</span>
              </div>

            </div>
        
              <div class="count_1">          
                    <div class="containerr">
                      <!-- <i class="fa-solid fa-s"></i> -->
                <span class="num" data-val="225">000</span>
                <span class="text">Seller</span>
              </div>
        
              <div class="containerr">
                <!-- <i class="fa-solid fa-y"></i> -->
                <span class="num" data-val="280">000</span>
                <span class="text">Yard</span>
              </div>
            </div>
            <!-- </div> -->
            
          </div>
        </div>
      </div>
    </main>

    <!-- <div class="containerrr">
      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reiciendis alias qui numquam tempore hic doloremque labore impedit ipsum est! Tenetur iusto quasi rerum ratione sapiente provident dolores voluptatem similique veritatis repudiandae facere, quod amet deserunt eaque, odio beatae! Eveniet fuga sit consectetur sed perferendis suscipit aliquid, tenetur sequi corrupti, fugiat, laborum numquam itaque possimus alias repudiandae exercitationem! Eligendi exercitationem quasi aut ex illum voluptates voluptatem. Ab cumque sed ullam consequuntur esse atque reprehenderit culpa, assumenda alias ad ducimus, necessitatibus, autem quasi fugit! Quisquam nisi voluptatem consequatur possimus consequuntur, accusantium quae, enim blanditiis error voluptate commodi accusamus. Necessitatibus amet obcaecati qui sit quasi eligendi dicta totam laudantium aliquid, fuga vero. Sunt perferendis vitae aspernatur maiores sapiente blanditiis reprehenderit, modi dicta necessitatibus voluptates quis ipsam asperiores! Natus velit iste, aliquid quia provident quasi illo doloribus voluptate, temporibus ducimus itaque sapiente aspernatur a debitis animi magnam officia laboriosam tenetur. Libero tenetur quisquam explicabo. Corrupti aspernatur excepturi laudantium enim iusto perferendis ducimus. Quam officiis deserunt culpa asperiores ipsum esse aliquid quidem a vitae voluptate repellendus ad iure reprehenderit dolores molestias iste libero, blanditiis error. Sapiente eum obcaecati rem laudantium ipsam amet aut ex magni, expedita id voluptate perferendis quae consequatur possimus similique fuga consectetur, placeat iusto! Asperiores, quasi. Sed nisi quibusdam aspernatur perspiciatis, autem nobis perferendis magnam temporibus mollitia nam reprehenderit dolores magni. Consequatur velit blanditiis doloremque sit cupiditate vero voluptatum facere sapiente reiciendis. Optio iste illum consequuntur quis perferendis odio sint, molestiae necessitatibus aperiam maxime incidunt vitae beatae sed aspernatur placeat, mollitia modi asperiores. Sint sit adipisci illum quod enim velit porro quibusdam necessitatibus praesentium amet. Quis at quae voluptas possimus, laboriosam, nesciunt, totam quos unde eaque porro placeat ex dolorum repellendus amet repudiandae corrupti aut. Nulla numquam distinctio enim, laudantium tempora nostrum dolore architecto cupiditate, minus soluta voluptates dolor. Consequuntur quisquam, aliquam hic fugit est veniam ullam libero, facilis laudantium aut alias esse saepe voluptate atque, excepturi iste. Odio illo reiciendis ea. Delectus molestiae sapiente quaerat libero quam saepe autem nemo tempora, aperiam perspiciatis ab est a quod, vel ullam magni vero quo molestias, asperiores harum alias ratione rerum veniam aliquam! Amet reprehenderit et doloremque voluptatum a sapiente dolorum ullam autem iusto aut repellat, officiis vero obcaecati ab molestias aspernatur eos corrupti voluptas optio dicta? Nam id doloribus atque reiciendis esse assumenda quas alias labore repellendus iste expedita adipisci praesentium cum debitis nisi enim quia, quidem dolore perspiciatis modi quis rem error fuga! Possimus dolorum provident quis, quam eaque laborum assumenda deleniti id. Animi quam velit impedit, beatae numquam officia incidunt cum laboriosam doloribus, accusamus, adipisci suscipit. Neque dolor nesciunt modi necessitatibus fuga culpa illo fugiat a laborum totam. Distinctio quaerat nobis nam quos asperiores, quia ex doloremque eaque nulla numquam, reprehenderit modi mollitia quasi. Modi a consequuntur vero nesciunt odio fuga assumenda perspiciatis. Veritatis vel totam odit culpa deserunt reiciendis. Repellat maiores fuga voluptates tempora a quia error molestiae delectus, illum reprehenderit rerum iure odit, adipisci accusantium asperiores, numquam magni assumenda. Deserunt minus ipsum enim alias praesentium beatae vel ex ipsa.</p>
    </div> -->


  
    <!-- FOOTER
    ================================================== -->
  </div>
  <!-- Javascript file -->
  <!-- start scroll to top -->
  <a href="#!" class="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
  <!-- end scroll to top -->
  <script src="js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
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

</body>
</html>
