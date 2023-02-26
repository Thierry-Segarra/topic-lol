<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include('head.php') ?>
    <title>Accueil</title>
</head>

<body>
    <!--<div class="cursor"></div> -->
    <img class="fond" src="img/darkred.jpg"/>
    <?php include("header2.php");?>
    <br>
    <div id="container-connexion">            
        <form action="Fonction-php&JS/inscri.php" method="POST">
            <h1>Inscription</h1>
            <br>
            <label class="form_label"><b>Nom d'utilisateur</b></label>
            <input type="text" class="form_input" placeholder="Entrer le nom d'utilisateur" name="username" required>

            <label class="form_label"><b>Mot de passe</b></label>
            <input class="form_input" type="password" placeholder="Entrer le mot de passe" name="password" required>
            <label class="form_label"><b>Confirmer mot de passe</b></label>
            <input class="form_input" type="password" placeholder="Confirmer le mot de passe" name="passwordConf" required>
            <br>
            <input class="button" type="submit" id='submit' value="S'INSCRIRE">
            <?php
            if(isset($_GET['erreur'])){
                $err = $_GET['erreur'];
                if($err==1 || $err==2){
                    echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                if($err==3){
                    echo "<p style='color:green'>Connecter-vous</p>";
                }

            }
            if(isset($_GET['sup'])){
                echo "<p style='color:red'>Compte Suprimée</p>";
            }
            ?>
            <p class="bottom-text">Déjà un compte ? <a class="inscription-href" href="connection.php">Connectez-vous</a></p>
            
            
        </form>
    </div>
    <footer><?php include('footer2.php'); ?></footer>
</body>

</html>