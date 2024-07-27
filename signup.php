
<?php
include './header.php';
  ?>


<?php
if(isset($_SESSION['alert'])){
   
    $alert=$_SESSION['alert'];
 ?>
<script>ToastAlert('<?= $alert['class']?>','<?= $alert['msg']?>', <?= $alert['delay'] ?>)</script>

<?php
unset($_SESSION['alert']);
}
?>


<div class='bgImg row'>
<div class='col-md-3'></div>
<div style='padding-top:50px;' class='col-md-6'>

<div class='formContainer' >
<form id="signupForm" method = "POST" action="./components/handleFormRequests.php">
<div class='formLabel'>Sign up</div>
<div class='formInputLabel'>Name</div>
<input type="text" name="name" class='inputHoverEffect1'><br></br>
<div class='formInputLabel'>Contact</div>
<input type="text" name="contact"class='inputHoverEffect1'><br></br>
<div class='formInputLabel'>Email</div>
<input type="text" name="email" class='inputHoverEffect1'><br></br>
<div class='formInputLabel'>Occupation</div>
<input type="text" name="occupation" class='inputHoverEffect1'><br></br>
<div class='formInputLabel'>Password</div>
<input type="text" name="password" class='inputHoverEffect1'><br></br>
<div class='formInputLabel'>Confirm password</div>
<input type="text" name="password2" class='inputHoverEffect1'><br></br>
<input type="hidden" name="signupForm" class='inputHoverEffect1'>
<div class='button1' onclick="ValidateSignUpForm()" >Sign up</div>

</form></div>


</div>
<div class='col-md-3'></div>
</div>
<script>
function ValidateSignUpForm() {
    const form = document.querySelector('#signupForm');
    const name = form.name.value.trim();
    const contact = form.contact.value.trim();
    const email = form.email.value.trim();
    const occupation = form.occupation.value.trim();
    const password = form.password.value.trim();
    const password2 = form.password2.value.trim();


    if (name === '') {
        ToastAlert("toastAlert2", "Full Name is required", 2000);
        return false;
    }
    if (contact === '') {
        ToastAlert("toastAlert2", "Contact is required", 2000);
        return false;
    }
    if (!/^\d{10}$/.test(contact)) {
        ToastAlert("toastAlert2", "Contact must be exactly 10 digits", 2000);
        return false;
    }
    if (email === '') {
        ToastAlert("toastAlert2", "Email is required", 2000);
        return false;
    }
   
    if (password.length < 4) {
        ToastAlert("toastAlert2", "Password must be at least 4 characters long", 2000);
        return false;
    }
    if (password2 === '') {
        ToastAlert("toastAlert2", "Confirm password is required", 2000);
        return false;
    }
    if (password !== password2) {
        ToastAlert("toastAlert2", "Passwords do not match", 2000);
        return false;
    }

    
        form.submit();
}

</script>
<?php include 'footer.php'; ?>