<?php
	session_start();
	error_reporting(0);
 	$db = mysqli_connect('localhost', 'root', '', 'loginn');
	if(!$db){
		die('Connection failed!');
	}
	$username=$_POST['username'];
	$password=$_POST['Password'];
	$sql = "SELECT * FROM users WHERE name='$username' AND password='$password'";
	$result=mysqli_query($db, $sql);
	$ret = mysqli_fetch_array($result);
	if(mysqli_num_rows($result)==1){
		$_SESSION['ID'] = $ret['ID'];
		setcookie('username', $username, time()+3600);
		header('location:index.php');
	}
	else {
		echo '<script type="text/javascript">'; 
		echo 'alert("Wrong username or password!");'; 
		echo 'window.location.href = "index.php";';
		echo '</script>';
	}
?>



