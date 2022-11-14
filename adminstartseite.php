<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adminportal - Startseite</title>
    <link rel="stylesheet" href="css/headerfooter.css">
    <link rel="stylesheet" href="css/adminstartseite.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<header>
    <nav>
        <ul class="menu">
                <li class="logo"><a  rel="home" href="/php/adminstartseite.php" ><img class="logo" src="img/projektlogofinal.png" width="420" height="95" alt="logo" ></a></li>
                <li class="item"><a href="https://www.hs-esslingen.de/">Homepage HS Esslingen</a></li>
                <li class="item"><a href="https://www.woodenvalley.de/">Homepage Wooden Valley</a></li>
                <li class="item button"><a href="/php/webappstartseite.php">Zurück zur Website</a></li>
                <li class="toggle"><span class="bars"></span></li>
            </ul>
    </nav>  
</header>
<main>
    <div class="container">
        <?php
        if (isset($_SESSION['session_user'])) {
            echo ("<h1>Hallo ".$_SESSION['session_firstname']." ".$_SESSION['session_lastname']."! Du bist eingeloggt und kannst jetzt die Bauteilkennzeichnung bearbeiten.<br /></h1>");
        
            $host = "localhost";
            $user = "postgres";
            $pass = "Honey6moon17";
            $db = "TinyHouses";
            $con =pg_connect("host= $host user=$user password=$pass dbname=$db") or die ("Verbindung zur Datenbank hat nicht funktioniert\n");
            echo ("<h2>Folgende Tabellen können bearbeitet werden:<br /></h2>");
            echo "<li><a href=\"siedlungen.php\">Siedlungen</a><br /></li>";
            echo "<li><a href=\"tinyhouses.php\">Tinyhouses</a><br /></li>";
            echo "<li><a href=\"module.php\">Module</a><br /></li>";
            echo "<li><a href=\"elemente.php\">Elemente</a><br /></li>";
            echo "<li><a href=\"webapptexte.php\">Web-App Texte</a><br /></li>";
            echo "<li><a href=\"admindaten.php\">Admindaten</a><br /></li>";
            
        ?>
        <br> <form action="logout.php" method="POST"><button type="submit" name="submit">Ausloggen</button></form><br>
        <?php        
        } else {
        // Ist keine Session aktiv, kommt diese Anzeige:
           
            echo "Du bist nicht angemeldet!              Zum <li><a href=\"adminlogin.html\">Login</a><br /></li>";
        };
        ?>
    </div>
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