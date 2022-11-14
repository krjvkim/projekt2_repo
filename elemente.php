<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adminportal - Elemente</title>
    <link rel="stylesheet" href="css/headerfooter.css">
    <link rel="stylesheet" href="css/elemente.css">
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
<main class="container">
<?php
if (isset($_SESSION['session_user'])) {
    $host = "localhost";
    $user = "postgres";
    $pass = "Honey6moon17";
    $db = "TinyHouses";
    $con =pg_connect("host= $host user=$user password=$pass dbname=$db");

    $tabelle = 'elemente';
    $datei = 'elemente.php';

   /* $liste1 = array('Element-ID: ', 'id', '1');*/
    $liste1 = array('Teiletyp: ', 'teiletyp', '1');
    $liste2 = array('Fertigungsdatum: ', 'fertigungsdatum', '2');
    $liste3 = array('Fertigungsdienstleister:', 'fertigungsdienstleister', '3');
    $liste4 = array('Anbringung NFC-Tag: ', 'anbringungnfctag', '4');
    $liste5 = array('UID: ', 'uidtag', '5');
    $liste6 = array('Leitung: ', 'leitung', '6');
    $liste7 = array('Anschluss: ', 'anschluss', '7');
    $liste8 = array('Holzelement: ', 'holzelement', '8');
    $liste9 = array('Dämmstoff: ', 'daemmstoff', '9');
    $liste10 = array('Beleuchtung: ', 'beleuchtung', '10');
    $liste11 = array('Schrauben: ', 'schrauben', '11');
    $liste12 = array('Fenster: ', 'fenster', '12');
    $liste13 = array('Türe: ', 'tuere', '13');
    $liste14 = array('bauliche Veränderungen: ', 'baulicheveraenderungen', '14');
    $liste15 = array('Modul-ID: ', 'modulid', '15');
    $liste = array($liste1,$liste2,$liste3,$liste4,$liste5,$liste6,$liste7,$liste8,$liste9,$liste10,$liste11,$liste12,$liste13,$liste14,$liste15);
    $serial_liste=urlencode(base64_encode(serialize($liste)));

    $datum = date("j, n, Y");
    if (isset($_POST['submit_eingabeformular']))	// Submit-Schaltfläche des Eingabeformulars wurde betätigt
    {
        // SQL-Kommando: Ändern von Einträgen
        $query="UPDATE elemente SET /*id='$_POST[id]',*/ teiletyp='$_POST[teiletyp]', fertigungsdatum='$_POST[fertigungsdatum]', fertigungsdienstleister='$_POST[fertigungsdienstleister]', anbringungnfctag='$_POST[anbringungnfctag]', uidtag='$_POST[uidtag]', leitung='$_POST[leitung]', anschluss='$_POST[anschluss]', holzelement='$_POST[holzelement]', daemmstoff='$_POST[daemmstoff]', beleuchtung='$_POST[beleuchtung]', schrauben='$_POST[schrauben]', fenster='$_POST[fenster]', tuere='$_POST[tuere]', baulicheveraenderungen='$_POST[baulicheveraenderungen]', modulid='$_POST[modulid]', datumeintrag = '$datum', letztebearbeitungvon = '$_SESSION[session_user]' WHERE id='$_GET[id]'";
        // SQL-Kommando ausführen
        
        pg_query($con, $query);
    }

    if (isset($_POST['submit_neuezeile']))	// Submit-Schaltfläche des Eingabeformulars wurde betätigt
    {
        // SQL-Kommando: Ändern von Einträgen
        $id = intval($_GET['id']);
        $query="INSERT INTO elemente (id, teiletyp, fertigungsdatum, fertigungsdienstleister, anbringungnfctag, uidtag, leitung, anschluss, holzelement, daemmstoff, beleuchtung, schrauben, fenster, tuere, baulicheveraenderungen, modulid, datumeintrag, letztebearbeitungvon) VALUES ($id,'$_POST[teiletyp]','$_POST[fertigungsdatum]','$_POST[fertigungsdienstleister]','$_POST[anbringungnfctag]','$_POST[uidtag]','$_POST[leitung]','$_POST[anschluss]','$_POST[holzelement]','$_POST[daemmstoff]','$_POST[beleuchtung]','$_POST[schrauben]','$_POST[fenster]','$_POST[tuere]','$_POST[baulicheveraenderungen]','$_POST[modulid]', '$datum', '$_SESSION[session_user]')";
        // SQL-Kommando ausführen
        pg_query($con, $query);
    }

    if (isset($_POST['submit_eintragloeschen']))	// Submit-Schaltfläche des Eingabeformulars wurde betätigt
    {
        // SQL-Kommando: Ändern von Einträgen
        $id = intval($_GET['id']);
        $query="DELETE FROM elemente WHERE id='$_GET[id]'";
        // SQL-Kommando ausführen
        pg_query($con, $query);
    }
    

    $query = "SELECT * FROM elemente ORDER BY id";
    $result = pg_query($con, $query);
    // Tabelle in HTML darstellen
    echo "<td><a class='neuesElement' href=\"neuezeilehinzufuegen.php?tabelle=$tabelle&datei=$datei&liste=$serial_liste\">Neues Element hinzufügen</a></td>";
    echo "<table class='content-table'>\n";
    echo "<thead>"; echo"<tr>"; echo "<th>Elemente-ID</th>"; echo "<th>Teiletyp</th>"; echo "<th>Fertigungsdatum</th>";echo "<th>Fertigungsdienstleister</th>"; echo "<th>Annbringung des NFC-Tags</th>"; echo "<th>UID des Tags</th>"; echo "<th>Leitung</th>";  echo "<th>Anschluss</th>";  echo "<th>Holzelement</th>"; echo "<th>Dämmstoff</th>";  echo "<th>Beleuchtung</th>";  echo "<th>Schrauben</th>";  echo "<th>Fenster</th>";  echo "<th>Türe</th>"; echo "<th>baulicheveraenderungen Veränderungen</th>"; echo "<th>Modul-ID</th>"; echo "<th>Datum letzte Bearbeitung</th>"; echo "<th>Letzte Bearbeitung durchgeführt von</th>"; echo"</tr>"; echo"</thead>";
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