<?php include './header.php'; ?>
<div class='bgImg row'>
<div  class='col-md-3'>

</div>

<div style='padding-top:50px;' class='col-md-6'>
<div class='formContainer' ><form id="confirmRequestForm" action="">
<div class='formLabel'>Check and confirm request</div>
<div class='formInputLabel'>Enter request ID</div>
<input type="text" name="requestId" class='inputHoverEffect1'><br></br>
<div class='button1' onclick='AcknowledgeRequet()' >Acknowledge request</div>

</form></div>


</div>
<div class='col-md-3'></div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function ToastAlert(className, message, duration)
    alert(message);

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

<?php include 'footer.php'; ?>
