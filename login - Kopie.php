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

    // Error handlers
    // Existiert der Benutzername?
    $sql = "SELECT * FROM admindaten WHERE benutzername = '$benutzername'";
    $result = pg_query($con, $sql);
    
    // mysqli_num_rows gibt die Anzahl an, wie oft die Bedingung von $sql erfüllt wird
    $resultCheck = pg_num_rows($result);
    if ($resultCheck < 1) {
        // ?login=user gibt die Information an die index.php weiter
        header("Location: adminlogin.html");
        exit();
    } else { 
        // Ist das Passwort korrekt?
        // Die Variable row wird als Array mit den Informationen aus der Datenbank befüllt
        if ($row = pg_fetch_assoc($result)) {
            // De-Hashing des Passwortes 
            // password_verify($password, $row['passwort']) //gibt true oder false zurück
          /* $hashPassword = password_verify($password, $row['passwort']);
           $Password = password_verify($password, $row['passwort']); */
            if ($password == $row['passwort'])

           /* $hashPassword = password_verify($password, $row['passwort']);
            if ($hashPassword == true)*/ {
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