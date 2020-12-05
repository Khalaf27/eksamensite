<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
if ($_REQUEST['knap'] == "create")
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
</body>
</html>    