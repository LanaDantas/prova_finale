<?php


$cssPaths = [
    "../../assets/css/homepage.css",
    "https://use.fontawesome.com/releases/v5.14.0/css/all.css",
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
];

$jsPaths = [
    "../../assets/js/homepage.js",
    "../../assets/js/prenotazioni.js"
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Homepage </title>

    <?php foreach ($cssPaths as $cssPath) : ?>
        <link rel="stylesheet" href="<?php echo $cssPath; ?>">
    <?php endforeach; ?>
    <?php foreach ($jsPaths as $jsPath) : ?>
        <script src="<?php echo $jsPath; ?>" defer></script>
    <?php endforeach; ?>

</head>

<body>


    <!-- Navbar Section -->
    <nav class="navbar">
        <div class="navbar__container">
            <a href="http://localhost/Prova_Finale_Dantas/views/homepage/homepage.php" id="navbar__logo">
                <i class="fa-solid fa-building-columns"></i>
            </a>
            <div class="navbar__toggle" id="mobile-menu">
                <span class="bar"></span> <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="navbar__menu">
                <li class="navbar__item">
                    <a href="http://localhost/Prova_Finale_Dantas/views/homepage/homepage.php#ducale" class="navbar__links" id="ducale-page">Palazzo Ducale</a>
                </li>
                <li class="navbar__item">
                    <a href="http://localhost/Prova_Finale_Dantas/views/homepage/homepage.php#diamanti" class="navbar__links" id="diamanti-page">Palazzo dei Diamanti</a>
                </li>
                <li class="navbar__item">
                    <a href="http://localhost/Prova_Finale_Dantas/views/homepage/homepage.php#museofori" class="navbar__links" id="museofori-page">Museo dei Fori Imperiali</a>
                </li>
                <li class="navbar__item">
                    <a href="http://localhost/Prova_Finale_Dantas/views/homepage/homepage.php#mao" class="navbar__links" id="mao-page">MAO</a>
                </li>
                <li class="navbar__item">
                    <a href="http://localhost/Prova_Finale_Dantas/views/homepage/homepage.php#gam" class="navbar__links" id="gam-page">GAM</a>
                </li>
                <li class="navbar__item">
                    <a href="http://localhost/Prova_Finale_Dantas/views/prenotazioni/prenotazioni.php" class="navbar__links" id="prenotazioni-page">
                        <i class="fa-brands fa-opencart"></i>
                    </a>
                </li>

                <?php
                if (!isset($_SESSION['COD_VISITATORE'])) { ?>
                    <li class="navbar__btn">
                        <a href="http://localhost/Prova_Finale_Dantas/views/login/login.php#login" class="button" id="signup">Accedi</a>
                    </li>
                <?php } ?>
                <?php
                if (isset($_SESSION['COD_VISITATORE'])) { ?>
                    <li class="navbar__btn">
                        <a href="http://localhost/Prova_Finale_Dantas/views/login/logout.php" class="button" id="signup">Logout</a>
                    </li>
                <?php } ?>
                
            </ul>
        </div>
    </nav>