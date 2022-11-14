<?php
session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adminportal - Neuen Admin hinzufügen</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<?php
/* if (isset($_SESSION['session_user'])) {*/
    $host = "localhost";
     $user = "postgres";
     $pass = "Honey6moon17";
     $db = "TinyHouses";
    $con =pg_connect("host= $host user=$user password=$pass dbname=$db") or die ("Verbindung zur Datenbank hat nicht funktioniert\n");

    $firstname = $_POST['vorname'];
    $lastname = $_POST['nachname'];
    $aduser = $_POST['benutzername'];
    $password = $_POST['passwort'];

    /*// Passwort verschlüsseln
    $hashPassword = password_hash($password,PASSWORD_DEFAULT);
    $query= "SELECT max(id) from admindaten";
    $result= pg_fetch_row(pg_query($con, $query));
    $id = intval($result[0])+1;
    $datum = date("j, n, Y");
    // Jetzt wird der Nutzer in die Datenbank übertragen
    $query = "INSERT INTO admindaten (id, benutzername, passwort, vorname, nachname, datum_eintrag, letzte_bearbeitung_von) VALUES ('$id','$user', '$hashPassword', '$firstname', '$lastname', '$datum', '$_SESSION[session_user]')";
    $result = pg_query($con, $query);
    // Der User wird bei einem erfolgreichen Prozess auf 
    // die später noch erstellte Seite dashboard.php geschickt
    header("Location: adminlogin.html");
    exit();*/
    // Passwort verschlüsseln
    $hashPassword = password_hash($password,PASSWORD_DEFAULT);
    var_dump($hashPassword); /* im Vergleich zu oben zusätzlich eingefügt; Gibt alle Informationen zu einer Variablen aus */ 
    $query= "SELECT max(id) from admindaten";
    $result= pg_fetch_row(pg_query($con, $query));
    $id = intval($result[0])+1;
    $datum = date("j, n, Y");
    // Jetzt wird der Nutzer in die Datenbank übertragen
    $query = "INSERT INTO admindaten (id, benutzername, passwort, vorname, nachname, datum_eintrag, letzte_bearbeitung_von) VALUES ('$id','$aduser', '$hashPassword', '$firstname', '$lastname', '$datum', '$_SESSION[session_user]')";
    $result = pg_query($con, $query);
    // Der User wird bei einem erfolgreichen Prozess auf 
    // die später noch erstellte Seite dashboard.php geschickt
    header("Location: adminlogin.html");
    exit();

/*} else {
    // Ist keine Session aktiv, kommt diese Anzeige:
        echo "Du bist nicht angemeldet<br /><br />";
        echo "Zum <a href=\"adminlogin.html\">Login</a><br />";
};*/

?>

