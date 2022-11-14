<?php
session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adminportal - Signupformular</title>
    <link rel="stylesheet" href="css/headerfooter.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>
<header>
        <nav>
            <ul class="menu">
                <li class="logo"><a  rel="home" href="/php/adminstartseite.php" ><img class="logo" src="img/projektlogofinal.png" width="420" height="95" alt="logo" ></a></li>
                <li class="item"><a href="https://www.hs-esslingen.de/">Homepage HS Esslingen</a></li>
                <li class="item"><a href="https://www.woodenvalley.de/">Homepage Wooden Valley</a></li>
                <li class="item button"><a href="/php/adminstartseite.php">Zurück zur Admin-Startseite</a></li>
                <li class="toggle"><span class="bars"></span></li>
            </ul>
        </nav>  
</header>
<main>
 <?php
 /* if (isset($_SESSION['session_user'])) { */?> 
   <form class="container" action="signup.php" method="POST">
   <h1>Registrierungsformular</h1>
      <input type="text" name="vorname" placeholder="Vorname"><br>
      <input type="text" name="nachname" placeholder="Nachname"><br>
      <input type="text" name="benutzername" placeholder="Benutzername"><br>
      <input type="password" name="passwort" placeholder ="Passwort"><br>
      <button type="submit" name="submit">Registrieren</button>
   </form>
<?php
   /* } else {
      // Ist keine Session aktiv, kommt diese Anzeige:
          echo "Du bist nicht angemeldet<br /><br />";
          echo "Zum <a href=\"adminlogin.html\">Login</a><br />";
      };*/
?>
</main>
<!-- <footer class="footer" id="footer">
    <div class ="footercontainer">
        <div class="row">
            <div class="footer-col">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Module</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <div class="social-links">
                    <a href="https://www.instagram.com/hochschule.es/?hl=de"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.youtube.com/c/hochschuleesslingen"><i class="fab fa-youtube"></i></a>
                    <a href="https://www.linkedin.com/company/woodenvalley-ug-h/"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>
    </div>
    </footer> -->
</body>
</html>