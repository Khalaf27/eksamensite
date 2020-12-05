<?php
    // Secret page
    session_start();
    if ($_SESSION['logged_in'] == true)
    { 
?>
    <html>
        <head>
            Secret page
            <br/>
        </head>
        <body>
            <h1>Only for registered users</h1>
            <br/>
            <br/>
            <a href="dblogin4.php">Logout</a>
        </body>
    </html>
<?php
    }
        else 
    {
        header("location: dblogin3.php");
    }
?>