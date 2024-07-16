<?php
include '../connection.php';

session_start();
$formData=$_POST;



if(isset($formData["signupForm"])){

$name=$formData['name'];
$contact=$formData['contact'];
$email=$formData['email'];
$occupation=$formData['occupation'];
$password=$formData['password'];
$query="insert into client (clientName,contact,email,occupation,password) values ('$name','$contact','$email','$occupation','$password')";

if(mysqli_query($conn,$query)==TRUE){
 
$_SESSION['alert']=array('class'=>'toastAlert1','msg'=>'Successfully signed up');
header('location:../signup.php');
}else{
    echo 'No success';

}

   

}




