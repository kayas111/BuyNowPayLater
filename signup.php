
<?php
include './header.php';
  ?>


<div class='row'>
<div class='col-md-3'></div>
<div style='padding-top:50px;' class='col-md-6'>

<div class='formContainer' >
   

<?php
    if(isset($_SESSION['alert_type'])){

     
?>

<script>
console.log('lisa')
</script>
  <div class="alert alert-<?= $_SESSION['alert_type']?>">

  <?= $_SESSION['alert_msg']?>
  </div>



<?php 
unset($_SESSION['alert_type']);
unset($_SESSION['alert_msg']);
}
?> 

<form id="signupForm" method = "POST" action="./components/handleFormRequests.php">
<div class='formLabel'>Sign up</div>
<div class='formInputLabel'>Name</div>
<input type="text" name="name" class='inputHoverEffect1'><br></br>
<div class='formInputLabel'>Contact</div>
<input type="text" name="contact"class='inputHoverEffect1'><br></br>
<div class='formInputLabel'>Email</div>
<input type="text" name="email" class='inputHoverEffect1'><br></br>
<div class='formInputLabel'>Password</div>
<input type="text" name="password" class='inputHoverEffect1'><br></br>
<div class='formInputLabel'>Confirm password</div>
<input type="text" name="password2" class='inputHoverEffect1'><br></br>
<input type="hidden" name="signupForm" class='inputHoverEffect1'>
<div class='button1' >Sign up</div>

</form></div>


</div>
<div class='col-md-3'></div>
</div>


<?php include 'footer.php'; ?>