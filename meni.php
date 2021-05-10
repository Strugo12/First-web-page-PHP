<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <style>
  <?php include "meni.css" ?>
    </style>
    <title>Restoran AQUA Meni</title>
</head>
    
<body>
    <header>
        <div id="naslov">
        <h1>Meni</h1>
    </div>
    <aside id="meni" style=" background-color:#696969;">
        <nav id="togler" class="navbar navbar-expand-md navbar-dark " style=" background-color:#696969; width: 50%; margin-top: 15px;margin-right: 10px;">
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
                  <a class="nav-link" href="#odlomak">Kontakt</a>
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

    <div class="meni">
    <h1>Ovdje možete pogledati naš Meni</h1>
    </div>
    <iframe src="meni.pdf" width="80%" height="800px" style="margin-left: 10%;">
    </iframe>

    <footer>
        <aside class="middle">
            <p class="bold">KONTAKT:</p>
            <p>Rezervacije i dostava: 031 375 999</p>
            <p>Ul. kralja Petra Svačića 16A, 31000, Osijek</p>
            <p class="bold">RADNO VRIJEME:</p>
            <p>Pon – pet: 10:00 – 23:59</p>
            <p>Sub – ned: 10:00 – 23:59</p>
        </aside>
        <article id="odlomak">
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
              Šetalište kardinala Franje Šepera
          </p>
          <p class="tekst">
              31000 Osijek
          </p>
        </article>
       
        <div class="foot">
            <br>
            <hr>
        <p>Copyright © 2015 David j.d.o.o. Sva prava pridržana by DAVID DEVELOPMENT. Izradu stranice potpomogao FERIT.</p>
      </div>
    </footer>

</body>
</html>