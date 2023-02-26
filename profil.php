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
        <div class="presentation">
        <div class="text-presentation">
            <p>PROFIL : <?php echo $_SESSION['pseudo'] ?></p>
            <br>
            <p>A REJOINT LEAGUE DUMP LE : <?php echo $_SESSION['date'] ?></p>
        </div>
    </div>
    <br>
    <div class="container-fill">
        
        <hr><br>
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
            <div class="post">
                <div class="entete">
                    
                    <img src="img/Salière-Logo.png" height="25px" width="35px">
                    <?php echo "<h3><a href='afficher-topic.php?id=" . $row["id_topic"] . "'>" . $row["titre"] ." @". $reponse3["pseudo"]."</a></h3>";?>
                </div>
                
                <div class="message">
                <?php echo $row["message"]; ?>
                </div>
                <?php echo "<a href='Fonction-php&JS/suprimer_topic.php?id=" . $row["id_topic"] . "' class='button' >suprimer topic</a>" ?>
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
    <footer><?php include('footer.php'); ?></footer>
</body>
</html>