<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="page2.css">
    <title>Data</title>
</head>
<body>
<?php
include 'connect.php';
$query = "SELECT * FROM dht";
$result = mysqli_query($condb,$query);
?>

    <div class="all">
        <div class="nav">
            <ul>

                <li>
                     <a href="http://192.168.1.57/Testphp/dashboard.php">
                    <span class="icon"><i class="fa-solid fa-house"></i></span>
                    <span class="title">Home</span>
                     </a>
                </li> 

                <li class="list2">
                    <a href="http://192.168.1.57//Testphp/data.php">
                    <span class="icon"><i class="fa-solid fa-database"></i></span>
                    <span class="title">Data</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="content">
            <div class="frame">
                <table border="1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Temp</th>
                            <th>Hum</th>
                            <th>DATE</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($result as $row) { ?>
                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['temp'];?></td>
                            <td><?php echo $row['hum'];?></td>
                            <td><?php echo $row['date'];?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                
                </table>
            </div>


        </div>










    </div>
</body>
</html>