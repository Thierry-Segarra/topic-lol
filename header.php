<nav class="navbar" id="navbar">
            <a href="index.php" class="logo"><img src="img/Salière Logo.png" height="125px" width="150px"></a>
            <div class="nav-links">
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="actualite.php">Fil de discussion</a></li>
                    <li><a href="#"><a href="pages/Patch.php">Notes de patchs</a></li>
                    <?php
                    session_start();
                    if(isset($_SESSION['id_user'])){
                    if($_SESSION['pseudo'] != ""){
                        $nom = $_SESSION['pseudo'];
                            echo '<li><p>'. $nom .'</p></li>';
                            echo '<li><a href="deconnection.php?dec=1">Deconnection</a></li>';
                    }else{
                        //header('Location: connection.php');
                    }
                    }
                    else{
                        echo '<li><a href="connection.php">Connexion</a></li>';
                    }
                    ?>
                    
                    
                </ul>
            </div>
        </nav>