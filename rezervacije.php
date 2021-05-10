<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['ID'] == 0)) {
  
    echo '<script type="text/javascript">'; 
		echo 'alert("Prijavite se kako bi izvršili rezervaciju!");'; 
		echo 'window.location.href = "index.php";';
		echo '</script>';
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
        <link rel="stylesheet" href="rezervacije.css">
        <title>Rezervacije</title>
        <script>
<?php include "rezervacije.css" ?>
</script>
    </head>

    <body>
        <h1>AQUA Rezervacije</h1>
        <div class="rezervacija">
            <div class="tekst">
        <form action="rezerviraj.php" method="POST">
            <h2>Rezervirajte stol već sada!</h2>
            Ime: <?php echo $row['name']?>
            <br>
            <br>
            <label for="stol">Broj stola: </label>
            <select name="stol" id="clasa">
                    <option value="T1">T1</option>
                    <option value="R1">R1</option>
                    <option value="T2">T2</option>
                    <option value="R2">R2</option>
                    <option value="T3">T3</option>
                    <option value="R3">R3</option>
                    <option value="T4">T4</option>
                    <option value="R4">R4</option>
                    <option value="T5">T5</option>
                    <option value="R5">R5</option>
                    <option value="T6">T6</option>
                    <option value="R6">R6</option>
                    <option value="T7">T7</option>
                    <option value="T8">T8</option>
                    <option value="T9">T9</option>
                    <option value="T10">T10</option>
                    <option value="T11">T11</option>
                    <option value="T12">T12</option>
            </select>
            <br>
            <br>
            <label for="datum">Datum rezervacije: </label>
            <input type="date" placeholder=" YYYY-MM-DD" name="datum" required >
            <br>
            <br>
            <label for="vrijeme">Vrijeme rezervacije: </label>
            <input id="time" type="time" name="vrijeme" step="1800" required min="10:00" max="22:00">
            
            <br>
            <br>
            <p> NAPOMENA: Rezrvacija je moguća samo za slijedeći dan ili neki nadolazeći datum </p>
            <p> Ukoliko imate poruku za nas vezanu uz rezervaciju, napišite </p>
            <label for="vrijeme">Poruka: </label>
            <br>
            
            <textarea type="text"  name="poruka" rows="4" cols="50"> </textarea>
            <br>
            <br>
            <button type="submit" onclick="myFunction()">Rezerviraj!</button>
        </form>
         </div>
        </div>
        <h2 style="float: right; margin-right: 20%;">  Raspored stolova restorana AQUA</h2>
        <aside class="slika"> 
        </aside>
        <br>
    </body>
</html>