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
    $table = mysqli_query($conn, 'select * from business;');
    if (mysqli_num_rows($table) < 1) {
        echo "<div>No services</div>";
    } else {
    ?>
    <div class="row">
        <?php foreach($table as $row) { ?>
        <div class="col-12 col-md-3">
            <div class="business-card">
                <div class="business-info">
                    <h2 class="business-name"><?=$row['businessName']?></h2>
                    <p class="business-description"><?=$row['serviceDescription']?></p>
                    <p class="business-bill">Bill: <?=$row['bill']?></p>
                    <p class="business-location">Location: <?=$row['location']?></p>
                    <button class="request-button">Send request</button>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php } ?>


</body>
</html>

<?php include 'footer.php'; ?>
