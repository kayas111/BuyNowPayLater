
<?php include './header.php'; ?>
<div class='bgImg row'>
<div class='col-md-3'></div>
<div style='padding-top:50px;' class='col-md-6'>
<div class='formContainer' ><form id="loginForm" action="">
<div class='formLabel'>Log in</div>
<div class='formInputLabel'>Email</div>
<input type="text" name="email" class='inputHoverEffect1'><br></br>
<div class='formInputLabel'>Password</div>
<input type="text" name="password" class='inputHoverEffect1'><br></br>

<div class='button1' onclick='Login()' >Log in</div>

</form></div>


</div>
<div class='col-md-3'></div>
</div>

<script>
function Login(){
    if (Array.from(document.querySelector('#loginForm').email.value.trim()).find((character)=>{
            return character==='@'
        })===undefined){
               
        ToastAlert("toastAlert2","Enter valid email","3000")
    }
    
    else if (document.querySelector('#loginForm').password.value.trim()===''){
        ToastAlert("toastAlert2","Enter password","3000")
    }    
    else{
        ToastAlert("toastAlert1","proceed","2000")
    }


}

</script>

<?php include 'footer.php'; ?>