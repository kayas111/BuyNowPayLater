<?php include './connection.php'; ?>
<?php include './header.php'; ?>

<?php

$result=mysqli_query($conn,'select * from business;');
if (mysqli_num_rows($result)<1){




?>


<div>No services</div>

<?php
} else{
    
    $row=mysqli_fetch_assoc($result);

echo json_encode($row);
?>
<div><?=$row['businessName']?></div>
<div><?=$row['serviceDescription']?></div>
<div><?=$row['bill']?></div>
<div><?=$row['location']?></div>

<?php
}
?>

















<?php include 'footer.php'; ?>