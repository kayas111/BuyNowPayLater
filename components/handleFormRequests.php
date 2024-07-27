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
$result=mysqli_query($conn,"select email from client where email='$email'");

if(mysqli_num_rows($result)>0){
 $_SESSION['alert']=array('class'=>'toastAlert2','msg'=>'Email already exists','delay'=>3000);
header('location:../signup.php');

    }else{

        $query="insert into client (clientName,contact,email,occupation,password) values ('$name','$contact','$email','$occupation','$password')";

if(mysqli_query($conn,$query)==TRUE){
    
$_SESSION['alert']=array('class'=>'toastAlert1','msg'=>'Successfully signed up','delay'=>3000);
header('location:../signup.php');
}else{
    echo 'No success';

}

    }




   

}
if(isset($formData["login"])){


    $email=$formData['email'];
    $password=$formData['password'];
    $result=mysqli_query($conn,"select email from client where email='$email'");   
    if(mysqli_num_rows($result)>0){

        $result=mysqli_query($conn,"select clientName,email,password,clientId from client where email='$email' and password='$password'"); 
        if(mysqli_num_rows($result)>0){
         $user=mysqli_fetch_assoc($result);
        
      $_SESSION['user']=array('clientName'=>$user['clientName'],'clientId'=>$user['clientId']);
$_SESSION['alert']=array('class'=>'toastAlert1','msg'=>'logged in successfully','delay'=>3000);
header('location:../login.php');
        }else{
            $_SESSION['alert']=array('class'=>'toastAlert2','msg'=>'Wrong password','delay'=>3000);
            header('location:../login.php');

        }


        
    }else{

        $_SESSION['alert']=array('class'=>'toastAlert2','msg'=>'Not signed up','delay'=>3000);
        header('location:../login.php');
    }

} if(isset($formData["fetchRequest"])){
    $requestId=$formData['requestId'];
    

    $result=mysqli_query($conn,"select * from requests where requestId='$requestId'");   
    if(mysqli_num_rows($result)>0){
        $_SESSION['request']=array('description'=>'posh rice and meat');
         
        header('location:../confirmrequest.php');
       


        
    }else{

        $_SESSION['alert']=array('class'=>'toastAlert2','msg'=>'Request does not exist','delay'=>3000);
   
       
        header('location:../confirmrequest.php');
    }



}


