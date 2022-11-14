<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adminportal - Siedlungen</title>
    <link rel="stylesheet" href="css/headerfooter.css">
    <link rel="stylesheet" href="css/siedlungen.css">
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
<?php
 if (isset($_SESSION['session_user'])) { 
    $host = "localhost";
    $user = "postgres";
    $pass = "Honey6moon17";
    $db = "TinyHouses";
    $con =pg_connect("host= $host user=$user password=$pass dbname=$db") or die ("Verbindung zur Datenbank hat nicht funktioniert\n");
    $tabelle = 'siedlungen';
    $datei = 'siedlungen.php';

    /* $liste1 = array('Siedlung-ID: ', 'id', '1');*/
    $liste1 = array('Siedlungsname: ', 'siedlungsname', '1');
    $liste2 = array('Ort: ', 'ort', '2');
    $liste3 = array('PLZ: ', 'plz', '3');
    $liste4 = array('Straße: ', 'strasse', '4');
    $liste5 = array('Hausnummer: ', 'hausnummer', '5');
    $liste6 = array('Gründungsdatum: ', 'gruendungsdatum', '6');
    
    $liste = array($liste1, $liste2, $liste3, $liste4, $liste5, $liste6);
    $serial_liste=urlencode(base64_encode(serialize($liste)));

    $datum = date("j, n, Y");

    if (isset($_POST['submit_eingabeformular']))	// Submit-Schaltfläche des Eingabeformulars wurde betätigt
    {
        // SQL-Kommando: Ändern von Einträgen
        $query="UPDATE siedlungen SET /*id='$_POST[id]',*/ siedlungsname='$_POST[siedlungsname]', ort='$_POST[ort]', plz='$_POST[plz]', strasse='$_POST[strasse]', hausnummer='$_POST[hausnummer]', gruendungsdatum='$_POST[gruendungsdatum]', datumeintrag = '$datum', letztebearbeitungvon = '$_SESSION[session_user]' WHERE id='$_GET[id]'";
        // SQL-Kommando ausführen
        pg_query($con, $query);
    }

    if (isset($_POST['submit_neuezeile']))	// Submit-Schaltfläche des Eingabeformulars wurde betätigt
    {
        // SQL-Kommando: Ändern von Einträgen
        $id = intval($_GET['id']);
        $query="INSERT INTO siedlungen (id, siedlungsname, ort, plz, strasse, hausnummer, gruendungsdatum, datumeintrag, letztebearbeitungvon) VALUES ($id,'$_POST[siedlungsname]','$_POST[ort]','$_POST[plz]', '$_POST[strasse]','$_POST[hausnummer]','$_POST[gruendungsdatum]','$datum', '$_SESSION[session_user]')";
        // SQL-Kommando ausführen
        pg_query($con, $query);
    }

    if (isset($_POST['submit_eintragloeschen']))	// Submit-Schaltfläche des Eingabeformulars wurde betätigt
    {
        // SQL-Kommando: Ändern von Einträgen
        $id = intval($_GET['id']);
        $query="DELETE FROM siedlungen WHERE id='$_GET[id]'";
        // SQL-Kommando ausführen
        pg_query($con, $query);
    }
    $query = "SELECT * FROM siedlungen ORDER BY id";
    $result = pg_query($con, $query);
    // Tabelle in HTML darstellen
    echo "<td><a class='neueSiedlung' href=\"neuezeilehinzufuegen.php?tabelle=$tabelle&datei=$datei&liste=$serial_liste\">Neue Zeile hinzufügen</a></td>";
    echo "<table class='content-table'>\n";
    echo "<thead>"; echo "<tr>"; echo "<th>Siedlung-ID</th>"; echo "<th>Siedlungsname</th>"; echo "<th>Ort</th>"; echo "<th>PLZ</th>"; echo "<th>Straße</th>"; echo "<th>Hausnummer</th>"; echo "<th>Gründungsdatum</th>"; echo "<th>Datum letzte Bearbeitung</th>"; echo "<th>Letzte Bearbeitung durchgeführt von</th>"; echo "</tr>"; echo"</thead>";
    while ($row=pg_fetch_row($result))
    {
        echo "<tr>";
        foreach ($row as $item)    // jedes Element $item der Zeile $row durchlaufen
            echo "<td>$item</td>";
        echo "<td><a href=\"eingabeformular.php?id=$row[0]&tabelle=$tabelle&datei=$datei&liste=$serial_liste\"><button class='button1'>Bearbeiten</button></a></td>";
        echo "<td><a href=\"eintrag_loeschen.php?id=$row[0]&tabelle=$tabelle&datei=$datei\"><button class='button2'>Löschen</button></a></td>";
        echo "</tr>\n";
    }
    echo "</table>\n";
 } else {
    echo "<h2>Du bist nicht angemeldet</h2>";
    echo "Zum <a href=\"adminlogin.html\">Login</a><br />";
}; 
?>
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