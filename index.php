<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,100&display=swap" rel="stylesheet">
    <title>
        Smart Factory Show Room
    </title>
</head>
<body>
    <div id="slideout-menu">
        <ul>
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a href="überdasprojekt.html">Über das Projekt</a>
            </li>
            <li>
                <a href="projektpartner.html">Projektpartner</a>
            </li>
            <li>
                <a href="tinyhousedörfer.html">Tiny House Dörfer</a>
            </li>
            <li>
                <a href="/Adminportal/adminlogin.html">Adminportal</a>
            </li>
            <li>
                <input type="text" placeholder="Hier Suchen...">
            </li>
        </ul>
    </div>

    <nav>
        <div id="logo-img">
            <a href="index.html">
                <img src="img/projektlogofinal.png" alt="Wooden Valley Logo">
            </a>
        </div>
        <div id="menu-icon">
            <i class="fas fa-bars"></i>
        </div>
        <ul>
            <li>
                <a class="active" href="index.html">Home</a>
            </li>
            <li>
                <a href="überdasprojekt.html">Über das Projekt</a>
            </li>
            <li>
                <a href="projektpartner.html">Projektpartner</a>
            </li>
            <li>
                <a href="tinyhousedörfer.html">Tiny House Dörfer</a>
            </li>
            <li>
                <a href="/Adminportal/adminlogin.html">Adminportal</a>
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
        
        <h2 class="page-heading">Wooden Valley</h2>
        <div id="post-container">
            


            <section id="blogpost">
                <div class="card">
                    <div class="card-meta-blogpost">
                        Posted by Admin in 01/01/18 in 
                        <a href="#">Web Dev</a>
                    </div>
                    <div class="card-image">
                        <img src="img/projektteamstudierende.jpeg" alt="Card Image">
                    </div>
                    <div class="card-description">
                        <h3>The Introduction</h3>
                        <p>
                            
                            <?php
                    
                            #$host = "localhost";
                            #$user = "jakim";
                            #$password = "edv1-09";
                            #$dbname = "jakimsdb";
                            #$options='--client_encoding=UTF8';

                            # Verbindung zur Datenbank herstellen
                            
                            $cn =pg_connect("host=localhost port=5432 user=postgres password=Honey6moon17 dbname=TinyHouses"); #or die("Not Connectable du Looser");

                            # Prüfen ob die Verbindung geklappt hat
                            if ($cn)
                            {echo "YESSSSSS! connected";
                            }
                            else
                            {echo "Nope";
                            }
                            
                            $sql = "SELECT * FROM person";
                    
                            
                            $ergebnis = pg_query($con);
                            while($row=pg_fetch_object($result))
                            {
                                echo "<br/>".$row->person_id." ".$row->name;
                            }
                            pg_close($con);

                            ?>
            
                        </p>
                    </div>
                </div>
            </section>
            
            <aside id="sidebar">
                <h3> Sidebar Heading</h3>
                <p> Senuenuendeunejnjbehvbehvbehvbebv</p>
            </aside>
        </div>

        <footer>
            <div id="left-footer">
                <h3>Quick Links</h3>
                <p>
                    <ul>
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">About</a>
                        </li>
                        <li>
                            <a href="#">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="#">Module</a>
                        </li>
                        <li>
                            <a href="#">Contact</a>
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