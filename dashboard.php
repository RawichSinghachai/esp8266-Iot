<?php
    include 'connect.php';
        if (!empty($_POST)) {
        $bt = $_POST['button'];
        $ID = $_POST['id'];

        $sql = "UPDATE  button
        SET switch = '$bt' WHERE id = '$ID' ";

        $result = mysqli_query($condb,$sql)or die("Error in sql : $sql".mysqli_error($sql));
        mysqli_close($condb);
        };
    // if($result){
    // echo 'Insert Succesfully';
    // } else {
    // echo 'Error !!';
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="page1.css">
    <title>Dashboard</title>
    
</head>
<body>


    <div class="all">
        <div class="nav">
            <ul>

                <li class="list1">
                     <a href="http://192.168.1.57/Testphp/dashboard.php">
                    <span class="icon"><i class="fa-solid fa-house"></i></span>
                    <span class="title">Home</span>
                     </a>
                </li>

                <li>
                    <a href="http://192.168.1.57//Testphp/data.php">
                    <span class="icon"><i class="fa-solid fa-database"></i></span>
                    <span class="title">Data</span>
                    </a>
                </li>
            </ul>
        </div>


        <!--content-->

        <div class="content">
            <div class="cards">
                <div class="card">
                    <span><i class="fa-solid fa-temperature-full"></i></span>
                    <?php   
                        include 'connect.php';
                        $sql1 = "SELECT temp FROM dht ORDER BY ID DESC";
                        $all = mysqli_query($condb,$sql1);
                        $r = mysqli_fetch_array($all);
                        echo "<p> $r[0] </p>";
                    ?>
                    <span class="degree">degree</span>
                </div>


                <div class="card">
                    <span><i class="fa-solid fa-cloud"></i></span>
                    <?php   
                        include 'connect.php';
                        $sql1 = "SELECT hum FROM dht ORDER BY ID DESC";
                        $all = mysqli_query($condb,$sql1);
                        $r = mysqli_fetch_array($all);
                        echo "<p> $r[0] </p>";
                    ?>
                    <span class="degree">degree</span>
                </div>
            </div>


            <div class="control">
                <div class="button">
                    <p>BUTTON 1</p>
                    <form action="" method="post" id="button1-on" >
                        <input type="hidden" name="button" value="on">
                        <input type="hidden" name="id" value="1">
                    </form>

                    <form action="" method="post" id="button1-off">
                        <input type="hidden" name="button" value="off">
                        <input type="hidden" name="id" value="1">
                    </form>

                    <button type="submit" form="button1-on" onclick="value1on()">ON</button>
                    <button type="submit" form="button1-off" onclick="value1off()">OFF</button>
                </div>




                <div class="button">
                    <p>BUTTON 2</p>
                    <form action="" method="post" id="button2-on" >
                        <input type="hidden" name="button" value="on">
                        <input type="hidden" name="id" value="2">
                    </form>

                    <form action="" method="post" id="button2-off">
                        <input type="hidden" name="button" value="off">
                        <input type="hidden" name="id" value="2">
                    </form>

                    <button type="submit" form="button2-on">ON</button>
                    <button type="submit" form="button2-off">OFF</button>
                </div>




                <div class="button">
                    <p>BUTTON 3</p>
                    <form action="" method="post" id="button3-on" >
                        <input type="hidden" name="button" value="on">
                        <input type="hidden" name="id" value="3">
                    </form>

                    <form action="" method="post" id="button3-off">
                        <input type="hidden" name="button" value="off">
                        <input type="hidden" name="id" value="3">
                    </form>

                    <button type="submit" form="button3-on">ON</button>
                    <button type="submit" form="button3-off">OFF</button>
                </div>


                <div class="button">
                    <p>BUTTON 4</p>
                    <form action="" method="post" id="button4-on" >
                        <input type="hidden" name="button" value="on">
                        <input type="hidden" name="id" value="4">
                    </form>

                    <form action="" method="post" id="button4-off">
                        <input type="hidden" name="button" value="off">
                        <input type="hidden" name="id" value="4">
                    </form>

                    <button type="submit" form="button4-on">ON</button>
                    <button type="submit" form="button4-off">OFF</button>
                </div>

                

                <div class="button">
                    <p>BUTTON 5</p>
                    <form action="" method="post" id="button5-on" >
                        <input type="hidden" name="button" value="on">
                        <input type="hidden" name="id" value="5">
                    </form>

                    <form action="" method="post" id="button5-off">
                        <input type="hidden" name="button" value="off">
                        <input type="hidden" name="id" value="5">
                    </form>

                    <button type="submit" form="button5-on">ON</button>
                    <button type="submit" form="button5-off">OFF</button>
                </div>



     

            </div>
        </div>


          
        








       





        </div>




    </div>

</script>
</body>
</html>