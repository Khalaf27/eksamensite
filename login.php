$sql = $conn->prepare("select * from scoreboard");
$sql->execute();
$result = $sql->get_result();
echo '<table border="5" cellpadding="5"> ';
echo "<tr>";
echo "<th>Name</th>";
echo "<th>Score</th>";

echo "</tr>";
//if ($result->num_rows > 0)
{
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["Name"]."</td>";
        echo "<td>".$row["Score"]."</td>";
    
        echo "</tr>";

    }    
}
//else
{
    echo "No score";
}
echo "</table>"
?>
     <?php
        $conn->close();
        ?>
    <p>
    
   Name : <input type="text" name="Name1" value="<?php echo isset($username) ? $username : '' ?>" style="position:absolute; left: 100px; width: 100px; height: 22px;"> 
     <br>
     <br>
    Score : <input type="text" name="score" value="<?php echo isset($score) ? $score : '' ?>" style="position:absolute; left: 100px; width: 100px; height: 22px; <br><br> ">
    
    </p>
    <?php


/// colone 3

 <form action="table.php" method="post">
    <?php
        $conn = new mysqli("localhost:3306", "root", "", "jsgame");
        $conn->set_charset("utf8");
    ?>
    <?php

            function findes($a, $b)
            {
                return true;
            }
    ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    // Create
if ($_REQUEST['submit'] == "create")
    {
        $number = $_REQUEST['Number'];
        $name = $_REQUEST['Navn'];
        $score = $_REQUEST['Score'];
        if ($number == "") $number = "ukendt";
        if ($username == "") $username = "ukendt"; 
        if ($score == "") $score = "ukendt"; 
       
        if (is_numeric($clubid)) 
        {
           $sql = $conn->prepare("insert into scoreboard (Number, Name, Score) values(?, ?, ?) ");
           $sql->bind_param("isi", $number, $name, $score);
           $sql->execute();
            $fejltekst = "Insert ok";
           $tekstfarve = "#000000"; 
        }
    }
?>
<?php
$sql = $conn->prepare("select * from scoreboard");
$sql->execute();
$result = $sql->get_result();
echo '<table border="5" cellpadding="5"> ';
echo "<tr>";
echo "<th>Nr</th>";
echo "<th>Name</th>";
echo "<th>Score</th>";

echo "</tr>";
//if ($result->num_rows > 0)
{
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["Number"]."</td>";
        echo "<td>".$row["Name"]."</td>";
        echo "<td>".$row["Score"]."</td>";
        echo "</tr>";

    }    
}
//else
{
    echo "No club";
}
echo "</table>"
?>
     <?php
        $conn->close();
        ?>
    <p>
    <!--
    Number : <input type="text" name="number" value="<?php echo isset($number) ? $number : '' ?>" style="position:absolute; left: 100px; width: 100px; height: 22px;"> 
     <br>
     <br>
    Name : <input type="text" name="name" value="<?php echo isset($username) ? $username : '' ?>" style="position:absolute; left: 100px; width: 100px; height: 22px; <br><br> ">
    <br>
    <br>
    Score : <input type="text" name="score" value="<?php echo isset($score) ? $score : '' ?>" style="position:absolute; left: 100px; width: 100px; height: 22px; <br><br> ">
    --->
    </form>


    ///

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save The Hostage</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-9ZfPnbegQSumzaE7mks2IYgHoayLtuto3AS6ieArECeaR8nCfliJVuLh/GaQ1gyM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@900&family=Cinzel:wght@900&family=Ewert&family=Geostar+Fill&family=Orbitron:wght@900&family=Vast+Shadow&display=swap" rel="stylesheet">
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
<form class="navnform" action="index.php" method="POST" style="display: none;">

<input id="navnscore" type="text" name="Name1" value="Indtast navn">
<input id="score1" name="score" type="hidden">
<input id="subknap" type="submit" value="Start Game">
<?php


  // Registration form
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        // require_once('index.php');
        
        $username = $_REQUEST['Name1'];
        $score = $_REQUEST['score'];
    
           $sql = $conn->prepare("insert into scoreboard (Name, Score) values(?, ?) ");
           $sql->bind_param("si", $username, $score);
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

<div class="box">
<button class="btn" id="replay">Reset<i ></i></button>
<button class="btn" id="play">Play<i ></i></button>
<button class="btn" id="reset">End</button>

</div>


    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>









