<?php include './connection.php'; ?>
<?php include './header.php'; ?>

<?php

$table=mysqli_query($conn,'select * from business;');
if (mysqli_num_rows($table)<1){




?>


<div>No services</div>

<?php
} else{?>
<div class='row'>

    

<?php foreach($table as $row){?>

<div class='col-md-4'>

<div><?=$row['businessName']?></div>
<div><?=$row['serviceDescription']?></div>
<div><?=$row['bill']?></div>
<div><?=$row['location']?></div>


</div>
<?php
}

?>
    
</div>
<?php
}
?>

















<?php include 'footer.php'; ?>