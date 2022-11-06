<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Foodtogo</title>

</head>
<body>
    <form action="test.php" method="POST">
        <table class="table-forum">
            <tr class="header">
                <th class="main">Nouveau Sujet</th>
                <th></th>
            </tr>
            <tr>
                <td>Sujet</td>
                <td><input type="text" name="title" size="70" maxlength="70"required/></td>
            </tr>
           <tr>
               <td><textarea name="message" cols="50" rows="10" required></textarea></td>
           </tr>
             <td><input type="submit" name="go" value="Poster"></td>
        </table>
    </form>
</body>





<?php
echo 'tout cour<br>';
        if (isset($_POST['title']) && isset($_POST['message'])) {//si la verif est ok
            $title = $_POST['title'];
            $message = $_POST['message'];
            echo $title.'<br>'.$message;
            /*
            $query = "INSERT INTO post (sujet, auteur, description) VALUES 
             ('" . $title . "', '" . $username . "', '" . $message . "')";
            $exec_query = mysqli_query($db, $query);
            $resultat = mysqli_fetch_array($exec_query);
            if ($resultat) {//si les données du form sont ok, on ajoute le message et on redirige vers la liste
                header('Location: index.php');
            } else if (!$resultat){//sinon on affiche un message d'erreur
                echo '<p>Erreur</p>';
            }
            */
        }else{echo 'marche pas';} //header('Location: index.php');

?>