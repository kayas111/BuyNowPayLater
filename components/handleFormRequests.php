<?php
session_start();
$formData=$_POST;



if(isset($formData["signupForm"])){
echo "here";
    $_SESSION['alert_type']='success';
    $_SESSION['alert_msg']='successfully signed up';
    header('location:../signup.php');




}




