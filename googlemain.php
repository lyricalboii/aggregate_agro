<?php
// echo "hello";
require "db/db.php";
// $loggedin = true;

// if(!isset($_SESSION['email'])){
//     $loggedin = false;
//     header("location: login.php");
// }else{
//     $loggedin = true;
//     $online = $_SESSION['online'];
//     $email = $_SESSION['email'];
//     $id = $_SESSION['id'];
    
   
// }
require_once 'db/config.php';



if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);
  
    // get profile info
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $userinfo = [
        'email' => $google_account_info['email'],
        'fullname' => $google_account_info['name'],
        'gender' => $google_account_info['gender'],
        'picture' => $google_account_info['picture'],
        'token' => $google_account_info['id'],
    ];

    $sql = "SELECT * FROM user_profile WHERE email = '{$userinfo['email']}'";
    $result = mysqli_query($con,$sql);

    if(mysqli_num_rows($result) > 0){
        $userinfo = mysqli_fetch_assoc($result);
        $token = $userinfo['token'];
    }else{
        $user_id = rand ( 1000 , 999999 ); 
        
        $sql = "INSERT INTO `user_profile` (`uid`, `picture`, `token`, `email`, `fullname`, `phoneno`, `address`, `gender`, `age`, `workhour`, `approxsalary`, `date`) VALUES ($user_id, '{$userinfo['picture']}', {$userinfo['token']}, '{$userinfo['email']}', '{$userinfo['fullname']}', NULL, NULL, '{$userinfo['gender']}', NULL, NULL,NULL, CURRENT_TIMESTAMP);";
        $insert = "INSERT INTO `register` ( `uid`,`occupation`, `first_name`, `last_name`, `email`, `phoneno`, `password`,`otp`,`verified`, `date`) VALUES ( $user_id,'farmer', NULL, NULL, '{$userinfo['email']}', NULL, NULL,NULL,1, current_timestamp())";
        $result = mysqli_query($con,$sql);
        $result = mysqli_query($con,$insert);
        if($result){
            $token = $userinfo['token'];
        }else{
            echo "user is not created";
            die();
        }

    }
    // $email =  $google_account_info->email;
    // $name =  $google_account_info->name;
    $_SESSION['user_token'] = $userinfo['token'];
    $_SESSION['sendfrom'] = $userinfo['uid'];
    $_SESSION['id'] = $userinfo['uid'];
    $_SESSION['email'] =$userinfo['email'];
    
    header("location: index-02.php");
    // header("location: myprofile.php");

  
    // now you can use this profile info to create account in your website and make user logged in.
  }else{
    if(!isset($_SESSION['user_token'])){
        header("location: login.php");
        die();
      }


    $sql = "SELECT * FROM user_profile WHERE token = '{$_SESSION['user_token']}'";
    $result = mysqli_query($con,$sql);

    if(mysqli_num_rows($result) > 0){
        $userinfo = mysqli_fetch_assoc($result);
        $token = $userinfo['token'];
        header("location: login.php");

     }
  } 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome</title>
</head>
<body>
    <img src="<?php echo $userinfo['picture'];?>" alt="" width="90px" height="90px">
    
    <ul>
        <li>Full name: <?php echo $userinfo['fullname']; ?></li>
        <li>Email: <?php echo $userinfo['email']; ?></li>
        <li>Gender: <?php echo $userinfo['gender']; ?></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</body>
</html>