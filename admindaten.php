<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin NFC-TAGS Admindaten</title>
    <link rel="stylesheet" href="css/headerfooter.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/tinyhouses.css">
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
 /* if (isset($_SESSION['session_user'])) { */
    $host = "localhost";
    $user = "postgres";
    $pass = "Honey6moon17";
    $db = "TinyHouses";
    $con =pg_connect("host= $host user=$user password=$pass dbname=$db") or die ("Verbindung zur Datenbank hat nicht funktioniert\n");
    $tabelle = 'admindaten';
    $datei = 'admindaten.php';

    $liste1 = array('Tinyhouse-ID: ', 'id', '1'); // TODO: Changed by Hannah
    $liste1 = array('Benutzername: ', 'benutzername', '1');  //Jakim Kromer
    $liste2 = array('Passwort: ', 'passwort', '2'); // Hannah
    $liste3 = array('Vorname: ', 'vorname', '3');
    $liste4 = array('Nachname: ', 'nachname', '4');
    /*$liste5 = array('Datum Eintrag: ', 'datumeintrag', '5');
    $liste6 = array('Letzte Bearbeitung von: ', 'letztebearbeitungvon', '6');*/
 $liste = array($liste1, $liste2, $liste3, $liste4/*, $liste5, $liste6 */);
    $serial_liste=urlencode(base64_encode(serialize($liste)));

    $datum = date("j, n, Y");

    if (isset($_POST['submit_eingabeformular']))	// Submit-Schalltfläche des Eingabeformulars wurde betätigt
    {   
        $select_user_password_query = "SELECT * from admindaten where id='$_GET[id]'";
        $res = pg_query($con, $select_user_password_query);
        $row = pg_fetch_assoc($res);
        $currentHashPassword = $row['passwort'];
        
        if ($currentHashPassword == "$_POST[passwort]") { // $_POST[passwort] ist das, was bei eingabeformular drinnen steht
            $query="UPDATE admindaten SET benutzername='$_POST[benutzername]', passwort='$currentHashPassword',
                vorname='$_POST[vorname]', nachname='$_POST[nachname]', datumeintrag = '$datum',
                letztebearbeitungvon = '$_SESSION[session_user]'  WHERE id='$_GET[id]'"; /*id='$_POST[id]',*/
        } else {
            $hashPassword = password_hash("$_POST[passwort]", PASSWORD_DEFAULT); //nur hashen, wenn das passwort geändert wird
            $query="UPDATE admindaten SET benutzername='$_POST[benutzername]', passwort='$hashPassword',
                vorname='$_POST[vorname]', nachname='$_POST[nachname]', datumeintrag = '$datum',
                letztebearbeitungvon = '$_SESSION[session_user]'  WHERE id='$_GET[id]'"; /*id='$_POST[id]',*/
        }
        
        // SQL-Kommando: Ändern von Einträgen
        
        // SQL-Kommando ausführen
        pg_query($con, $query);
    }


    // if (isset($_POST['submit_eingabeformular']))	// Submit-Schaltfläche des Eingabeformulars wurde betätigt
    // {   
    //     $hashPassword = password_hash("$_POST[passwort]", PASSWORD_DEFAULT); //nur hashen, wenn das passwort geändert wird
    //     // SQL-Kommando: Ändern von Einträgen
    //     $query="UPDATE admindaten SET /*id='$_POST[id]',*/ benutzername='$_POST[benutzername]', passwort='$hashPassword',
    //      vorname='$_POST[vorname]', nachname='$_POST[nachname]', datumeintrag = '$datum',
    //      letztebearbeitungvon = '$_SESSION[session_user]'  WHERE id='$_GET[id]'";
    //     // SQL-Kommando ausführen
    //     pg_query($con, $query);
    // }

    if (isset($_POST['submit_neuezeile']))	// Submit-Schaltfläche des Eingabeformulars wurde betätigt
    {   
        $hashPassword = password_hash("$_POST[passwort]", PASSWORD_DEFAULT);
        // SQL-Kommando: Ändern von Einträgen
        $id = intval($_GET['id']);
        $query="INSERT INTO admindaten (id, benutzername, passwort, vorname, nachname, datumeintrag, letztebearbeitungvon)
         VALUES ($id,'$_POST[benutzername]','$hashPassword','$_POST[vorname]','$_POST[nachname]', '$datum',
         '$_SESSION[session_user]')";
        // SQL-Kommando ausführen
        pg_query($con, $query);
    }
    if (isset($_POST['submit_eintragloeschen']))	// Submit-Schaltfläche des Eingabeformulars wurde betätigt
    {
        // SQL-Kommando: Ändern von Einträgen
        $id = intval($_GET['id']);
        $query="DELETE FROM admindaten WHERE id='$_GET[id]'";
        // SQL-Kommando ausführen
        pg_query($con, $query);
    }

    $query = "SELECT * FROM admindaten ORDER BY id";
    $result = pg_query($con, $query);
    // Tabelle in HTML darstellen
    echo "<td><a class='neuesTinyhouse' href=\"neuezeilehinzufuegen.php?tabelle=$tabelle&datei=$datei&liste=$serial_liste\">Neuen Eintrag hinzufügen</a></td>";
    echo "<table class='content-table'>\n";
    echo "<thead>"; echo "<tr>"; echo "<th>Admin-ID</th>"; echo "<th>Benutzername</th>"; echo "<th>Passwort</th>"; echo "<th>Vorname</th>"; echo "<th>Nachname</th>"; echo "<th>Datum letzte Bearbeitung</th>"; echo "<th>Letzte Bearbeitung durchgeführt von</th>"; echo"</tr>"; echo"</thead>";
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
/*} else {
    echo "<h2>Du bist nicht angemeldet</h2>";
    echo "Zum <a href=\"adminlogin.html\">Login</a><br />";
}; */
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
