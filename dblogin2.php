<html>
    <head>
        User Registration
        <br/>
        <br/>
	</head>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="text" name="username">&nbsp;&nbsp;Username 
            <br>
            <input type="text" name="password">&nbsp;&nbsp;Password 
            <br>
            <input type="text" name="name">&nbsp;&nbsp;Name
            <br/>
            <br/>
            <input type="submit" name="submit" value="Register">
        </form>
    </body>
</html>

<?php 
    // Registration form
    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        require_once('dblogin1.php');
        // remove special characters
        // adding basic security (mysqli_real_escape_string) to avoid SQL injection (' or 0=0 #)
        $username = $conn->real_escape_string($_POST['username']);
        // adding basic password hash encryption
        $password = sha1($_POST['password']);
        $name = $conn->real_escape_string($_POST['name']);
        // check if username exist, else insert
        $check = $conn->query("SELECT username from users WHERE username = '$username' LIMIT 1");
        if ($check->num_rows == 1) echo "<p>Username already exists!</p>";
        else 
        {
            $insert = "INSERT INTO users (id, username, password, name) VALUES (NULL, '$username', '$password', '$name')";
            if($conn->query($insert))
            {
                echo "New user witn name = " . $name . " registered!";
            }
            else
            {
                echo "Something went wrong";
            }
        }
        $conn->close();
    }
?>
