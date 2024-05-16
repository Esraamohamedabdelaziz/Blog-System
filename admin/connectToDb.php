<?php

$host='localhost';
$username='root';
$password='';

try{ 
$connect=new PDO("mysql:host=$host;dbname=BlogDB",$username,$password);
$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
// echo" connection successfully"."<br/>";
}

catch(Exception $e){
echo "connection failed", $e->getMessage();
}

?>