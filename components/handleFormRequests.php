<?php
session_start();
$formData=$_POST;



if(isset($formData["signupForm"])){
echo "here";
    $_SESSION['alert']=array('alert_type'=>'success','alert_msg'=>'Succesfully signed up');
    header('location:../signup.php');

}




