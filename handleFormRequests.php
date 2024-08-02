<?php
include '../connection.php';
session_start();
$formData = $_POST;

if (isset($formData["signupForm"])) {
    $name = $formData['name'];
    $contact = $formData['contact'];
    $email = $formData['email'];
    $occupation = $formData['occupation'];
    $password = $formData['password'];
    $result = mysqli_query($conn, "SELECT email FROM client WHERE email='$email'");

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['alert'] = array('class' => 'toastAlert2', 'msg' => 'Email already exists', 'delay' => 3000);
        header('location:../signup.php');
    } else {
        $query = "INSERT INTO client (clientName, contact, email, occupation, password) VALUES ('$name', '$contact', '$email', '$occupation', '$password')";
        if (mysqli_query($conn, $query)) {
            $_SESSION['alert'] = array('class' => 'toastAlert1', 'msg' => 'Successfully signed up', 'delay' => 3000);
            header('location:../signup.php');
        } else {
            echo 'No success';
        }
    }
}

if (isset($formData["login"])) {
    $email = $formData['email'];
    $password = $formData['password'];
    $result = mysqli_query($conn, "SELECT email FROM client WHERE email='$email'");
    if (mysqli_num_rows($result) > 0) {
        $result = mysqli_query($conn, "SELECT clientName, email, password, clientId FROM client WHERE email='$email' AND password='$password'");
        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            $_SESSION['user'] = array('clientName' => $user['clientName'], 'clientId' => $user['clientId']);
            $_SESSION['alert'] = array('class' => 'toastAlert1', 'msg' => 'Logged in successfully', 'delay' => 3000);
            header('location:../login.php');
        } else {
            $_SESSION['alert'] = array('class' => 'toastAlert2', 'msg' => 'Wrong password', 'delay' => 3000);
            header('location:../login.php');
        }
    } else {
        $_SESSION['alert'] = array('class' => 'toastAlert2', 'msg' => 'Not signed up', 'delay' => 3000);
        header('location:../login.php');
    }
}

if (isset($formData["fetchRequest"])) {
    $requestId = $formData['requestId'];
    $result = mysqli_query($conn, "SELECT * FROM requests WHERE requestId='$requestId'");
    if (mysqli_num_rows($result) > 0) {
       // Set appropriate description
        $_SESSION['request'] = array('description');  
       // Set session variable indicating the request has been viewed 
        $_SESSION['request_viewed'] = true;  
        header('location:../confirmrequest.php');
    } else {
        $_SESSION['alert'] = array('class' => 'toastAlert2', 'msg' => 'Request does not exist', 'delay' => 3000);
        header('location:../confirmrequest.php');
    }
}
//View the request before acknowledging
if (isset($formData["acknowledgeRequest"])) {
    if (!isset($_SESSION['request_viewed']) || $_SESSION['request_viewed'] !== true) {
        echo json_encode(["error" => "View the request before acknowledging"]);
        exit();
    }

    $requestId = $formData['requestId'];
    $sql = "UPDATE requests SET status = 'Successful' WHERE requestId = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        error_log("Prepare failed: " . $conn->error);
        echo json_encode(["error" => "Prepare failed: " . $conn->error]);
        exit();
    }

    $stmt->bind_param("i", $requestId);
    
    if (!$stmt->execute()) {
        error_log("Execute failed: " . $stmt->error);
        echo json_encode(["error" => "Execute failed: " . $stmt->error]);
    } else {
        if ($stmt->affected_rows > 0) {
            echo json_encode(["message" => "Request acknowledged successfully"]);
        } else {
            echo json_encode(["error" => "No rows affected. Check if the request ID exists."]);
        }
    }

    $stmt->close();
    unset($_SESSION['request_viewed']);  // Clear the session variable after acknowledging
}

if (isset($formData["verifyRequestStatus"])) {
    $requestId = $formData['requestId'];

    // First, update the status from 'Pending' to 'Successful'
    $updateQuery = "UPDATE requests SET status='Successful' WHERE requestId='$requestId' AND status='Pending'";
    $updateResult = mysqli_query($conn, $updateQuery);

    // Check if the update was successful
    if ($updateResult) {
        // Now, verify the request status
        $selectQuery = "SELECT status FROM requests WHERE requestId='$requestId'";
        $selectResult = mysqli_query($conn, $selectQuery);

        if ($selectResult) {
            $row = mysqli_fetch_assoc($selectResult);
            if ($row['status'] === 'Successful') {
                echo json_encode(["message" => "Request status is now 'Successful'"]);
            } else {
                echo json_encode(["error" => "Request status is not 'Successful'. Current status: " . $row['status']]);
            }
        } else {
            echo json_encode(["error" => "Failed to verify request status"]);
        }
    } else {
        echo json_encode(["error" => "Failed to update request status"]);
    }
}


$conn->close();
?>
