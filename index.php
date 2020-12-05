
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save The Hostage</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-9ZfPnbegQSumzaE7mks2IYgHoayLtuto3AS6ieArECeaR8nCfliJVuLh/GaQ1gyM" crossorigin="anonymous">
</head>
<body onload="countdown();">
 <?php
        $conn = new mysqli("localhost:3306", "root", "", "jsgame");
        $conn->set_charset("utf8"); 
   
     if($conn->connect_error)
    {
        echo "Failed to connect to MySQL : " . $conn->connect_error . " (" . $conn->connect_errno . ")";
        exit(); 
    }
   
    ?>

<form class="navnform" action="index.php" method="POST" style="display: block;">
<input id="navnscore" type="text" name="number" value="2">
<input id="navnscore" type="text" name="Name1" value="Indtast navn">
<input id="score1" name="score" type="hidden">
<input id="subknap" type="submit" value="Start Game">




</form>



<?php 
    // Registration form
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        // require_once('index.php');
        $number = $_REQUEST['number'];
        $username = $_REQUEST['Name1'];
        $score = $_REQUEST['score'];
    
           $sql = $conn->prepare("insert into scoreboard (Number, Name, Score) values(?, ?, ?) ");
           $sql->bind_param("isi",$number, $username, $score);
            $sql->execute();
            $conn->close();
    }
    
?>

    
   <div class="container"  >
<h1>Macho Game</h1>

  <div class="row">
    <div class="col-sm">
      One of three columns
    </div>
    <div class="col-sm">
      <canvas width="500" height="500" id="canvas">
        </canvas>
<progress  id="health" value="100" max="100"></progress>
<div class="timebox">  
        <input class="time" id="minutes" type="text"> :
        <input class="time2" id="seconds" type="text"> 
    </div> 
    </div>
    <div class="col-sm">
     
    </div>
  </div>
</div>



</div>

</div>

<div class="box">
<button class="btn" id="replay">Reset<i ></i></button>
<button class="btn" id="play">Play<i ></i></button>
<button class="btn" id="reset">End</button>

</div>


    <script src="script.js"></script>
</body>
</html>









