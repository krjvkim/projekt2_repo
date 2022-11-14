<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@1,100&display=swap" rel="stylesheet">
    <title>
        Smart Factory Show Room
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
        <h2 class="page-heading">Tiny House Siedlungen</h2>
        <section>
            <div class="card">
                <div class="card-decription">
                    <div class="card-image">
                        <a href="siedlungseiteGP.php">
                            <img src="img/tinyhousedorf1.webp" alt="Card Image">
                        </a>
                    </div>
                        <a href="siedlungseiteGP.php">
                            <h3>Tiny House Siedlung Göppingen</h3>
                        </a>
                        <p>
                        <?php
                        $host = "localhost";
                        $user = "postgres";
                        $pass = "Honey6moon17";
                        $db = "TinyHouses";
                        $con = pg_connect("host= $host user=$user password=$pass dbname=$db") or die ("Verbindung zur Datenbank hat nicht funktioniert\n");
                        $tabelle = 'webapptexte';
                        $datei = 'webappstartseite.php'; 
        
                        $query = "SELECT texte FROM webapptexte WHERE ueberschrift = 'Tiny House Siedlung Göppingen'";
                            $result = pg_query($con, $query);
                            
                            while ($row=pg_fetch_row($result))
                            {
                                echo "<tr>";
                                foreach ($row as $item)    // jedes Element $item der Zeile $row durchlaufen
                                    echo "<td>$item</td>";
                                
                                echo "</tr>\n";
                            }
                        ?>
                        </p>
                        
                        <a href="siedlungseiteGP.php" class="btn-mehrerfahren">Mehr Erfahren</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-decription">
                    <div class="card-image">
                        <a href="siedlungseiteES.php">
                            <img src="img/tinyhousedorf3.jpeg" alt="Card Image">
                        </a>
                    </div>
                    <a href="siedlungseiteES.php">
                        <h3>Tiny House Siedlung Esslingen</h3>
                    </a>
                    <p>
                        <?php
                       
                        $query = "SELECT texte FROM webapptexte WHERE ueberschrift = 'Tiny House Siedlung Esslingen'";
                            $result = pg_query($con, $query);
                            
                            while ($row=pg_fetch_row($result))
                            {
                                echo "<tr>";
                                foreach ($row as $item)    // jedes Element $item der Zeile $row durchlaufen
                                    echo "<td>$item</td>";
                                
                                echo "</tr>\n";
                            }
                        ?>
                        </p>
                    <a href="siedlungseiteES.php" class="btn-mehrerfahren">Mehr Erfahren</a>
                </div>
            </div> 
        </section>

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