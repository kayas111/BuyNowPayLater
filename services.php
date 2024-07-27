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

if(isset($_GET['serviceDescription'])&&isset($_GET['bill'])&&isset($_GET['clientId'])&&isset($_GET['businessId'])){
// Write a command to insert the details of the request to the database;

$serviceDescription=$_GET['serviceDescription'];
$bill=$_GET['bill'];
$clientId=$_GET['clientId'];
$buinessId=$_GET['businessId'];
$status='pending';






}else{
    ;
}


if(isset($_SESSION['user'])){
;
}else{
    $_SESSION['alert']=array('class'=>'toastAlert2','msg'=>'log in to see the services','delay'=>4000);
    header('location:./login.php');
}


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
                    <h2 id="businessname" class="business-name"><?=$row['businessName']?></h2>
                
                    <p  class="business-description"> <span ><?=$row['serviceDescription']?></span>  </p>
                    <p class="business-bill">Bill: <span id="businessbill"><?=$row['bill']?></span> 
                    <p class="business-location">Location: <?=$row['location']?></p>
                    
                    <a href="?bill=<?=$row['bill']?>&serviceDescription=<?=$row['serviceDescription']?>&businessId=<?=$row['businessId']?>&clientId=<?=$_SESSION['user']['clientId']?>">  <button class="request-button">Send request</button></a>
                 </div>

            </div>
        </div>


        <?php } ?>
    </div>
    <?php } ?>

   <script>
function submitrequest(value) {
    console.log( value);
   

}

</script>
</body>
</html>

<?php include 'footer.php'; ?>
