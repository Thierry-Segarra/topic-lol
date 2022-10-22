<!DOCTYPE html>
<html lang="fr">


<?php
include('connect.php');
session_start();
if (isset($_GET['id']))

$requete = "SELECT * from topic where id_topic = " . $_GET['id']."";
$exec_requete = mysqli_query($db, $requete);
$reponse = mysqli_fetch_array($exec_requete);
        
        echo'<div class="">
       <span> Message : ' . $reponse["message"] . '</span>
       </div>';


?>


</br></br>

<?php
$requete1="Select id_commentaire, date, contenue,pseudo_user, id_user,id_topic from commentaire where id_topic=".$_GET['id']."";
$exec_requete1 = mysqli_query($db,$requete1) or die("Foobar");

while($row = mysqli_fetch_assoc($exec_requete1)){
    echo'<div class="">
    <span> Pseudo : ' . $row["pseudo_user"] . '</span><br>
    <span> Commentaire : </br>' . $row["contenue"] . '</span><br>
    </div>';

    if($row["id_user"] == $_SESSION['id_user']){
    ?>
<br>
    <a href="supp_com.php?id=<?php echo $row["id_commentaire"]  ?>&id_topic=<?php echo $row["id_topic"]  ?>" style="border: solid 1px gray; border-radius:10px; text-decoration:none; padding:3px; background-color:gray;color:black" >Suprimer</a>


<?php
}
echo '</br></br></br>';
}

?>

<?php
include('commentaire.php')
?>

</html>
