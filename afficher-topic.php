<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include('head.php') ?>
    <link rel="stylesheet" href="css/discussion.css">
    <title>League Dump</title>
</head>

<body>
    <!--<div class="cursor"></div> -->
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
                            echo '<a   class="nav-links" href="admin/Back-office-users.php">Back-Office</a>';
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
                            echo '<a   class="nav-links" href="admin/Back-office-users.php">Back-Office</a>';
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

    <span class="responsive-sidenav-open" onclick="openNav()">☰</span>
    <div class="main">
        <div class="container-discussion">
            <a href="discussion.php">
                <div class="row header-poste">
                    <img src="img/arrow_left.png" width="30" height="30" alt="">
                    <h1>Discussion</h1>
                </div>
            </a>
            <div class="container-publication">
                <div class="publication">
                    <div class="header-publication">
                        <div class="row">
                            <img src="../img/Logo.png" width="50" heigth="50" alt="">
                                <?php
                                    include('Fonction-php&JS/connect.php');
                                    $requete3 = "SELECT `message` from topic where id_topic =".$_GET["id"];
                                    $exec_requete3 = mysqli_query($db, $requete3);
                                    $reponse3 = mysqli_fetch_array($exec_requete3);
                                    
                                ?>
                        </div>
                    </div>
                    <div class="content-publication">
                        <?php echo $reponse3['message']; ?>
                    </div>
                </div>
                <div class="comment-publication">
                <?php
                if(isset($_SESSION['id_user'])){
                include('commentaire.php');
                }
                ?>
                </div>
            <div class="reponse-publication">
                <?php
                $requete2="Select * from commentaire where id_topic =".$_GET["id"];
                $exec_requete2 = mysqli_query($db,$requete2);

                while($row = mysqli_fetch_assoc($exec_requete2)){

                $requete3 = "SELECT pseudo from user where id_user =".$row["id_user"];
                $exec_requete3 = mysqli_query($db, $requete3);
                $reponse3 = mysqli_fetch_array($exec_requete3);
                
                    
                ?>
                <div class="commentaire">
                    <div class="row">
                        <?php echo "@" . $row["pseudo_user"]." - publier le : " . $row["date"];?>
                    </div>
                <div class="message-poste">
                    <?php echo $row["contenue"]; ?>
                </div>  
                
                </div>
                <?php
                    };
                ?>
            </div>
            
        
        </div>
    <a href="#top">
        <div id="scrollUp">
        </div>
    </a>
</body>
</html>

