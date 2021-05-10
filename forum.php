<?php 

session_start();
error_reporting(0);
 $db = mysqli_connect('localhost', 'root', '', 'loginn');
if(!$db){
  die('Connection failed!');
}
$user_id = $_SESSION['ID'];
$query = mysqli_query($db, 'SELECT * FROM users WHERE id = "'.$user_id.'"');
$row = mysqli_fetch_array($query);

if(isset($_POST['submit'])){
  $naslov=$_POST['title'];
  $komentar=$_POST['komentar'];
  $unos=mysqli_query($db, 'INSERT INTO forum(author,title,body) VALUES ("'.$row['name'].'", "'.$naslov.'", "'.$komentar.'")');
  if ($unos) {
    echo '<script type="text/javascript">'; 
		echo 'alert("Uspješno ste dodali komentar!");'; 
		echo '</script>';
  }
  else {

    echo '<script>alert("Error")</script>';
  }
}


if(isset($_POST['ucitaj'])){
  $broj=$broj+5;
}
?>



<html>
    <head>
        <title>Forum
        </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <style>
  <?php include "forum.css" ?>
</style>
        <link rel="stylesheet" href="forum.css">
    </head>

    <body>
        <header>
        <h1 id="naslov" >
            Resotran AQUA
            <?php 
              if (strlen($_SESSION['ID']==0))
              { ?>
            <?php }
              else {
              ?>
              <aside id="korisnik">
              <a href="logout.php">
              <button>Logout</button>
              </a>
              </aside>
             
              <?php } ?>
            
        </h1>
    </div>
    <aside id="meni">
      <nav id="togler" class="navbar navbar-expand-md navbar-dark " style=" background-color:#696969; width: 50%; margin-top: 15px; margin-right: 10px;">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" style=" background-color:#696969;">
          <ul class="navbar-nav" style=" background-color:#696969; float: right;;">
            <li class="nav-item">
                <a class="nav-link" href="onama.php">O nama</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="meni.php">Meni</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="galerija.php">Galerija</a>
          </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Forum</a>
            </li>
          </ul>
        </div>
      </nav>
    </aside>
        <section id="slika_logo">
          <a href="index.php">
            <img src="aqua.jpg" alt="logo" title="Početna stranica" style="border-radius: 5px;" >
          </a>
        </section>
    </header>
    
    <div class="btn-korisnik">

    <?php 
      if (strlen($_SESSION['ID']==0))
    {?>

      <h3>Dobrodošli, kako biste ostavili komentar potrebno je prijaviti se</h3>
      <a href="index.php">
      <button style="width:auto;" >Prijavite se</button>  </a>

    <?php }
    else {
    ?>
    <h3>Dobrodošli <?php echo $row['name']?></h3>
    <button onclick="document.getElementById('dodaj_komentar').style.display='block'">Dodaj komentar</button>
     <?php } ?>         
  </div>
    <div id="dodaj_komentar" class="modal">
      
      <form class="modal-content" method="POST">
        <div class="container">
          <h1>Molim vas popunite polja kako bi dodali Vaš komentar</h1>
          <hr>
    
          <label for="title"><b>Naslov: </b></label>
          <input type="text" placeholder="Naslov..." name="title" required>
          <br>
          <label for="komentar" style="font-weight: bold;float: left;" >Komentar: </label>
          
         <textarea name="komentar" id="komentar" cols="100" rows="5"></textarea>
          <br>
          <div class="clearfix">
            <br>
            <button type="button"  class="dodajbtn" style="float:right ;" onclick="document.getElementById('dodaj_komentar').style.display='none'" class="cancelbtn">Cancel</button>
            <button type="submit" name="submit"class="dodajbtn" style="float: left;" >Dodaj komentar</button>
          </div>
          <br>
        </div>
      </form>
    </div>
      <br>
    <div class="komentari">
      <h2 style="background-color:gray; height: 60px; ">Ispis komentara</h2>
     
      <?php
      $ret = mysqli_query($db, "SELECT * FROM forum ORDER BY forum_id DESC");
     
      while($ispis= mysqli_fetch_array($ret)){
      ?>
      Autor: <?php echo $ispis['author']; ?>
      <br>
      Naslov: <?php echo $ispis['title']; ?>
        <br>
      Sadržaj:<p stlye="background-color: lightblue;" > <?php echo $ispis['body']; ?> </p>
      <br>
      <hr>
      <?php 
      }
      ?>

      <br>
  </div>
    </body>
</html>