
<?php include './header.php'; ?>


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
<div class='formContainer' ><form id="loginForm" method = "POST" action="./components/handleFormRequests.php">
<div class='formLabel'>Log in</div>
<div class='formInputLabel'>Email</div>
<input type="text" name="email" class='inputHoverEffect1'><br></br>
<div class='formInputLabel'>Password</div>
<input type="hidden" name="login" class='inputHoverEffect1'>
<input type="text" name="password" class='inputHoverEffect1'><br></br>

<div class='button1' onclick='Login()' >Log in</div>

</form></div>


</div>
<div class='col-md-3'></div>
</div>

<script>
function Login(){
    const form = document.querySelector('#loginForm');
    if (Array.from(document.querySelector('#loginForm').email.value.trim()).find((character)=>{
            return character==='@'
        })===undefined){
               
        ToastAlert("toastAlert2","Enter valid email","3000")
    }
    
    else if (document.querySelector('#loginForm').password.value.trim()===''){
        ToastAlert("toastAlert2","Enter password","3000")
    }    
    else{
        
form.submit()



    }


}

</script>

<?php include 'footer.php'; ?>