

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include('head.php') ?>
    <title>Accueil</title>
</head>

<body>
    <!--<div class="cursor"></div> -->
    <img class="fond" src="img/background-LOL.jpg"/>
        <?php include("header.php");?>
    <br>
    <div class="container-fill">
    <table cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th colspan="2">Tous les utilisateurs</th>
            </tr>
        </thead>
        <tbody>
        <?php
            include('Fonction-php&JS/connect.php');
            if($_SESSION['role'] == "admin"){
                $requete= "select id_user,pseudo from user";
                $exec_requete = mysqli_query($db,$requete);

                while($row = mysqli_fetch_assoc($exec_requete)){
                    echo '<tr><td>'.$row['pseudo'].'</td><td><a href="Fonction-php&JS/bannir.php?id='.$row['id_user'].'">Bannir</a></td></tr>';
                };
            };

        ?>
        </tbody>
    </table>


    </div>
    <a href="#top">
        <div id="scrollUp">
        </div>
    </a>
</body>

</html>

<?php include('Fonction-php&JS/scroll.php') ?>