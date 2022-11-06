<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include('head.php') ?>
    <title>Accueil</title>
</head>

<body>
    <!--<div class="cursor"></div> -->
    <img class="fond" src="img/background-LOL.jpg"/>
        <?php include("header.php");?>
    <div class="container-fill">
        
        <div class="newCom">
        <?php
            include('Fonction-php&JS/connect.php');
            $requete3 = "SELECT `message` from topic where id_topic =".$_GET["id"];
            $exec_requete3 = mysqli_query($db, $requete3);
            $reponse3 = mysqli_fetch_array($exec_requete3);
            echo '<p>'.$reponse3['message'].'</p><br>';
        ?>
        </div>
        <hr>
        
                <?php
                if(isset($_SESSION['id_user'])){
                include('commentaire.php');
                }
                ?>
        <?php
                $requete2="Select * from commentaire where id_topic =".$_GET["id"];
                $exec_requete2 = mysqli_query($db,$requete2);

            while($row = mysqli_fetch_assoc($exec_requete2)){

                $requete3 = "SELECT pseudo from user where id_user =".$row["id_user"];
                $exec_requete3 = mysqli_query($db, $requete3);
                $reponse3 = mysqli_fetch_array($exec_requete3);
                
                    
                ?>
                
                
                
                <br>
                <br>
            <div class="post">
                <div class="entete">
                
                    <img src="img/Salière-Logo.png" height="25px" width="35px">
                    <?php echo "<p>" . $row["pseudo_user"]." - publier le : " . $row["date"]."</p>";?>
                </div>
                <div class="message">
                <?php echo $row["contenue"]; ?>
                <br><br>
                <?php
                if(isset($_SESSION['id_user'])){
                if($row["id_user"] == $_SESSION['id_user'] || $_SESSION['role'] == "admin"){
                    ?>
                    <br><br>
                    <a href="Fonction-php&JS/supp_com.php?id=<?php echo $row["id_commentaire"]  ?>&id_topic=<?php echo $row["id_topic"]  ?>" class="button" >Suprimer commentaire</a>
                <?php
                }    
                }           
                ?>
                </div>
                
                <hr>
            </div>
            <?php
                
            };
        ?>
        
        </div>
    <a href="#top">
        <div id="scrollUp">
        </div>
    </a>
</body>
</html>
<?php include('Fonction-php&JS/scroll.php') ?>
