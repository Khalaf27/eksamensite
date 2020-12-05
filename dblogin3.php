<?php
    // Login form
    if (isset($_POST['submit'])) {
        require_once("dblogin1.php");
        // remove special characters
        // adding basic security (mysqli_real_escape_string) to avoid SQL injection (' or 0=0 #)
        $username = $conn->real_escape_string($_POST['username']);
        $password = sha1($_POST['password']);
        $read = "SELECT * FROM users WHERE username = '$username' AND password = '$password' LIMIT 1";
        $result = $conn->query($read);
        $conn->close();
        // if the query is NOT returning anything there is no match in the database
        if (!$result->num_rows == 1) 
        {
            echo "<p>Invalid username/password</p>";
        } 
        else 
        {
            // start a PHP session
            session_start();
            $_SESSION['logged_in'] = true;
            //redirect and stop present code
            header("Location: dblogin5.php"); 
            exit();      
        }
    }
?>

<html>
    <head>
        Login
        <br>
        <br>
    </head>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="text" name="username">&nbsp;&nbsp;Username 
            <br>
            <input type="text" name="password">&nbsp;&nbsp;Password 
            <br>
            <br>
            <input type="submit" name="submit" value="Login">
        </form>
    </body>
</html>