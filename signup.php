
<?php include './header.php'; ?>
<div class='row'>
<div class='col-md-3'></div>
<div style='padding-top:50px;' class='col-md-6'>

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
<div class='col-md-3'></div>
</div>

<script>
function ValidateSignUpForm(){
    
    if (document.querySelector('#signUpForm').name.value.trim()===''){
        ToastAlert("toastAlert2","Enter name","2000")
  
        fetch('http://localhost:80/buynowpaylater/connection.php',{method:"post",
headers: { 'Content-type': 'application/json' },
body:'name='+JSON.stringify({name:'isaac'})
}).then(resp=>resp.json()).then(resp=>{
    console.log(resp)
})
  



    }else{
        ToastAlert("toastAlert1","Succesful","2000")


        fetch('http://localhost:80/buynowpaylater/connection.php',{method:"post",
headers: { 'Content-type': 'application/json' },
body:JSON.stringify({name:'isaac'})
})


    }


}

</script>

<?php include 'footer.php'; ?>