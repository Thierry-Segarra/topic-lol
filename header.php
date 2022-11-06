<nav class="navbar" id="navbar">
            <a href="index.php" class="logo"><img src="img/Salière-Logo.png" height="125px" width="150px"></a>
            <div class="nav-links">
                <ul>
                    <li><a href="index.php" name="page1" id="navlinks">Fil de discussion</a></li>
                    <?php
                    session_start();
                    if(isset($_SESSION['id_user'])){
                    if($_SESSION['pseudo'] != ""){
                        $nom = $_SESSION['pseudo'];
                        if($_SESSION['role'] == "admin"){
                            echo '<li><a href="support.php" id="navlinks">Support</a></li>';
                        }
                            echo '<li><a href="profil.php" name="page3" id="navlinks">'. $nom .'</a></li>';
                            echo '<li><a href="Fonction-php&JS/deconnection.php?dec=1" name="page2" id="navlinks">Deconnection</a></li>';
                    }else{
                        //header('Location: connection.php');
                    }
                    }
                    else{
                        echo '<li><a href="connection.php" name="page2" id="navlinks">Connexion</a></li>';
                    }
                    ?>
                    
                    
                </ul>
            </div>
            <img src="img/Menu.png" alt="menu hamburger" class="menu-hamburger">
        </nav>