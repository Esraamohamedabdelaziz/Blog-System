<?php

include('./connectToDb.php');
if (isset($_POST['submit'])) {
 

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pw = $_POST['pass'];
    
   
    $sql2 = "INSERT INTO admin_users (username, email, password) VALUES (?, ?, ?)";
    $stmt2=$connect->prepare($sql2);
    
    $stmt2->execute([$name,$email,$pw]);
    
    header("location:../index.php");
   }
?>  