<?php
include('./connectToDb.php');
$id=$_GET['id'];

$sql = "UPDATE  posts SET title='title' ,content='content' WHERE id= $id";
  
$connect ->exec($sql);






?>