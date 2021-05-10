<?php
date_default_timezone_set("Europe/Zagreb");

session_start();
error_reporting(0);

if (strlen($_SESSION['ID'] == 0)) {
  header('location:index.php');
}
$db = mysqli_connect('localhost', 'root', '', 'loginn');
if(!$db){
  die('Connection failed!');
}
$user_id = $_SESSION['ID'];
$query = mysqli_query($db, 'SELECT * FROM users WHERE id = "'.$user_id.'"');
$row = mysqli_fetch_array($query);

    $stol=$_POST['stol'];
    $datum=$_POST['datum'];
    $vrijeme=$_POST['vrijeme'];
    $zauzet01 = strtotime("+239 minutes",strtotime($vrijeme));
    $zauzet02 = strtotime("-121 minutes",strtotime($vrijeme));
    $zauzet1=gmdate("H:i", $zauzet01);
    $zauzet2=gmdate("H:i", $zauzet02);
    $poruka=$_POST['poruka'];
    $sql_stol = "SELECT * FROM rezervacije WHERE stol='$stol' AND datum='$datum' AND vrijeme<='$zauzet1' AND vrijeme>='$zauzet2'";
    $res_stol = mysqli_query($db, $sql_stol);
  
    if (mysqli_num_rows($res_stol) > 0) {
      echo '<script type="text/javascript">'; 
      echo 'alert("Stol je zauzet!");'; 
      echo 'window.location.href = "rezervacije.php";';
      echo '</script>';	
      }
    else{

    if($datum <= date("Y-m-d")){
      echo '<script type="text/javascript">'; 
      echo 'alert("Pogresan unos datuma!");'; 
      echo 'window.location.href = "rezervacije.php";';
      echo '</script>';	
    }
  
    else{
      $unos=mysqli_query($db, 'INSERT INTO rezervacije (username, stol, datum, vrijeme, poruka) VALUES ("'.$row['name'].'", "'.$stol.'", "'.$datum.'", "'.$vrijeme.'", "'.$poruka.'")');
    if ($unos) {
      echo '<script type="text/javascript">'; 
      echo 'alert("Uspjesno ste obavili rezervaciju!");';
      echo 'window.location.href = "listarezervacije.php";';
      echo '</script>';	
    }

    
    else {
      echo '<script type="text/javascript">'; 
      echo 'alert("Error!");'; 
      echo 'window.location.href = "index.php";';
      echo '</script>';	
    
      }
    }
  }

?>