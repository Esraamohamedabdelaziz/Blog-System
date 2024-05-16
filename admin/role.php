<?php

if ($result) {
    $_SESSION['name'] = $_POST["user_name"];
    $_SESSION['pass'] = $_POST["password"];
    if ($result['isAdmin'] == 1) {
        $_SESSION['isAdmin'] = true; 
        header("Location: users.php");
        exit();
    } else {
        $_SESSION['isAdmin'] = false; 
        header("Location:../index.php"); 
        exit();
    }
} else {
    header("Location: login.php?error=1");
    $msg = "Invalid username and password";
    exit();
}

?>