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

$query2=mysqli_query($db,'SELECT * FROM rezervacije WHERE username= "'.$row['name'].'"');
$row2 = mysqli_fetch_array($query2);

?>

<!DOCTYPE html>
<html>

<head>
    <script src="jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <style>
  <?php include "zavrsni.css" ?>
    </style>

  <link rel="shortcut icon" href="logo.jpg" />
    <title>Restoran AQUA</title>
    <script type="text/javascript"> 
   $(document).ready(function(){
    $("#username").keyup(function(){

  var username = $(this).val().trim();

  if(username != ''){

     $.ajax({
        url: 'ajaxfile.php',
        type: 'post',
        data: {username:username},
        success: function(response){

           $("#nick").html(response);

        }
     });
  }else{
     $("#nick").html("");
  }

});

});
  </script> 
</head>

<body>
    <header id="header">
     
        <h1 id="naslov" >
            Resotran AQUA
            <?php 
              if (strlen($_SESSION['ID']==0))
              { ?>
            <aside id="menu">
             
              <button  onclick="document.getElementById('id01').style.display='block'" style="width:auto;" >Prijava</button>
              <button onclick="document.getElementById('id02').style.display='block'">Registracija</button>
            </aside>
            <?php }
              else {
              ?>
              <aside id="korisnik">
              <?php echo $row['name']?>
              <a href="logout.php">
              <button>Logout</button>
              </a>
              </aside>
             
              <?php } ?>
            
        </h1>
      
        <aside id="meni" style=" background-color:#696969;">
          <nav id="togler" class="navbar navbar-expand-md navbar-dark " style=" background-color:#696969; width: 50%;">
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
                  <a class="nav-link" href="forum.php">Forum</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#odlomakk">Kontakt</a>
                </li>
               
              </ul>
            </div>
          </nav>
        </aside>
        <section id="slika_logo">
            <img src="aqua.jpg" alt="logo" width="200" height="70" style="border-radius: 5px;" >
        </section>
    </header>
    <?php  if($row2>0){  ?>
      <a href="listarezervacije.php">
    <button class="cancelbtn" style=" margin-top:10px;" >Vaše rezervacije</button></a>
      <?php  } ?></p>
     <div class="slider"  >
    </div>

    <aside class="middle">
      <img src="4.jpg" alt="4">
    </aside>
    <article id="odlomak">
      <h4>Restoran AQUA</h4>
    <p class="tekst">
      Bilo da ste u potrazi za kvalitetnim obrokom u vrijeme pauze za ručak ili opuštanjem uz večeru, restoran AQUA je odabir za vas.
    </p>
    <p class="tekst">Jednako privlačan poslovnim ljudima, obiteljima s djecom i turistima željnima kombinacije okusa vrhunskih specijaliteta, očarat će vas svojim uređenjem te opuštenim gostima, koji se s razlogom uvijek rado vraćaju.</p>
    <p class="tekst">Dobrodosli u restoran AQUA!</p>
  </article>

  <div class="containerr">
    <img src="5.jpg" alt="Snow">
    <a href="rezervacije.php">
    <button class="btn1">Rezervacija</button></a>
    <a href="meni.php">
    <button class="btn">Meni</button></a>
    <div class="tekst_na_sliku"> "Svi jedemo i bilo bi šteta jesti lošu hranu"</div>
    <div class="tekst_na_sliku2"> Anna Thomas</div>
  </div>
  
  <footer>
    <aside class="midle">
        <p class="bold">KONTAKT:</p>
        <p>Rezervacije i dostava: 031 375 999</p>
        <p>Ul. kralja Petra Svacica 16A, 31000, Osijek</p>
        <p class="bold">RADNO VRIJEME:</p>
        <p>Pon – pet: 10:00 – 23:59</p>
        <p>Sub – ned: 10:00 – 23:59</p>
    </aside>
    <article id="odlomakk">
        <br>
        <p class="tekst">
          AQUA
        </p>
        <p class="tekst">
          Le Bistro Restaurant
      </p>
      <p class="tekst">Esplanade 1925 Lounge & Cocktail Bar
      </p>
      <p class="tekst">
          Setaliste kardinala Franje Sepera
      </p>
      <p class="tekst">
          31000 Osijek
      </p>
    </article>
   
    <div class="foot">
        
        <hr>
        <p>Copyright © 2015 David j.d.o.o. Sva prava pridrzana by DAVID DEVELOPMENT. Izradu stranice potpomogao FERIT.</p>
  </div>
</footer>


<div id="id01" class="modal">
  
  <form class="modal-content animate" action="http://localhost/zavrsn-web/login.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Zatvoriti prozor">&times;</span>
      <img src="https://www.w3schools.com/howto/img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
    
      <label for="username"><b>Korisničko ime</b></label>
      <input type="text" placeholder="Unesite korisničko ime" name="Username" required>

      <label for="password"><b>Lozinka</b></label>
      <input type="password" placeholder="Unesite lozinku" name="Password" required>
        
      
      <button type="submit" value="Submit" >Prijava</button>
     
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn" name="btn-save">Zatvori</button>
      <button type="button" onclick="document.getElementById('id03').style.display='block'" style="float: right; background-color= black">Zaboravili ste lozinku? </button>
    </div>
  </form>
</div>


<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Zatvoriti prozor" 
  style=" margin-top: 130px; margin-right: 280px;">&times;</span>
  <form class="modal-content" action="http://localhost/zavrsn-web/register.php" method="POST">
    <div class="container">
      <h1>Registracija</h1>
      <p>Molim Vas popunite polja kako biste se registrirali</p>
      <hr>

      <label for="username"><b>Korisničko ime</b></label>
      <input type="text" placeholder="Unesite korisničko ime" name="username"  id="username" required>
      <span id="nick"></span>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Unesite Email" name="Email" required>

      <label for="psw"><b>Lozinka</b></label>
      <input type="password" placeholder="Unesite lozinku" name="Password1" required>

      <label for="psw-repeat"><b>Ponovite lozinku</b></label>
      <input type="password" placeholder="Unesite ponovljenu lozinku" name="Password2" required>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn" style="float:right">Zatvori</button>
        <button type="submit" class="signupbtn" name="signup" style="float:left">Registriraj se!</button>
      </div>
    </div>
  </form>
</div>


<div id="id03" class="modal">
  <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Zatvoriti prozor" 
  style=" margin-top: 130px; margin-right: 280px;">&times;</span>
  <form class="modal-content" action="http://localhost/zavrsn-web/password.php" method="POST">
    <div class="container">
      <h1>Promjena lozinke</h1>
      <p>Popunite polja kako biste promjenili lozinku</p>
      <hr>

      <label for="username"><b>Korisničko ime</b></label>
      <input type="text" placeholder="Enter Username" name="Username" required>
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="Email" required>
      <label for="psw"><b>Lozinka</b></label>
      <input type="password" placeholder="Enter New Password" name="Password1" required>

      <label for="psw-repeat"><b>Ponovite lozinku</b></label>
      <input type="password" placeholder="Repeat New Password" name="Password2" required>


      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id03').style.display='none'" style="float: right;" class="cancelbtn">Zatvori</button>
      <button type="submit" style="float: left;">Promjeni lozinku</button>
      </div>
    </div>
  </form>
</div>

  
</body>

</html>
 