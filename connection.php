<?php
$server="localhost";
$user="root";
$password="";
$database="buynowpaylater";
$conn=mysqli_connect($server,$user,$password,$database);
if($conn->connect_error){

die ("connection failed: ".$conn->connect_error);

}else{

//echo ("Successfully connected to database.");





}


$name=json_decode($_POST['name'],true);

echo($name);




// $table=mysqli_query($conn,"SELECT * FROM client;");

// foreach($table as $object){
//     $data=$object->occupation;
//     echo json_encode($data). "\n";
// }


//echo(json_encode(mysqli_fetch_assoc($result)));






mysqli_close($conn);

?>