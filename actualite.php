<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Style.css">
    <title>Accueil</title>
</head>

<body>
    <!--<div class="cursor"></div> -->
    <img class="fond" src="img/background-LOL.jpg"/>
        <?php include("header.php");?>
    <div class="container-fill">
        <?php if(isset($_SESSION['id_user'])){ ?>
        <div class="newCom">
        <form action="add-topic-form.php" method="POST">
            <label for="newPoste">Ajouter un poste</label><br>
            <input type="text" placeholder="Entrer le titre" name="titre" maxlength="128" required>
            <br>
                <label>message</label>
                <div class='areatextdiv'>
                    <textarea class='areatext' id="topic" name="topic"></textarea>
                </div>
                <br>
                <input type="submit" id='submit' value="POSTER" >
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
        include('connect.php');

        $requete = "SELECT count(*) from topic";
        $exec_requete = mysqli_query($db, $requete);
        $reponse = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];

        if($count!=0){

                $requete2="Select id_topic, titre, message, id_user from topic";
                $exec_requete2 = mysqli_query($db,$requete2);

            while($row = mysqli_fetch_assoc($exec_requete2)){

                $requete3 = "SELECT pseudo from user where id_user =".$row["id_user"];
                $exec_requete3 = mysqli_query($db, $requete3);
                $reponse3 = mysqli_fetch_array($exec_requete3);

            ?>
            <div class="post">
                <div class="entete">
                    
                    <img src="img/Salière Logo.png" height="25px" width="35px">
                    <?php echo "<h3><a href='afficher-topic.php?id=" . $row["id_topic"] . "'>" . $row["titre"] ." @". $reponse3["pseudo"]."</a></h3>";?>
                </div>
                <div class="message">
                <?php echo $row["message"]; ?>
                </div>
                <hr>
            </div>
            <?php
                
            };

        };
        ?>
        
    </div>

    <div id="scrollUp">
        <a href="#top"><img class="gif" src="img/LOL.gif" alt=""><p>Remonter</p></a>
        
    </div>
</body>
</html>
<script>

window.onscroll = function(ev) {
        if (window.scrollY > 200) {
             document.getElementById("navbar").style.backdropFilter = "blur(3px)";
             document.getElementById("navbar").style.paddingBottom = "3px";
             document.getElementById("scrollUp").style.right = "10px";
        }
        else{
            document.getElementById("navbar").style.backdropFilter = "blur(0px)";
            document.getElementById("navbar").style.paddingBottom = "50px";
            document.getElementById("scrollUp").style.right = "-100px";
        }
};

</script>