<?php
session_start();
include('connect.php');
if($_SESSION['role'] == "admin"){
    $requete= "delete from commentaire where id_user = ".$_GET["id"]."";
    $exec_requete = mysqli_query($db,$requete);
    $requete2= "delete from topic where id_user = ".$_GET["id"]."";
    $exec_requete2 = mysqli_query($db,$requete2);
    $requete3= "delete from user where id_user = ".$_GET["id"]."";
    $exec_requete3 = mysqli_query($db,$requete3);
    //$reponse = mysqli_fetch_array($exec_requete);
    header('Location: ../admin/Back-office-users.php');

};

?>