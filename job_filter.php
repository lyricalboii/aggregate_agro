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

if(isset($_POST['full-time'])){
    $fulltime = $_POST['full-time'];
    // $approxsalary = $_POST['approxsalary'];
    // $address = $_POST['address'];
    // $gender = $_POST['gender'];
    // $occupation = $_POST['occupation'];
    // $age = $_POST['age'];
    // $workhour = $_POST['workhour'];
    
    // $dp = $_POST['dp'];
    $id = $_SESSION['sendfrom'];

   
        
        $query = "SELECT * FROM `user_profile` WHERE `workhour` > 9";
        $query_run = mysqli_query($con, $query);

        $num = mysqli_num_rows($query_run);
        if($num > 0){
            
          $row =   mysqli_fetch_all($query_run, MYSQLI_ASSOC);

            $res = [
                'status' => 200,
                'message' => $row
            ];
            echo json_encode($res);
            return;

        }else{
            $res = [
                'status' => 500,
                'message' => 'No data found'
            ];
            echo json_encode($res);
            return;
        }


        // if($query_run)
        // {
        //     $res = [
        //         'status' => 200,
        //         'message' => $ftimeworker
        //     ];
        //     echo json_encode($res);
        //     return;
        // }
        // else
        // {
        //     $res = [
        //         'status' => 500,
        //         'message' => 'Error'
        //     ];
        //     echo json_encode($res);
        //     return;
        // }
    }



?>