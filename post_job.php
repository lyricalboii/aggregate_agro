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

if(isset($_POST['name'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['email'];
    $hour_price = $_POST['hour_price'];
    if($hour_price == ''){
        $hour_price = 0;
    }
    $fix_price = $_POST['fix_price'];
    if($fix_price == ''){
        $fix_price = 0;
    }
    $message = $_POST['message'];

    $query = "INSERT INTO `jobs` ( `name`, `email`, `subject`, `hour_price`, `fix_price`, `message`, `date`) VALUES ('$name', '$email', '$subject', '$hour_price', '$fix_price', '$message', current_timestamp())";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Requested Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Error'
        ];
        echo json_encode($res);
        return;
    }

}




?>