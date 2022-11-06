<?php
session_start();
include('connect.php');
if($_SESSION['role'] == "admin"){
    $requete= "delete from user where id_user = ".$_GET["id"].";delete from topic where id_user = ".$_GET["id"].";delete from commentaire where id_user = ".$_GET["id"]."";
    $exec_requete = mysqli_query($db,$requete);
    //$reponse = mysqli_fetch_array($exec_requete);
    header('Location: support.php');

};

?>