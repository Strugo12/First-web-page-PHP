<?php
 	$db = mysqli_connect('localhost', 'root', '', 'loginn');
	if(!$db){
		die('Connection failed!');
	}
	$username = trim($_POST['user']); 
	$sql = "SELECT * FROM users WHERE name='$username'";
	$result=mysqli_query($db, $sql);
	$find = mysqli_num_rows($result);

	echo $find;
  
	mysqli_close($con);

?>
