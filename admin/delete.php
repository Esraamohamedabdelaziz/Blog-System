<?php
include('./connectToDb.php');
$id=$_GET['id'];


  $sql = "DELETE FROM posts WHERE id = $id";
  
$connect ->exec($sql);

header("Refresh: 2; url=posts.php");

echo"post deleted"


?>