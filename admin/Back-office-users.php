<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="ico" href="../img/favicon.ico"/>

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
            <h1>Gestion des utilisateurs</h1>
            <div class="container-publication">
                <table cellspacing="0" cellpadding="3">
                    <tbody>
                        <?php
                        session_start();
                        include('../Fonction-php&JS/connect.php');
                        if ($_SESSION['role'] == "admin") {
                            $requete = "select id_user,pseudo from user";
                            $exec_requete = mysqli_query($db, $requete);

                            while ($row = mysqli_fetch_assoc($exec_requete)) {
                            
                        ?>
                        <tr>
                            <td><?php echo $row['pseudo'] ?></td>
                            <td><?php echo '<a href="../Fonction-php&JS/bannir.php?id=' . $row['id_user'] . '">Bannir</a>' ?></td>
                        </tr>
                        
                        <?php
                        };
                    };
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