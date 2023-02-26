<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/discussion.css">
    <title>League Dump</title>
</head>

<body>
    <img class="fond" alt="fond" src="../img/noxus_splash.jpg" />
    <!-- Side navigation -->
    <div class="sidenav">
        <div class="Logo-side">
            <a href="../index.php">
                <img src="../img/Logo.png" alt="" width="100" height="80">
            </a>
        </div>
        <div class="link-nav">
            <a class="nav-links" href="../index.php">Accueil</a>
            <a class="nav-links" href="Back-office-users.php">Gestion des users</a>
            <a class="nav-links" href="Back-office-postes.php">Gestion des postes</a>
        </div>
    </div>

    <!--SIDENAV RESPONSIVE -->
    <div id="mySidenav" class="responsive-sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="link-nav">
            <a class="nav-links" href="../index.php">Accueil</a>
            <a class="nav-links" href="Back-office-users.php">Gestion des users</a>
            <a class="nav-links" href="Back-office-postes.php">Gestion des postes</a>
        </div>
    </div>

    <!-- Use any element to open the sidenav -->
    <span class="responsive-sidenav-open" onclick="openNav()">☰</span>

    <!-- Page content -->
    <div class="main">
        <div class="container-discussion">
            <h1>Gestion des postes</h1>
            <div class="container-publication">
                <table cellspacing="0" cellpadding="0">
                    <tbody>
                    <?php
                    include('../Fonction-php&JS/connect.php');

                    $requete = "SELECT count(*) from topic";
                    $exec_requete = mysqli_query($db, $requete);
                    $reponse = mysqli_fetch_array($exec_requete);
                    $count = $reponse['count(*)'];

                    if($count!=0){

                            $requete2='Select id_topic, titre, message,DATE_FORMAT(date_publication, "%d/%m/%Y") AS date, id_user,DATE_FORMAT(TIMEDIFF( NOW(), date_publication ), "%H:%i")AS Time from topic Order By date_publication DESC';
                            $exec_requete2 = mysqli_query($db,$requete2);

                        while($row = mysqli_fetch_assoc($exec_requete2)){

                            $requete3 = "SELECT pseudo from user where id_user =".$row["id_user"];
                            $exec_requete3 = mysqli_query($db, $requete3);
                            $reponse3 = mysqli_fetch_array($exec_requete3);

                        ?>
                        <tr>
                            <td><?php echo $row['date'] ?></td>
                            <td><?php echo $row['titre'] ?></td>
                            <td><?php echo $reponse3['pseudo'] ?></td>
                            <td><?php echo "<br><a href='../Fonction-php&JS/suprimer_topic.php?id=" . $row["id_topic"] . "' class='button'>suprimer topic</a>"; ?></td>
                        </tr>
                        <?php
                        }}
                        ?>
                        
                    </tbody>
                </table>
            </div>
            <br>
        </div>
    </div>
</body>

</html>

<script>
    /* Open the sidenav */
function openNav() {
  document.getElementById("mySidenav").style.width = "100%";
}

/* Close/hide the sidenav */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>