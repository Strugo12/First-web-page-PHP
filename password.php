<?php

$username=$_POST['Username'];
$mail= $_POST['Email'];
$password1= $_POST['Password1'];
$password2= $_POST['Password2'];
$db = mysqli_connect('localhost', 'root', '', 'loginn');


$sql_u = "SELECT * FROM users WHERE name='$username'";
$sql_e = "SELECT * FROM users WHERE email='$mail'";
$res_u = mysqli_query($db, $sql_u);
$res_e = mysqli_query($db, $sql_e);


if(!$db){
    die('Connection failed!');
    }
    else if($password1!=$password2){
        echo "The two passwords do not match";
    }
    else if (mysqli_num_rows($res_u) == 0) {
        echo "Sorry... wrong username!"; 	
      }
      else if (mysqli_num_rows($res_e) == 0) {
        echo "Sorry... wrong mail adress!"; 	
      }

    else {
    $sql= "UPDATE users SET password='$password1' WHERE email='$mail'";
    if ($db->query($sql) === TRUE) {
        echo "Record updated successfully";
      } 
      else {
        echo "Error updating record: " . $conn->error;
      }
    }


?>