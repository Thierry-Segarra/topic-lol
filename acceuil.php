<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Codec</title>
        <link rel="stylesheet" href="loginstyle.css">
    </head>
    <body class="bodd">
    <?php
    session_start();
    if($_SESSION['pseudo'] != ""){
        $nom = $_SESSION['pseudo'];
            echo '<p class="titre">Hello '. $nom .'</p>';
        echo'<a href="index.php?dec=1" class="dec">Déconnection</a> <br><br><br><a href="sup.php" class="dec">Suprimé Compte</a>';
    }
    else{
        header('Location: index.php');
    }
    ?>
</body>
</html>
