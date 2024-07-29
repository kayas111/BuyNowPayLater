<?php include './header.php'; ?>

<div class='bgImg row'>
    <div class='col-md-3'></div>

    <div style='padding-top:50px;' class='col-md-6'>
        <div class='formContainer'>
            <form id="confirmRequestForm" method="POST" action="./components/handleFormRequests.php">
                <div class='formLabel'>Check and confirm request</div>
                <div class='formInputLabel'>Enter request ID</div>
                <input type="hidden" name="fetchRequest" class='inputHoverEffect1' value="true"> //<!-- Adjust the value as needed -->
                <input type="text" name="requestId" class='inputHoverEffect1'>
                <input type="hidden" id="requestViewed" name="requestViewed" value="false">
                <div style='padding-top:3px;'>
                    <div class='button1' onclick='fetchRequest()'>View request</div>
                </div>

                <div id="requestDescription">
                    <?php
                    if (isset($_SESSION['request'])) {
                    ?>
                        <div><?= $_SESSION['request']['description'] ?></div>
                        <script>
                            document.getElementById('requestViewed').value = "true";
                        </script>
                    <?php
                        unset($_SESSION['request']);
                    }
                    ?>
                </div>

                <br><br>
                <div class='button1' id='acknowledgeButton' onclick='AcknowledgeRequest()'>Acknowledge request</div>
            </form>
        </div>
    </div>

    <div class='col-md-3'></div>
</div>

<script>
function fetchRequest() {
    let form = document.querySelector("#confirmRequestForm");
    form.submit();
}

function AcknowledgeRequest() {
    var requestId = document.querySelector('#confirmRequestForm').requestId.value.trim();
    var requestViewed = document.querySelector('#confirmRequestForm').requestViewed.value;

    if (requestId === '') {
        ToastAlert("toastAlert2", "Enter request ID", "2000");
    } else if (requestViewed !== "true") {
        ToastAlert("toastAlert2", "Please view the request before acknowledging", "2000");
    } else {
        //$.ajax({
          //  type: 'POST',
            //url: 'handleFormRequests.php',
           // data: { action: 'acknowledge', request_id: requestId },
            //success: function(response) {
                //var data = JSON.parse(response);
               // if (data.message) {
                    //ToastAlert("toastAlert1", data.message, "2000");
               // } else {
                //    ToastAlert("toastAlert2", 'Error: ' + data.error, "2000");
               // }
           // },
            //error: function(xhr, status, error) {
               // ToastAlert("toastAlert2", 'Error: ' + error, "2000");
           // }
        //}
    //);
    }
}

//Function to enable acknowledge button if the request has been viewed
function enableAcknowledgeButton() {
    var requestViewed = document.querySelector('#confirmRequestForm').requestViewed.value;
    var acknowledgeButton = document.getElementById('acknowledgeButton');

}

//Call the function initially to set the button state based on session data
enableAcknowledgeButton();
</script>

<?php include './footer.php'; ?>
