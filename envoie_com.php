<?php
session_start();
include('connect.php');
if(isset($_POST['valide_com'])){

    if(!empty($_POST['valide_com'])){
        $id_topic = $_POST['id_topic'];
        $pseudo_user = $_POST['pseudo_user'];
        $message_com = mysqli_real_escape_string($db,htmlspecialchars($_POST['valide_com']));
        
        $requete="INSERT INTO commentaire (date,contenue,pseudo_user, id_user, id_topic) values (NOW(), '".$message_com."','".$_SESSION['pseudo']."',  '".$_SESSION['id_user']."',  '".$id_topic."')";    
        $exec_requete = mysqli_query($db,$requete);
        header('Location: afficher-topic.php?id='.$id_topic.'');
    }
    else {header('Location: afficher-topic.php?id='.$_POST['id_topic'].'');}
}

?>