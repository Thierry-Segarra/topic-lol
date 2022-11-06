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
    <br>
    <div id="container-connexion">            
        <form action="Fonction-php&JS/verif.php" method="POST">
            <h1>Connectez-vous</h1>
            <br>
            <label class="form_label"><b>Nom d'utilisateur</b></label>
            <input type="text" class="form_input" placeholder="Entrer le nom d'utilisateur" name="username" required>

            <label class="form_label"><b>Mot de passe</b></label>
            <input class="form_input" type="password" placeholder="Entrer le mot de passe" name="password" required>
            <br>
            <input class="button" type="submit" id='submit' value="S'IDENTIFIER" >
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
            <p class="bottom-text">Si vous n'avez pas de compte : <a class="inscription-href" href="inscription.php">Incrivez-vous</a></p>
            
            
        </form>
    </div>

</body>

</html>
<?php include('Fonction-php&JS/scroll.php') ?>