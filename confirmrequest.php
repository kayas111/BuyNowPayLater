
<?php include './header.php'; ?>
<div class='bgImg row'>
<div  class='col-md-3'>

</div>

<div style='padding-top:50px;' class='col-md-6'>
<div class='formContainer' ><form id="confirmRequestForm" action="">
<div class='formLabel'>Check and confirm request.</div>
<div class='formInputLabel'>Enter request ID</div>
<input type="text" name="requestId" class='inputHoverEffect1'><br></br>
<div class='button1' onclick='AcknowledgeRequet()' >Acknowledge request</div>

</form></div>


</div>
<div class='col-md-3'></div>




</div>

<script>
function AcknowledgeRequet(){
    if (document.querySelector('#confirmRequestForm').requestId.value.trim()===''){
        ToastAlert("toastAlert2","Enter request ID","2000")
    }    
    else{
        ToastAlert("toastAlert1","proceed","2000")
    }


}

</script>

<?php include 'footer.php'; ?>