<?php
session_start();

require('connect.php');

if(isset($_GET['id'])){

    $requete= "select count(*) from commentaire where id_commentaire =".$_GET['id']."";
    $exec_requete1 = mysqli_query($db,$requete);
    $reponse = mysqli_fetch_array($exec_requete1);
    $count = $reponse['count(*)'];

    $requete2= "select * from commentaire where id_commentaire =".$_GET['id']."";
    $exec_requete2 = mysqli_query($db,$requete2);
    $reponse2 = mysqli_fetch_array($exec_requete2); 
    
    if($count !=  0){

        $info_utilisateur = $reponse2;
        if($info_utilisateur['id_user'] == $_SESSION['id_user']){

            $suppcom="delete from commentaire where id_commentaire =".$_GET['id']." ";
            $exec_requete1 = mysqli_query($db,$suppcom);

            header('Location: ../afficher-topic.php?id='.$_GET['id_topic']);

        }else{
            echo "Vous n'êtes pas autorisé à supprimer un commentaire qui ne vous appartient pas !";
        }

    }else{
        echo "Aucun commentaire trouver";
    }

}else{
    echo "Aucun commentaire trouver";
}