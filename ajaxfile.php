<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "loginn";
try{
   $conn = new PDO("mysql:host=$server;dbname=$dbname","$username","$password");
   $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
   die('Unable to connect with the database');
}
if(isset($_POST['username'])){
    $username = $_POST['username'];
 
    $stmt = $conn->prepare("SELECT count(*) as cntUser FROM users WHERE username=:username");
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->execute(); 
    $count = $stmt->fetchColumn();
 
    $response = "<span style='color: green;'>Available.</span>";
    if($count > 0){
       $response = "<span style='color: red;'>Not Available.</span>";
    }
 
    echo $response;
    exit;
 }


?>