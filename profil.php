<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/discussion.css">
    <title>League Dump</title>
</head>

<body>
    <!-- Side navigation -->
    <div class="sidenav">
        <div class="Logo-side">
            <a href="index.php">
                <img src="img/Logo.png" alt="" width="100" height="80">
            </a>
        </div>
        
        <div class="link-nav">
            <a class="nav-links" href="index.php">Accueil</a>
            <?php
                    session_start();
                    if(isset($_SESSION['id_user'])){
                    if($_SESSION['pseudo'] != ""){
                        $nom = $_SESSION['pseudo'];
                        if($_SESSION['role'] == "admin"){
                            echo '<a   class="nav-links" href="support.php">Back-Office</a>';
                        }
                            echo '<a class="nav-links" href="profil.php" name="page3">'. $nom .'</a>';
                            echo '<a class="nav-links" href="Fonction-php&JS/deconnection.php?dec=1" name="page2">Déconnexion</a>';
                    }else{
                        //header('Location: connection.php');
                    }
                    }
                    else{
                        echo '<a class="nav-links" href="connection.php" name="page2">Connexion</a>';
                        echo '<a class="nav-links" href="inscription.php" name="page2">Inscription</a>';
                    }
                    ?>
        </div>
    </div>

    <!--SIDENAV RESPONSIVE -->
    <div id="mySidenav" class="responsive-sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="link-nav">
            <a class="nav-links" href="accueil.html">Accueil</a>
            <?php
                    if(isset($_SESSION['id_user'])){
                    if($_SESSION['pseudo'] != ""){
                        $nom = $_SESSION['pseudo'];
                        if($_SESSION['role'] == "admin"){
                            echo '<a   class="nav-links" href="support.php">Back-Office</a>';
                        }
                            echo '<a class="nav-links" href="profil.php" name="page3">'. $nom .'</a>';
                            echo '<a class="nav-links" href="Fonction-php&JS/deconnection.php?dec=1" name="page2">Déconnexion</a>';
                    }else{
                        header('Location: index.php');
                    }
                    }else{
                        header('Location: index.php');
                    }
                    ?>
        </div>
    </div>

    <!-- Use any element to open the sidenav -->
    <span class="responsive-sidenav-open" onclick="openNav()">☰</span>

    <!-- Page content -->
    <div class="main">
        <div class="container-discussion">
            <a href="discussion.php">
                <div class="row header-poste">
                    <img src="img/arrow_left.png" width="30" height="30" alt="">
                    <h1>Discussion</h1>
                </div>
            </a>

            <div class="bandeau-profil">
                <div class="container-bandeau-profil">
                    <div class="photo-compte">
                        <img src="img/Logo.png" alt="" width="200" height="180">
                    </div>
                    <div class="header-compte">
                    <?php echo '@'.$_SESSION['pseudo'] ?>
                    </div>
                    <div class="update-compte">
                        <span class="button" id="showInfos" onclick="modifInformations()">Modifier mes
                            informations</span>
                    </div>
                </div>
            </div>


            <div class="container-publication informations-profil" id="infos-user">
                <form>
                    <div class="container-input-profil">
                        <input class="input-profil" type="text" placeholder="Nom" name="" id="">
                        <input class="input-profil" type="text" placeholder="Prénom" name="" id="">
                        <input class="input-profil" type="text" placeholder="Mail" name="" id="">
                        <input class="input-profil" type="text" placeholder="Mot de passe" name="" id="">
                    </div>
                    <div class="container-update-profil">
                        <input type="submit" value="Confirmer" class="button" id="updateProfil">
                    </div>
                </form>
            </div>
            <br>
            <h1>Mes postes</h1>
            <?php
                include('Fonction-php&JS/connect.php');

                $requete = "SELECT count(*) from topic  where id_user = '".$_SESSION['id_user']."'";
                $exec_requete = mysqli_query($db, $requete);
                $reponse = mysqli_fetch_array($exec_requete);
                $count = $reponse['count(*)'];

                if($count!=0){

                        $requete2="SELECT id_topic, titre, message, id_user from topic where id_user = '".$_SESSION['id_user']."'";
                        $exec_requete2 = mysqli_query($db,$requete2);

                    while($row = mysqli_fetch_assoc($exec_requete2)){

                        $requete3 = "SELECT pseudo from user where id_user =".$row["id_user"];
                        $exec_requete3 = mysqli_query($db, $requete3);
                        $reponse3 = mysqli_fetch_array($exec_requete3);

                    ?>

            <div class="poste">
                <a class="consult-poste" href="<?php echo "afficher-topic.php?id=" . $row["id_topic"] ?>">
                    <div class="titre-poste">
                        <h3><?php echo $row["titre"] ?></h3>
                    </div>
                    <div class="message-poste">
                        <?php echo $row["message"]; ?>
                    </div>
                    <div class="footer-poste">
                        <div class="img-message">
                            <img src="img/message.png" alt="" width="30" height="30">
                        </div>
                        <div class="nb-message">
                            <?php 
                            $requete4 = "SELECT count(id_commentaire) nb_com from commentaire where id_topic =".$row["id_topic"];
                            $exec_requete4 = mysqli_query($db, $requete4);
                            $reponse4 = mysqli_fetch_array($exec_requete4);
                            
                            echo $reponse4["nb_com"]; ?>
                        </div>
                        <div class="delete-poste">
                            <a href='Fonction-php&JS/suprimer_topic.php?id=<?php echo $row["id_topic"] ?>' class='button'>suprimer topic</a>
                        </div>
                    </div>
                </a>
            </div>
            <?php }} ?>

        </div>
    </div>
</body>

</html>

<script>
    /* Open the sidenav */
    function openNav() {
        document.getElementById("mySidenav").style.width = "100%";
    }

    /* Close/hide the sidenav */
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }

    function modifInformations() {
        document.getElementById("infos-user").style.display = "block";
    }
</script>