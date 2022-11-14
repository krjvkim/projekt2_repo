<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/siedlungen.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@1,100&display=swap" rel="stylesheet">
    <title>
        Smart Factory Show Room - Modul
    </title>
</head>
<body>
    <div id="slideout-menu">
    <ul>
            <li>
                <a href="webappstartseite.php">Home</a>
            </li>
            <!--<li>
                <a href="ueberdasprojekt.php">Über das Projekt</a>
            </li>
            <li>
                <a href="projektpartner.php">Projektpartner</a>
            </li>-->
            <li>
                <a href="tinyhousesiedlungen.php">Tiny House Siedlungen</a>
            </li>
            <li>
                <a href="adminstartseite.php">Adminportal</a>
            </li>
            <li>
                <input type="text" placeholder="Hier Suchen...">
            </li>
        </ul>
    </div>

    <nav>
        <div id="logo-img">
            <a href="webappstartseite.php">
                <img src="img/projektlogofinal.png" alt="Wooden Valley Logo">
            </a>
        </div>
        <div id="menu-icon">
            <i class="fas fa-bars"></i>
        </div>
        <ul>
            <li>
                <a href="webappstartseite.php">Home</a>
            </li>
            <!--<li>
                <a href="ueberdasprojekt.php">Über das Projekt</a>
            </li>
            <li>
                <a href="projektpartner.php">Projektpartner</a>
            </li>-->
            <li>
                <a href="tinyhousesiedlungen.php">Tiny House Siedlungen</a>
            </li>
            <li>
                <a href="adminstartseite.php">Adminportal</a>
            </li>
            <li>
                <div id="search-icon">
                    <i class="fas fa-search"></i>
                </div>
            </li>
        </ul>
    </nav>
    <div id="searchbox">
        <input type="text" placeholder="Hier Suchen...">
    </div>
    
    <main>
        
        <h2 class="page-heading">Modul "Eingang"</h2>
        <div id="post-container">
            <section id="blogpost">
                <div class="card">
                    <div class="card-image">
                        <img src="img/moduleingang.jpeg" alt="Card Image">
                    </div>
                    <div class="card-description">
                        <h3>Modulinformationen</h3>
                        <p>
                        <?php
                            $host = "localhost";
                            $user = "postgres";
                            $pass = "Honey6moon17";
                            $db = "TinyHouses";
                            $con = pg_connect("host= $host user=$user password=$pass dbname=$db") or die ("Verbindung zur Datenbank hat nicht funktioniert\n");
                            $tabelle = 'tinyhouses';
                            $datei = 'tinyhouseseiteModell.php'; 
    
                            $query = "SELECT texte FROM webapptexte WHERE ueberschrift = 'Modul Eingang'";
                            $result = pg_query($con, $query);
                           
                            while ($row=pg_fetch_row($result))
                            {
                                echo "<tr>";
                                foreach ($row as $item)    // jedes Element $item der Zeile $row durchlaufen
                                    echo "<td>$item</td>";
                                
                                echo "</tr>\n";
                            }
                        ?>
                        
                        <?php
    
                            $query = "SELECT id, modulname, montagedatum, tinyhouseid FROM module WHERE id = '100101'";
                            $result = pg_query($con, $query);
                        // Tabelle in HTML darstellen
                        echo "<table class='content-table'>\n";
                        echo "<thead>"; echo "<tr>"; echo "<th>Modul-ID</th>"; echo "<th>Modulname</th>"; echo "<th>Montagedatum</th>"; echo "<th>Tiny House-ID</th>"; echo "</tr>"; echo"</thead>";
                        while ($row=pg_fetch_row($result))
                        {
                            echo "<tr>";
                            foreach ($row as $item)    // jedes Element $item der Zeile $row durchlaufen
                                echo "<td>$item</td>";
                               echo "</tr>\n";
                        }
                        echo "</table>\n";
                            
                        ?> 
                        </p>
                    </div>
                </div>
            </section>
            
            <footer id="sidebar">
            <div id="sidebar">
                <h3> Weiter zu den Elementen dieses Moduls</h3>
                <p>
                    <ul>
                        <li>
                            <a href="elementseiteModell06.php">Element Wand Strom</a>
                        </li>
                        <li>
                            <a href="elementseiteModell07.php">Element Wand Wasser</a>
                        </li>
                        <li>
                            <a href="elementseiteModell08.php">Element Wand Fenster</a>
                        </li>
                        <li>
                            <a href="elementseiteModell09.php">Element Decke Standard</a>
                        </li>
                        <li>
                            <a href="elementseiteModell10.php">Element Boden Standard</a>
                        </li>
                        <li>
                            <a href="elementseiteModellGestell02.php">Element Gestell 2</a>
                        </li>
                        
                        <li>
                            <a href="tinyhouseseiteModell.php">Zurück zum Tiny House Modell</a>
                        </li>
                    </ul>
                </p>
                    </div>
            </footer>
        </div>

        <footer>
        <div id="left-footer">
                <h3>Quick Links</h3>
                <p>
                    <ul>
                        <li>
                            <a href="webappstartseite.php">Home</a>
                        </li>
                        <li>
                            <a href="https://www.woodenvalley.de/">About</a>
                        </li>
                        <li>
                            <a href="https://www.woodenvalley.de/937-2/">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="https://www.woodenvalley.de/impressum-2/">Impressum</a>
                        </li>
                        <li>
                            <a href="https://www.woodenvalley.de/kontakt/">Contact</a>
                        </li>
                    </ul>
                </p>
            </div>
            <div id="right-footer">
                <h3>Follow us on</h3>
                <div id="social-media-footer">
                    <ul>
                        <li>
                            <a href="https://www.instagram.com/hochschule.es/?hl=de">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>    
                        <li>
                            <a href="https://www.youtube.com/c/hochschuleesslingen">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/company/woodenvalley-ug-h/">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <p>Diese Website wurde von der Projektgruppe des Studiengangs Smart Factory der Hoschschule Esslingen entwicklet.</p>
            </div>
        </footer>
    </main>
    <script src="main.js"></script>
</body>

</html>