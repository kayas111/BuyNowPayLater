<?php include './connection.php'; ?>
<?php include './header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests Page</title>
    <link rel="stylesheet" href="./styles.css"> 
</head>
<body>

    <?php
    // Check if session is not started yet and start it
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_GET['serviceDescription']) && isset($_GET['bill']) && isset($_GET['clientId']) && isset($_GET['businessId'])) {
        // Get the details from the GET request
        $serviceDescription = $_GET['serviceDescription'];
        $bill = $_GET['bill'];
        $clientId = $_GET['clientId'];
        $businessId = $_GET['businessId'];
        $status = 'pending';

        // Insert the details of the request into the database
        $sql = "INSERT INTO requests (bill, clientId, businessId, status) 
                VALUES ('$bill', '$clientId', '$businessId', '$status')";
        
        if (mysqli_query($conn, $sql)) {
            echo "Request submitted successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    if (isset($_SESSION['user'])) {
        // If the user is logged in, display the services
    } else {
        // If the user is not logged in, redirect to the login page
        $_SESSION['alert'] = array('class' => 'toastAlert2', 'msg' => 'Log in to see the services', 'delay' => 4000);
        header('location:./login.php');
        exit(); // Ensure script stops after redirection
    }

    // Query to get all businesses
    $table = mysqli_query($conn, 'SELECT * FROM business;');
    if (mysqli_num_rows($table) < 1) {
        echo "<div>No services</div>";
    } else {
    ?>
    <div class="row">
        <?php foreach ($table as $row) { ?>
        <div class="col-12 col-md-3">
            <div class="business-card">
                
                <div class="business-info">
                    <h2 id="businessname" class="business-name"><?= $row['businessName'] ?></h2>
                
                    <p class="business-description"><span><?= $row['serviceDescription'] ?></span></p>
                    <p class="business-bill">Bill: <span id="businessbill"><?= $row['bill'] ?></span></p>
                    <p class="business-location">Location: <?= $row['location'] ?></p>
                    
                    <a href="?bill=<?= $row['bill'] ?>&serviceDescription=<?= $row['serviceDescription'] ?>&businessId=<?= $row['businessId'] ?>&clientId=<?= $_SESSION['user']['clientId'] ?>">  
                        <button class="request-button">Send request</button>
                    </a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php } ?>

    <script>
    function submitrequest(value) {
        console.log(value);
    }
    </script>
</body>
</html>

<?php include 'footer.php'; ?>
