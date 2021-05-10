
<?php
session_start();
error_reporting(0);


			$username= $_POST['Username'];
			$mail= $_POST['Email'];
			$password1= $_POST['Password1'];
			$password2= $_POST['Password2'];
			$db = mysqli_connect('localhost', 'root', '', 'loginn');
			$conn=new mysqli('localhost', 'root', '', 'loginn');

			if(!$conn){
				die('  Connection failed!');
			}
			else{
				$sql_u = "SELECT * FROM users WHERE name='$username'";
				$sql_e = "SELECT * FROM users WHERE email='$mail'";
				$res_u = mysqli_query($db, $sql_u);
				$res_e = mysqli_query($db, $sql_e);

				if (mysqli_num_rows($res_u) > 0) {
					echo '<script type="text/javascript">'; 
					echo 'alert("Koirsničko ime je zauzeto");'; 
					echo 'window.location.href = "index.php";';
					echo '</script>';	
				}
				else if(mysqli_num_rows($res_e) > 0){
					echo '<script type="text/javascript">'; 
					echo 'alert("Unesena E-mail adresa je zauzeta");'; 
					echo 'window.location.href = "index.php";';
					echo '</script>';
				}
					else if($password1!=$password2){
					echo '<script type="text/javascript">'; 
					echo 'alert("Zaporke nisu iste");'; 
					echo 'window.location.href = "index.php";';
					echo '</script>';
					}
				
					else {
						$password = md5($password_1);
					$sql ="INSERT INTO users(name, password, email) VALUES ('$username', '$password', '$mail')";
					if($conn->query($sql)){
						$sql1="SELECT * FROM users WHERE name='$username'";
						$result=mysqli_query($db, $sql1);
						$ret = mysqli_fetch_array($result);
						$_SESSION['ID'] = $ret['ID'];
						setcookie('username', $username, time()+3600);
						echo '<script type="text/javascript">'; 
						echo 'alert("Uspješno ste se registrirali!!");'; 
						echo 'window.location.href = "index.php";';
						echo '</script>';
					
					}

				}	
		}
		
	
	

?>