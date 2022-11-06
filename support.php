

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Style.css">
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
            include('connect.php');
            if($_SESSION['role'] == "admin"){
                $requete= "select id_user,pseudo from user";
                $exec_requete = mysqli_query($db,$requete);

                while($row = mysqli_fetch_assoc($exec_requete)){
                    echo '<tr><td>'.$row['pseudo'].'</td><td><a href="bannir.php?id='.$row['id_user'].'">Bannir</a></td></tr>';
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

<script>

    window.onscroll = function(ev) {
            if (window.scrollY > 100) {
                document.getElementById("navbar").style.background = "black";
                document.getElementById("scrollUp").style.right = "10px";
                
                var li = document.querySelectorAll(".nav-links li #navlinks");
    
                for(var i = 0; li[i]; i++){       
                li[i].style.color = "white";
                }
    
            }
            else{
                document.getElementById("navbar").style.background = "none";
                document.getElementById("scrollUp").style.right = "-100px";
                var li = document.querySelectorAll(".nav-links li #navlinks");
    
                for(var i = 0; li[i]; i++){       
                li[i].style.color = "black";
                }
            }
    };
    
</script>