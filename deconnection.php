<?php
    if(isset($_GET['dec'])){
        $dec = $_GET['dec'];
        if($dec==1){
            session_start();
            $_SESSION['id_user'] = "";
            $_SESSION['pseudo'] = "";
            $_SESSION = array();
            
            session_destroy(); 
            echo "<p style='color:green'>Vous etez deconnecter</p>";
            header('Location: actualite.php');
        }
    }
?>