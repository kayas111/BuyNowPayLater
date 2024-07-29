<?php
include './connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $businessName = $_POST['businessName'];
    $serviceDescription = $_POST['serviceDescription'];
    $bill = $_POST['bill'];
    $location = $_POST['location'];

    // Handle image upload
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["businessImage"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $uploadOk = 1;

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["businessImage"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["businessImage"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // If everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["businessImage"]["tmp_name"], $targetFile)) {
            echo "The file ". htmlspecialchars(basename( $_FILES["businessImage"]["name"])). " has been uploaded.";

            // Insert business data into the database
            $stmt = $conn->prepare("INSERT INTO business (businessName, serviceDescription, bill, location, imagePath) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $businessName, $serviceDescription, $bill, $location, $targetFile);

            if ($stmt->execute()) {
                echo "New business added successfully.";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>
