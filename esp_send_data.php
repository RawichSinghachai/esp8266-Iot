<?php
include 'connect.php';

    $Temp = $_GET['temp'];
    $Hum = $_GET['hum'];

    $sql = "INSERT INTO dht (temp,hum)
    VALUES
    ('$Temp','$Hum')";

$result = mysqli_query($condb,$sql)or die("Error in sql : $sql".mysqli_error($sql));
mysqli_close($condb);

if($result){
    echo 'Insert Succesfully';
}else{
    echo 'Error !!';
}

?>