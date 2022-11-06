<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    include('connect.php');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username']));
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    
    if($username !== "" && $password !== "")
    {
      $conf = $username; // change pour chaque nom_utilisateur
      $pwd_peppered = hash_hmac("md5", $password, $conf);

      $requete = "SELECT count(*) FROM user where 
         pseudo = '".$username."' and mdp = '".$pwd_peppered."' ";
      $exec_requete = mysqli_query($db,$requete);
      $reponse      = mysqli_fetch_array($exec_requete);
      $count = $reponse['count(*)'];

      $requete2 = "SELECT id_user,role,date_inscription FROM user where 
      pseudo = '".$username."' and mdp = '".$pwd_peppered."' ";
      $exec_requete2 = mysqli_query($db,$requete2);
      $reponse2      = mysqli_fetch_array($exec_requete2);
     
      if($count!=0) // nom d'utilisateur et mot de passe correctes
      {   
         $_SESSION['pseudo'] = $username;
         $_SESSION['id_user'] = $reponse2['id_user'];
         $_SESSION['role'] = $reponse2['role'];
         $_SESSION['date'] = $reponse2['date_inscription'];
          header('Location: ../index.php');
      }
      else
      {
         header('Location: ../connection.php?erreur=1'); // utilisateur ou mot de passe incorrect
      }

      
    }
    else
    {
       header('Location: ../connection.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: ../connection.php');
}
mysqli_close($db); // fermer la connexion
?>