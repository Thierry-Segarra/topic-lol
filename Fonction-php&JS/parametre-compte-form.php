<?php
session_start();
if(isset($_POST['verificationPassword']))
{   

    if(isset($_POST['password']) || isset($_POST['passwordConf'])){
        include('connect.php');
        $verificationPassword = mysqli_real_escape_string($db,htmlspecialchars($_POST['verificationPassword']));
        $pwd_peppered = hash_hmac("sha512", $verificationPassword, 5);

        $nom = mysqli_real_escape_string($db,htmlspecialchars($_POST['nom']));
        $premom = mysqli_real_escape_string($db,htmlspecialchars($_POST['premom']));
        $email = mysqli_real_escape_string($db,htmlspecialchars($_POST['email']));
        $pseudo = mysqli_real_escape_string($db,htmlspecialchars($_POST['pseudo']));

        $requete = "";
        if (isset($nom)) {
            $requete .= 'nom = "'.$nom.'"';
        }
        if (isset($premom)) {
            $requete .= 'premom = "'.$premom.'"';
        }
        if (isset($pseudo)) {
            $requete .= 'pseudo = "'.$pseudo.'"';
        }


        $requete = "SELECT count(*),id_user FROM user where email = '".$_SESSION['email']."' and mot_de_passe = '".$pwd_peppered."'";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];

        if($count == 1){  // == 1 si les informationsde l'utilisatuer son correct avant les nouvelles modification
            if($_POST['email'] != ""){ // si il veut modifier son nom d'utilisateur
                $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username']));

                $requete2 = "SELECT count(email) FROM user where email = '".$email."'";
                $exec_requete2 = mysqli_query($db,$requete2);
                $reponse2      = mysqli_fetch_array($exec_requete2);
                $count2 = $reponse2['count(nom_utilisateur)']; // si 0 = non utiliser si 1 = utiliser

                if($count2==0) // !=0 si le nom_utilisateur et deja utiliser | == 0 si le nom_utilisateur n'est pas utiliser
                {   

                    $requete3 = 'UPDATE `user` SET `email`="'.$email.'" '.$requete.' WHERE id = "'.$reponse['id_user'].'"';
                    $requete3 = mysqli_query($db,$requete3) or die("Foobar");// doit normalement executer la requete SQL
                    if($requete3){
                        $_SESSION['username'] = $username;
                        header('Location: ../parametre_compte.php?erreur=4');
                    }
                    else
                    {
                        header('Location: ../parametre_compte.php?erreur=2');
                    }
                }
                else
                {
                    header('Location: ../parametre_compte.php?erreur=1');// nom d'utilisateur et deja inscrit
                }
            }

            if($_POST['password'] != "" && $_POST['passwordConf'] != ""){ // si il veut modifier son mots de passe
                $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
                $passwordConf = mysqli_real_escape_string($db,htmlspecialchars($_POST['passwordConf']));

                if($password == $passwordConf){

                    $pwd_peppered = hash_hmac("sha512", $password, 8); // sha256 mieux que md5 mais c'est pour le test
                    $requete3 = "UPDATE `utilisateur` SET `mot_de_passe`='".$pwd_peppered."' WHERE id_user = '".$reponse['id_user']."'";
                    $requete3 = mysqli_query($db,$requete3) or die("Foobar");// doit normalement executer la requete SQL
                    if($requete3){
                        header('Location: ../parametre_compte.php?erreur=3');
                    }
                    else
                    {
                        header('Location: ../parametre_compte.php?erreur=2');
                    }


                }else{
                    header('Location: ../parametre_compte.php?erreur=1');// nom d'utilisateur et deja inscrit
                }

            }

            if($_POST['username'] != "" && $_POST['password'] != "" && $_POST['passwordConf'] != ""){
                header('Location: ../parametre_compte.php');// nom d'utilisateur et deja inscrit
            }


        }else{
            header('Location: ../parametre_compte.php');// nom d'utilisateur et deja inscrit
        }
    }else{
        header('Location: ../parametre_compte.php');// nom d'utilisateur et deja inscrit
    }



}
else
{
   header('Location: ../parametre-compte.php');
}
mysqli_close($db); // fermer la connexion
?>