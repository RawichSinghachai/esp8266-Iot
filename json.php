<?php

header('Content-Type:application/json');
include 'connect.php';

$sql = "SELECT * FROM button";
$result = mysqli_query($condb,$sql);

$data = array();
while($row = mysqli_fetch_assoc($result)){
    $data[] = $row;
}

mysqli_close($condb);
echo json_encode($data);

?>