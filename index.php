<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>League Dump</title>
    <?php include('head.php') ?>
</head>

<body>
    <?php include('header.php'); ?>
    <div class="bandeau-accueil">
        <div class="container-bandeau">
            <p>Bienvenue sur League Dump !</p>
        </div>
    </div>

    <div class="presentation-accueil">
        <div class="titre-accueil">
            <h1>Présentation</h1>
        </div>
        <div class="block-question">
            <div class="question">
                <div class="titre-question">
                    <h2>Qu'est-ce que League Dump ?</h2>
                </div>
                <div class="content-question">
                    <p> League Dump est un espace de discussion centré sur l'univers de League of Legend.</p>
                    <br>
                    <p><b>Notre objectif ?</b> Vous laissez parler de votre jeu favoris sans aucune censure de la part
                        de Riot Games</p>
                </div>
            </div>
            <div class="question">
                <div class="titre-question">
                    <h2>Mais qui est derrière tous ça ?</h2>
                </div>
                <div class="content-question">
                    <p>Thierry : Développeur back-end/integrateur </p>
                    <p>Erwan : Développeur full stack </p>
                    <p>Florian : Développeur front-end </p>
                </div>
            </div>
            <div class="question">
                <div class="titre-question">
                    <h2>Pourquoi ce projet ?</h2>
                </div>
                <div class="content-question">
                    <p> Aucune idée, on trouve ça drôle.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bandeau-footer">
        <a aria-label='Inscription' class='h-button' data-text='Rejoins nous !' href='inscription.php'>
            <span>I</span>
            <span>n</span>
            <span>s</span>
            <span>c</span>
            <span>r</span>
            <span>i</span>
            <span>t</span>
            <span>i</span>
            <span>o</span>
            <span>n</span>
        </a>
    </div>
    <footer><?php include('footer.php'); ?></footer>
</body>

</html>