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
        <?php if(isset($_SESSION['id_user'])){ ?>
        <div class="newCom">
        <form action="Fonction-php&JS/add-topic-form.php" method="POST">
            <div class="form-entete">
                    <label class="form_label"><b>Ajouter un poste</b></label>
                    <img class="entete-img" src="img/AddPoste.png">
                </div>
                <input type="text" class="form_input" name="titre" placeholder="Titre du poste...">
                <textarea id="newPoste"  rows="5" cols="33" class="form_input" name="topic" placeholder="Contenu du poste..."></textarea>
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
        <hr><br>
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

            ?>
            <div class="post">
                <div class="entete">
                    
                    <img src="img/Salière-Logo.png" height="25px" width="35px">
                    <?php echo "<h3><a href='afficher-topic.php?id=" . $row["id_topic"] . "'>" . $row["titre"] ." @". $reponse3["pseudo"]." - publier le : ". $row["date"]." </a></h3>";?>
                </div>
                <div class="message">
                <?php echo $row["message"]; ?>
                </div>
                <?php
                if(isset($_SESSION['role'])){
                    if($_SESSION['role'] == "admin"){
                        echo "<a href='Fonction-php&JS/suprimer_topic.php?id=" . $row["id_topic"] . "' class='button'>suprimer topic</a>";
                    }
                }
                ?>
                <hr>
            </div>
            <?php
                
            };

        };
        ?>
        
    </div>
    <a href="#top">
        <div id="scrollUp">
        </div>
    </a>
    <footer><?php include('footer.php') ?></footer>
</body>
</html>

<?php //include('Fonction-php&JS/scroll.php') ?>