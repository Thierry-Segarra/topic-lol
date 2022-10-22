<!DOCTYPE html>
<html lang="fr">

<?php
include('connect.php');

$requete = "SELECT count(*) from topic";
$exec_requete = mysqli_query($db, $requete);
$reponse = mysqli_fetch_array($exec_requete);
$count = $reponse['count(*)'];

if($count!=0){

        $requete="Select id_topic, titre, message, id_user from topic";
        $exec_requete2 = mysqli_query($db,$requete);

    while($row = mysqli_fetch_assoc($exec_requete2)){
        
        echo'<div style="border: solid black 2px">
       <a href="afficher-topic.php?id=' . $row["id_topic"] . '">Titre : ' . $row["titre"] . '</a>
       <p>Message : ' . $row["message"] . '</p>
       </div><br><br>';
        
    };

};
?>

</html>