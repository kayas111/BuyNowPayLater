<?php include './header.php'; ?>




<div class='bgImg row'>
<div  class='col-md-3'>

</div>

<div style='padding-top:50px;' class='col-md-6'>
<div class='formContainer' ><form id="confirmRequestForm" method="POST" action="./components/handleFormRequests.php">
<div class='formLabel'>Check and confirm request</div>
<div class='formInputLabel' >Enter request ID</div>
<input type="hidden" name="fetchRequest" class='inputHoverEffect1'>
<input type="text" name="requestId" class='inputHoverEffect1'>
<div style='padding-top:3px;'><div class='button1' onclick='fetchRequest()'>View request</div></div>

<div>


<?php
if(isset($_SESSION['request'])){
  
 ?>
<div><?= $_SESSION['request']['description']?><div>

<?php
unset($_SESSION['request']);
} else{?>

<script>ToastAlert('toastAlert2','No request',3000)</script>

<?php
}
?>

</div>

<br></br>
<div class='button1' onclick='AcknowledgeRequet()' >Acknowledge request</div>


</form></div>


</div>
<div class='col-md-3'></div>
</div>


<script>
 function fetchRequest(){
    
    let form=document.querySelector("#confirmRequestForm")
    
    form.submit();

 }

function AcknowledgeRequest() {
    var requestId = document.querySelector('#confirmRequestForm').requestId.value.trim();
    if (requestId === '') {
        ToastAlert("toastAlert2", "Enter request ID", "2000");
    } else {
        $.ajax({
            type: 'POST',
            url: 'request_handler.php',
            data: { action: 'confirm', request_id: requestId },
            success: function(response) {
                var data = JSON.parse(response)
                if (data.message) {
                    ToastAlert("toastAlert1", data.message, "2000");
                } else {
                    ToastAlert("toastAlert2", 'Error: ' + data.error, "2000");
                }
            },
            error: function(xhr, status, error) {
                ToastAlert("toastAlert2", 'Error: ' + error, "2000");
            }
        });
    }
}
</script>

<?php include './footer.php'; ?>
