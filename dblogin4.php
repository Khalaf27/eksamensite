<?php
    // Logout 
    session_start();
    session_destroy();
    //redirect and stop present code
    header("Location: dblogin3.php"); 
    exit();
?>