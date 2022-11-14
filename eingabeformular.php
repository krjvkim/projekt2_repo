<?php
session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adminportal - Eintrag bearbeiten</title>
    <link rel="stylesheet" href="css/headerfooter.css">
    <link rel="stylesheet" href="css/bearbeiten.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

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
if (isset($_SESSION['session_user'])) {
    $host = "localhost";
    $user = "postgres";
    $pass = "Honey6moon17";
    $db = "TinyHouses";
    $con =pg_connect("host= $host user=$user password=$pass dbname=$db") or die ("Verbindung zur Datenbank hat nicht funktioniert\n");

    $liste= unserialize(base64_decode(urldecode($_GET['liste'])));
    // SQL-Anfrage: Zeile mit der übergebenen Matrikelnummer  wählen
    $query="SELECT * FROM $_GET[tabelle] WHERE id=$_GET[id]";
    // Anfrage ausführen
    $result=pg_query($con, $query);
    // Formular darstellen
    if ($row=pg_fetch_row($result))
    {
        echo "<form class='container' method=\"post\" action=\"$_GET[datei]?id=$row[0]\">\n";
        foreach ($liste as $i){
            $value = $i[2];
            echo "<br> $i[0]<input type=\"text\" name=\"$i[1]\" value='$row[$value]'>\n";
        }
        echo "<br><br><button type=\"submit\" name=\"submit_eingabeformular\" value=\"Abschicken\">Abschicken</button>\n";
        echo "</form>\n";
    }
    else
        echo "Fehler: Frage $_GET[id] nicht vorhanden\n";
} else {
    echo "<h2>Du bist nicht angemeldet</h2>";
    echo "Zum <a href=\"adminlogin.html\">Login</a><br />";
};
?>
<div class="anmerkung">
    <?php
    echo "Links sollen in folgendem Muster eingefügt werden:<br>"; 
    echo '&lt;a href="LINK" target="_blank" &gt;ANGEZEIGTER TEXT&lt;/a&gt;';
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