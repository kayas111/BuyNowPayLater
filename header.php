<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BNPL</title>
    <link type='text/css' rel='stylesheet'  href='./styles.css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src='./components/functions.js'></script>
   
</head>
<body style="font-size:14px;">

<div class='navBar'>   
  <div  class="row">
<div  class='col-md-2 businessName'>Buy Now Pay Later</div>
<div class='col-md-10'> 
  <nav  class="navbar navbar-expand-lg navbar-dark">
<button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span> <span class='navDropdownButtonText'>Menu</span> 
</button> 
<div class="navbar-collapse justify-content-md-left collapse" id="navbarsExample08" >
  <ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-value" href="./index.php"><span class="hovereffect">Home</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-value"  href="./signup.php"><span class="hovereffect">Sign up</span></a>
    </li>
    <li class="nav-item">
<a class="nav-value"  href="./login.php"><span class="hovereffect">Log in </span></a>
    </li>
    <li class="nav-item">
<a class="nav-value"  href="./confirmrequest.php"><span class="hovereffect">Confirm requests </span></a>
    </li>
    <li class="nav-item">
<a class="nav-value"  href="./services.php"><span class="hovereffect">Services </span></a>
    </li>    
  </ul>
</div>
</nav>
</div>
</div>
</div>
    
<?php
if(isset($_SESSION['user'])){
  
  echo 'logged in';
  ?>

<div>



</div>

<?php
} else{
  echo 'logged out';

}

?>
    
