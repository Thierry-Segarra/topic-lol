<?php
session_start();
if(isset($_POST['titre']) && isset($_POST['topic']))
{
    // connexion à la base de données
    include('connect.php');
    
    // on applique les troi fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $titre = mysqli_real_escape_string($db,htmlspecialchars($_POST['titre']));
    $topic = mysqli_real_escape_string($db,htmlspecialchars($_POST['topic']));
    
    if($titre !== "" && $topic !== "")
    {

        $requete = "INSERT INTO `topic`(`titre`, `message`,`id_user`,`date_publication`) VALUES ('".$titre."','".$topic."','".$_SESSION['id_user']."',NOW())"; // id auto-increase
        $requete = mysqli_query($db,$requete) or die("Foobar");// doit normalement executer la requete SQL
        if($requete){
            header('Location: index.php?erreur=2');
        }
        else
        {
            header('Location: index.php?erreur=1');
        }
    }
    else
    {
       header('Location: index.php?erreur=1'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: index.php');
}
mysqli_close($db); // fermer la connexion
?>