<?php
// Sitzung starten, damit der Benutzer eingeloggt bleibt
session_start();

if (isset($_POST['submit'])) {

    $host = "localhost";
    $user = "postgres";
    $pass = "Honey6moon17";
    $db = "TinyHouses";
    $con =pg_connect("host= $host user=$user password=$pass dbname=$db") or die ("Verbindung zur Datenbank hat nicht funktioniert\n");
    

    $benutzername = $_POST['benutzername'];
    $password = $_POST['passwort']; 
    //$hashPassword = password_hash("$_POST[passwort]", PASSWORD_DEFAULT); macht durch die salted hashes keinen Sinn, es entsteht ein anderer hash

    // Error handlers
    // Existiert der Benutzername?
    $sql = "SELECT * FROM admindaten WHERE benutzername = '$benutzername'";
    $result = pg_query($con, $sql);
    
    // pg_num_rows gibt die Anzahl an, wie oft die Bedingung von $sql erfüllt wird
    $resultCheck = pg_num_rows($result);
    if ($resultCheck < 1) { //wenn es den Benutzernamen also nicht gibt
        // ?login=user gibt die Information an die index.php weiter
        header("Location: adminlogin.html");
        exit();
    } else { 
        // Ist das Passwort korrekt?
        // Die Variable row wird als Array mit den Informationen aus der Datenbank befüllt
        if ($row = pg_fetch_assoc($result)) { //holt die Infos zu dem eingegebenen Benutzernamen
            // Eingegebene $password mit dem gehashten Passwort $row['passwort'aus der Tabelle vergleichen  
            
           // if ($password == $row['passwort'])   //passwort entspricht dem gehasten aus der DB "zeile" --> liefert hier false

           //funktioniert nicht mit $hashPassword, weil durch password_hash() salted hashes entstehen, 
           //dadurch wird jeder hash unterschiedlich sein, auch wenn das source password gleich ist
           // daher varify mit password und nicht mit $hashPassword:
            if (password_verify($password, $row['passwort']))  { 
                $_SESSION['session_id'] = $row['id'];
                $_SESSION['session_user'] = $row['benutzername'];
                $_SESSION['session_firstname'] = $row['vorname'];
                $_SESSION['session_lastname'] = $row['nachname'];
                header("Location: adminstartseite.php");
                exit();
            } else {
                header("Location: adminlogin.html");
                exit();
            } 
        }
    }

} else {
    header("Location: adminlogin.html");
    exit();
}