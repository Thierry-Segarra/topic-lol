<?php
session_start();
include('connect.php');
$username = $_SESSION['pseudo'];
$id_topic = mysqli_real_escape_string($db,htmlspecialchars($_GET['id']));

$requete = "Select * FROM `topic` WHERE id_topic = '".$id_topic."' ";
$exec_requete = mysqli_query($db,$requete);
$reponse      = mysqli_fetch_array($exec_requete);
if($reponse['id_user'] == $_SESSION['id_user'] || $_SESSION['role'] == 'admin'){
    $requete = "DELETE FROM `topic` WHERE id_topic = '".$id_topic."' ";
    $exec_requete = mysqli_query($db,$requete);
    header('Location: ../discussion.php?sup=1');
}
header('Location: ../discussion.php?sup=2');
?>