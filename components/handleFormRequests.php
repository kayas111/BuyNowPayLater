<?php
session_start();
$formData=$_POST;



if(isset($formData["signupForm"])){
echo "here";
    $_SESSION['alert']=array('class'=>'toastAlert1','msg'=>'Successfully signed up');
    header('location:../signup.php');

}




