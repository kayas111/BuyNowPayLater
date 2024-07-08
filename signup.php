
<?php include './header.php'; ?>
<div class='row'>
<div class='col-md-4'></div>
<div style='padding-top:50px;' class='col-md-4'>

<div class='formContainer' ><form id="signUpForm" action="">
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
<div class='button1' onclick='ValidateSignUpForm()' >Sign up</div>

</form></div>


</div>
<div class='col-md-4'></div>
</div>

<script>
function ValidateSignUpForm(){
    
    if (document.querySelector('#signUpForm').name.value.trim()===''){
        ToastAlert("toastAlert2","Enter name","2000")
    }else{
        ToastAlert("toastAlert1","Succesful","2000")
    }


}

</script>

<?php include 'footer.php'; ?>