<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Codec</title>
        <link rel="stylesheet" href="loginstyle.css">
    </head>
    <body>
        <div id="container">            
            <form action="add-topic-form.php" method="POST">
                <h1>Inscription</h1>
                
                <label><b>Titre de votre Topic</b></label>
                <input type="text" placeholder="Entrer le titre" name="titre" maxlength="128" required>

                <label><b>Topic</b></label>
                <div class='areatextdiv'>
                    <textarea class='areatext' id="topic" name="topic"></textarea>
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