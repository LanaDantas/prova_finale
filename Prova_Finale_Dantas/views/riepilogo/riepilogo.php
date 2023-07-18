<?php
require "../../config.php";
session_start();

$cod_visitatore = $_SESSION['COD_VISITATORE'];

$id_mostra = $_SESSION['id_mostra'];


if (!isset($_SESSION['COD_VISITATORE'])) {
    echo '<script>alert("Fai prima il login!");
            window.location.href = "http://localhost/Prova_Finale_Dantas/views/login/login.php";
        </script>';
    exit();
} else if (isset($_SESSION['COD_VISITATORE'])) {
    $cod_visitatore = $_SESSION['COD_VISITATORE'];

    // var_dump($cod_visitatore);
    // var_dump($id_mostra);
    // var_dump($cod_operazione);

?>
    <?php require "../header.php"; ?>

    <form action="../../controllers/Biglietto.php" method="post">

        <div class="riepilogo_log">
            <!-- Hero Section -->
            <div class="hero__container">
                <p class="hero__description">IL TUO BIGLIETTO</p>

                <?php
                if (isset($_GET['success'])) {
                    $success = $_GET['success'];
                    if ($success == 1) {
                        echo '<div class="success_biglietto">Prenotazione effetuata con sucesso!</div>';
                    }
                }
                ?>

                <div class="main__container m1">
                    <div class="main__img--container">
                        <div class="main__img--card" id="card-2">
                            <?php $data = $pdo->query("SELECT * FROM visitatori WHERE COD_VISITATORE = '$cod_visitatore'")->fetchAll(); ?>
                            <?php foreach ($data as $row) : ?>
                                <label>Riepilogo biglietto di: </label>

                                <h6 class="hero__heading hr2 hr3"> <span><?php echo $row['NOME']; ?> <?php echo $row['COGNOME']; ?>,</span></h6>
                            <?php endforeach; ?>


                            <?php $data = $pdo->query("SELECT * FROM mostre WHERE COD_MOSTRA = '$id_mostra'")->fetchAll(); ?>
                            <?php foreach ($data as $row) : ?>
                                <label> Titolo opera: </label>
                                <div class="label2" id="titolo" name="TITOLO"><?php echo $row['TITOLO'] ?></div>
                            <?php endforeach; ?>
                            <br>
                            <?php $data = $pdo->query("SELECT NOME FROM MOSTRE INNER JOIN sedi on sedi.COD_SEDE = mostre.COD_SEDE WHERE COD_MOSTRA = '$id_mostra'")->fetchAll(); ?>
                            <?php foreach ($data as $row) : ?>
                                <label> Sede: </label>
                                <div class="label2" id="nome" name="NOME"><?php echo $row['NOME'] ?></div>
                            <?php endforeach; ?>
                            <br>
                            <br>
                            <?php $data = $pdo->query("SELECT * FROM biglietti WHERE COD_MOSTRA = '$id_mostra' AND COD_VISITATORE = '$cod_visitatore'")->fetchAll(); ?>
                            <?php foreach ($data as $row) : ?>

                                <label> Data prenotazione: </label>
                                <div class="label2" id="data" name="DATA"><?php echo $row['DATA'] ?></div>
                                <label> Fascia oraria scelta: </label>
                                <div class="label2" id="fascia_oraria" name="FASCIA_ORARIA"><?php echo $row['FASCIA_ORARIA'] ?></div>
                                <br>
                                <label> Tipo di pagamento: </label>
                                <div class="label2" id="tipo_pagamento" name="TIPO_PAGAMENTO"><?php echo $row['TIPO_PAGAMENTO'] ?></div>
                                <br>
                                <br>

                                <label> Quantità di biglietti prenotati: </label>
                                <div class="label2" id="qta" name="QUANTITA"><?php echo $row['QUANTITA'] ?></div>

                            <?php endforeach; ?>



                        </div>
                    </div>
                </div>

                <div class="main__content btn_riepilogo">
                    <a href="http://localhost/Prova_Finale_Dantas/views/homepage/homepage.php" class="main__btn"><span> Torna alle mostre</span></a>
                </div>
            </div>
        </div>

    </form>
<?php include('../footer.php');
} ?>