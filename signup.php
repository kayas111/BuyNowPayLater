<?php include './header.php'; ?>
<div class='row'>
<div class='col-md-4'></div>
<div style='padding-top:50px;' class='col-md-4'>

<div class='formContainer' ><form id="signUpForm" action="">
<div class='formLabel'>Sign up</div>
<div class='formInputLabel'>Full Name</div>
<input type="text" name="name" class='inputHoverEffect1'><br></br>
<div class='formInputLabel'>Contact</div>
<input type="text" name="contact"class='inputHoverEffect1'><br></br>
<div class='formInputLabel'>Email</div>
<input type="text" name="email" class='inputHoverEffect1'><br></br>
<div class='formInputLabel'>Password</div>
<input type="password" name="password" class='inputHoverEffect1'><br></br>
<div class='formInputLabel'>Confirm password</div>
<input type="password" name="password2" class='inputHoverEffect1'><br></br>
<div class='button1' onclick='ValidateSignUpForm()'>Sign up</div>

</form></div>

</div>
<div class='col-md-4'></div>
</div>

<script>
function ValidateSignUpForm() {
    const form = document.querySelector('#signUpForm');
    const name = form.name.value.trim();
    const contact = form.contact.value.trim();
    const email = form.email.value.trim();
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
    if (password === '') {
        ToastAlert("toastAlert2", "Password is required", 2000);
        return false;
    }
    if (password.length < 8) {
        ToastAlert("toastAlert2", "Password must be at least 8 characters long", 2000);
        return false;
    }
    if (!/\d/.test(password) || !/[!@#$%^&*]/.test(password)) {
        ToastAlert("toastAlert2", "Password must contain at least one number and one symbol", 2000);
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

    ToastAlert("toastAlert1", "Successful", 2000);
    // Submit the form or perform other actions here if needed
    form.submit();
}

function ToastAlert(toastClass, message, duration) {
    const toast = document.createElement('div');
    toast.className = toastClass;
    toast.innerText = message;
    document.body.appendChild(toast);
    setTimeout(() => {
        toast.remove();
    }, duration);
}
</script>

<?php include 'footer.php'; ?>
