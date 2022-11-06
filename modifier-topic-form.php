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
            
        $requete = "SELECT count(titre) FROM topic where titre = '".$topic."'";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(titre)']; // si 0 = non utiliser si 1 = utiliser

        if($count==0) // !=0 si le nom_utilisateur et deja utiliser | == 0 si le nom_utilisateur n'est pas utiliser
        {   

            $requete = "INSERT INTO `topic`(`titre`, `message`) VALUES ('".$titre."','".$topic."')"; // id auto-increase
            $requete = mysqli_query($db,$requete) or die("Foobar");// doit normalement executer la requete SQL
            if($requete){
                header('Location: actualite.php?erreur=3');
            }
            else
            {
                header('Location: inscription.php?erreur=3');
            }
        }
        else
        {
            header('Location: inscription.php?erreur=1');// nom d'utilisateur et deja inscrit
        }
    }
    else
    {
       header('Location: inscription.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: inscription.php');
}
mysqli_close($db); // fermer la connexion
?>