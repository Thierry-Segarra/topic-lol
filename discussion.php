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
    <img class="fond" alt="fond" src="img/noxus_splash.jpg" />
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
                            echo '<a   class="nav-links" href="Back-office-users.php">Back-Office</a>';
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
            <a class="nav-links" href="../Accueil.html">Accueil</a>
            <?php
                    if(isset($_SESSION['id_user'])){
                    if($_SESSION['pseudo'] != ""){
                        $nom = $_SESSION['pseudo'];
                        if($_SESSION['role'] == "admin"){
                            echo '<a   class="nav-links" href="Back-office-users.php">Back-Office</a>';
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

    <!-- Use any element to open the sidenav -->
    <span class="responsive-sidenav-open" onclick="openNav()">☰</span>

    <!-- Page content -->
    <div class="main">
        <div class="container-discussion">
            <h1>Fil de discussion</h1>
            <?php if(isset($_SESSION['id_user'])){ ?>
            <div class="container-publication">
                <form action="Fonction-php&JS/add-topic-form.php" method="POST">
                    <input type="text" class="area-publication" name="titre" placeholder="Titre du poste...">
                    <textarea name="topic" id="area-publication" class="area-publication" cols="30"
                        placeholder="Quoi de neuf ?"></textarea>
                    <input type="submit" value="Publier" class="button" id="sendPoste">
                </form>
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1){
                        echo "<p style='color:red'>Echec de l'envoi du Topic</p>";
                    }
                    if($err==2){
                        echo "<p style='color:green'>Topic Poster</p>";
                    }
                }
                ?> 
            </div>
            <?php } ?>
            <br>
            <?php
        include('Fonction-php&JS/connect.php');

        $requete = "SELECT count(*) from topic";
        $exec_requete = mysqli_query($db, $requete);
        $reponse = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];

        if($count!=0){

                $requete2='Select id_topic, titre, message,DATE_FORMAT(date_publication, "%d/%m/%Y") AS date, id_user,DATE_FORMAT(TIMEDIFF( NOW(), date_publication ), "%H:%i")AS Time from topic Order By date_publication DESC';
                $exec_requete2 = mysqli_query($db,$requete2);

            while($row = mysqli_fetch_assoc($exec_requete2)){

                $requete3 = "SELECT pseudo from user where id_user =".$row["id_user"];
                $exec_requete3 = mysqli_query($db, $requete3);
                $reponse3 = mysqli_fetch_array($exec_requete3);

                $requete4 = "SELECT count(id_commentaire) nb_com from commentaire where id_topic =".$row["id_topic"];
                $exec_requete4 = mysqli_query($db, $requete4);
                $reponse4 = mysqli_fetch_array($exec_requete4);

            ?>
            <div class="poste">
                <a class="consult-poste" href='afficher-topic.php?id=<?php echo $row["id_topic"] ?>'>
                    <div class="titre-poste">
                            <h3><?php echo $row["titre"]." @". $reponse3["pseudo"]." - publier le : ". $row["date"] ?></h3>
                    </div>
                    <div class="message-poste">
                        <?php echo $row["message"]; ?>
                    </div>
                    <div class="footer-poste">
                        <div class="img-message">
                            <img src="img/message.png" alt="" width="30" height="30">
                        </div>
                        <div class="nb-message">
                        <?php echo $reponse4["nb_com"]; ?>
                        </div>
                    </div>
                </a>
                <?php
                if(isset($_SESSION['role'])){
                    if($_SESSION['role'] == "admin"){
                        echo "<br><a href='Fonction-php&JS/suprimer_topic.php?id=" . $row["id_topic"] . "' class='button'>suprimer topic</a>";
                    }
                }
                ?>
            </div>
            <?php
                
            };

        };
        ?>
                
            
        </div>
    </div>
    <a href="#top">
        <div id="scrollUp">
        </div>
    </a>
</body>
<?php include('Fonction-php&JS/scroll.php') ?>
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
</script>