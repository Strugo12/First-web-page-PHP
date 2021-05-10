<?php 

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



?>

<html>
    <head>
        <title> Vase rezervacije </title>
        <h1>Lista vasih rezervacija:</h1>
        <a href="index.php">
    <button>Početna stranica</button></a>
    </head>

    <body>
        <ul>
            <?php $query2=mysqli_query($db,'SELECT * FROM rezervacije WHERE username= "'.$row['name'].'" ORDER BY datum DESC');
            while($row2 = mysqli_fetch_array($query2)){ ?>
            <li>
               Ime: <?php echo $row['name']?>
               <br>
               Stol:  <?php echo $row2['stol']?>
               <br>
               Datum:  <?php echo $row2['datum']?>
               <br>
               Vrijeme:  <?php echo $row2['vrijeme']?>
               <br>
               Poruka:  <?php echo $row2['poruka']?>
               <br>
               <br>
            </li>
            <?php } ?>
        </ul>
    </body>
</html>