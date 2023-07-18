<?php
 require "../../config.php";
session_start();

if (isset($_SESSION['COD_VISITATORE'])) {
  $cod_visitatore = $_SESSION['COD_VISITATORE'];
}
// var_dump($cod_visitatore);

?>

<?php require "../header.php";

?>


<!-- Hero Section -->
<div class="hero" id="home">
  <div class="hero__container">
    <h1 class="hero__heading"> <span>MOSTRE</span> ON LINE</h1>
    <p class="hero__description">L'arte non consiste nel rappresentare cose nuove, bensì nel rappresentare con novità.
    <h6>UGO FOSCOLO</h6></p>
  </div>
</div>

<!-- Regio Section -->
<?php $data = $pdo->query("SELECT * FROM sedi WHERE COD_SEDE = 'S000'")->fetchAll(); ?>
<?php foreach ($data as $row) : ?>
  <div class="main" id="ducale" name="COD_SEDE" value="S000">
    <div class="main__container">
      <div class="main__img--container">
        <div class="main__img--card">
          <img class="sede_1" src="../../assets/images/palazzoducale.jpg">
        </div>
      </div>
      <div class="main__content">
        <h1 name="NOME">
          <?php echo $row['NOME'] ?> <a onclick="toggleText()" class="icona_info"><i class="fa-solid fa-info" style="color: #ffffff;"></a></i>
        </h1>
        <div id="info_sede" style="display: none;" class="info__sede">
          <ul>
            <li class="indirizzo">Indirizzo: <span><?php echo $row['INDIRIZZO'] ?></span></li>
            <li class="citta_provoincia">Città/Provincia: <span><?php echo $row['CITTA'] ?>, <?php echo $row['PROVINCIA'] ?> </span></li>
            <li class="telefono">Tel.: <span><?php echo $row['TELEFONO'] ?> </span></li>
            <li class="capienza">Capienza: <span><?php echo $row['CAPIENZA'] ?> </span></li>
          </ul>
        </div>
        <h4>Prenota subito il tuo biglietto</h4>
        <p>Stagione d'opera e balletto, concerti, altre attività e servizi di uno dei più grandi teatri d'Europa.</p>
        <a href="../mostre/mostre.php?id_sede=<?php echo $row['COD_SEDE'] ?>"><button class="main__btn"><span>GUARDA LE MOSTRE</span></button></a>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- Palazzo dei Diamanti Section -->
<?php $data = $pdo->query("SELECT * FROM sedi WHERE COD_SEDE = 'S001'")->fetchAll(); ?>
<?php foreach ($data as $row) : ?>
  <div class="main" id="diamanti">
    <div class="main__container">
      <div class="main__img--container">
        <div class="main__img--card">
          <img class="sede_1" src="../../assets/images/palazzodiamanti.jpg">
        </div>
      </div>
      <div class="main__content">
        <h1><?php echo $row['NOME'] ?> <a onclick="toggleText2()" class="icona_info">
            <i class="fa-solid fa-info" style="color: #ffffff;"></i></a>
        </h1>
        <div id="info_sede2" style="display: none;" class="info__sede">
          <ul>
            <li class="indirizzo">Indirizzo: <span><?php echo $row['INDIRIZZO'] ?></span></li>
            <li class="citta_provoincia">Città/Provincia: <span><?php echo $row['CITTA'] ?>, <?php echo $row['PROVINCIA'] ?> </span></li>
            <li class="telefono">Tel.: <span><?php echo $row['TELEFONO'] ?> </span></li>
            <li class="capienza">Capienza: <span><?php echo $row['CAPIENZA'] ?> </span></li>
          </ul>
        </div>
        <h2>Prenota subito il tuo biglietto</h2>
        <p>Schedule a call to learn more about our services</p>
        <a href="../mostre/mostre.php?id_sede=<?php echo $row['COD_SEDE'] ?>"><button class="main__btn"><span>GUARDA LE MOSTRE</span></button></a>
      </div>
    </div>
  </div>
<?php endforeach; ?>


<!-- Museo dei Fori Imperiali Section -->
<?php $data = $pdo->query("SELECT * FROM sedi WHERE COD_SEDE = 'S002'")->fetchAll(); ?>
<?php foreach ($data as $row) : ?>
  <div class="main" id="museofori">
    <div class="main__container">
      <div class="main__img--container">
        <div class="main__img--card">
          <img class="sede_1" src="../../assets/images/museodeifori.jpg">
        </div>
      </div>
      <div class="main__content">
        <h1>
          <?php echo $row['NOME'] ?> <a onclick="toggleText3()" class="icona_info">
            <i class="fa-solid fa-info" style="color: #ffffff;"></i></a>
        </h1>
        <div id="info_sede3" style="display: none;" class="info__sede">
          <ul>
            <li class="indirizzo">Indirizzo: <span><?php echo $row['INDIRIZZO'] ?></span></li>
            <li class="citta_provoincia">Città/Provincia: <span><?php echo $row['CITTA'] ?>, <?php echo $row['PROVINCIA'] ?> </span></li>
            <li class="telefono">Tel.: <span><?php echo $row['TELEFONO'] ?> </span></li>
            <li class="capienza">Capienza: <span><?php echo $row['CAPIENZA'] ?> </span></li>
          </ul>
        </div>
        <h2>Prenota subito il tuo biglietto</h2>
        <p>Schedule a call to learn more about our services</p>
        <a href="../mostre/mostre.php?id_sede=<?php echo $row['COD_SEDE'] ?>"><button class="main__btn"><span>GUARDA LE MOSTRE</span></button></a>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- GAM Section -->
<?php $data = $pdo->query("SELECT * FROM sedi WHERE COD_SEDE = 'S003'")->fetchAll(); ?>
<?php foreach ($data as $row) : ?>
  <div class="main" id="mao">
    <div class="main__container">
      <div class="main__img--container">
        <div class="main__img--card">
          <img class="sede_1" src="../../assets/images/mao.png">
        </div>
      </div>
      <div class="main__content">
        <h1>
          <?php echo $row['NOME'] ?> <a onclick="toggleText4()" class="icona_info">
            <i class="fa-solid fa-info" style="color: #ffffff;"></i></a>
        </h1>
        <div id="info_sede4" style="display: none;" class="info__sede">
          <ul>
            <li class="indirizzo">Indirizzo: <span><?php echo $row['INDIRIZZO'] ?></span></li>
            <li class="citta_provoincia">Città/Provincia: <span><?php echo $row['CITTA'] ?>, <?php echo $row['PROVINCIA'] ?> </span></li>
            <li class="telefono">Tel.: <span><?php echo $row['TELEFONO'] ?> </span></li>
            <li class="capienza">Capienza: <span><?php echo $row['CAPIENZA'] ?> </span></li>
          </ul>
        </div>
        <h2>Prenota subito il tuo biglietto</h2>
        <p>Schedule a call to learn more about our services</p>
        <a href="../mostre/mostre.php?id_sede=<?php echo $row['COD_SEDE'] ?>"><button class="main__btn"><span>GUARDA LE MOSTRE</span></button></a>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- GAM Section -->
<?php $data = $pdo->query("SELECT * FROM sedi WHERE COD_SEDE = 'S004'")->fetchAll(); ?>
<?php foreach ($data as $row) : ?>
  <div class="main" id="gam">
    <div class="main__container">
      <div class="main__img--container">
        <div class="main__img--card">
          <img class="sede_1" src="../../assets/images/gam.jpg">
        </div>
      </div>
      <div class="main__content">
        <h1>
          <?php echo $row['NOME'] ?> <a onclick="toggleText5()" class="icona_info">
            <i class="fa-solid fa-info" style="color: #ffffff;"></i></a>
        </h1>
        <div id="info_sede5" style="display: none;" class="info__sede">
          <ul>
            <li class="indirizzo">Indirizzo: <span><?php echo $row['INDIRIZZO'] ?></span></li>
            <li class="citta_provoincia">Città/Provincia: <span><?php echo $row['CITTA'] ?>, <?php echo $row['PROVINCIA'] ?> </span></li>
            <li class="telefono">Tel.: <span><?php echo $row['TELEFONO'] ?> </span></li>
            <li class="capienza">Capienza: <span><?php echo $row['CAPIENZA'] ?> </span></li>
          </ul>
        </div>
        <h2>Prenota il tuo biglietto</h2>
        <p>Schedule a call to learn more about our services</p>
        <a href="../mostre/mostre.php?id_sede=<?php echo $row['COD_SEDE'] ?>"><button class="main__btn"><span>GUARDA LE MOSTRE</span></button>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- Features Section -->
<!-- <div class="main" id="sign-up">
  <div class="main__container">
    <div class="main__content">
      <h1>Per acquistare i biglietti</h1>
      <h2>Fai il login</h2>
      <p>Ci vuole solo un minuto!</p>
      <button class="main__btn"><a href="http://localhost/Prova_Finale_Dantas/views/login/login.php">Accedi</a></button>
    </div>
    <div class="main__img--container">
      <div class="main__img--card" id="card-2">
        <i class="fas fa-users"></i>
      </div>
    </div>
  </div>
</div> -->

<?php include('../footer.php'); ?>