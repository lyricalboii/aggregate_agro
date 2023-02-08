<?php
require "db/db.php";
// $loggedin = true;

require_once 'db/config.php';
if(isset($_POST['first_name'])){
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $mail = $_POST['mail'];
  $phoneno = $_POST['phoneno'];
  $password = $_POST['password'];
  $usr_occupation = $_POST['usr_occupation'];

  $user_id = rand ( 1000 , 999999 ); 
  $insert = "INSERT INTO `register` ( `uid`,`occupation`, `fullname`, `email`, `phoneno`, `password`,`otp`,`verified`, `date`) VALUES ( $user_id,'farmer', '$first_name', '$last_name', '$mail', '$phoneno', '$password',$user_id,0, current_timestamp())";

  $result_insert = mysqli_query($con,$insert);
  echo "inserted";

}else{
  echo "not set ";
}
?>
