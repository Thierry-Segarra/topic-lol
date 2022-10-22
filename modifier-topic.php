<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Codec</title>
        <link rel="stylesheet" href="loginstyle.css">
    </head>
    <body>
    <?php
        session_start();
        include('connect.php');
        $id = $_GET['id'];
        $id_user = $_SESSION['id_user'];

        $requete = "SELECT * FROM topic where id_topic = ".$id." AND id_user = ".$id_user."";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        ?>
        <div id="container">            
            <form action="modifier-topic-form.php" method="POST">
                <h1>Modification du topic</h1>
                
                <label><b>Modification du Titre de votre Topic</b></label>
                <input type="text" placeholder="Entrer le titre" name="titre" value='<?php echo $reponse['titre'] ?>' maxlength="128" required>

                <label><b>Topic</b></label>
                <div class='areatextdiv'>
                    <textarea class='areatext' id="topic" name="topic"> <?php echo $reponse['message'] ?> </textarea>
                </div>
                <br>
                

                <input type="submit" id='submit' value="POSTER" >
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1){
                        echo "<p style='color:red'>Nom d'utilisateur deja inscrit</p>";
                    }
                    if($err==2){
                        echo "<p style='color:red'>Mot de passe incorrect</p>";
                    }
                    if($err==3){
                        echo "<p style='color:red'>Echec d'inscription</p>";
                    }
                }
                ?>                
            </form>
        </div>
    </body>
</html>