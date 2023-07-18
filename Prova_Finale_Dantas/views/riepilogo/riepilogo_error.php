<?php
require "../../config.php";
session_start();
$cod_operazione = $_SESSION['COD_OPERAZIONE'];

$cod_visitatore = $_SESSION['COD_VISITATORE'];

$id_mostra = $_SESSION['id_mostra'];


if (!isset($_SESSION['COD_VISITATORE'])) {
    echo '<script>alert("Fai prima il login!");
            window.location.href = "http://localhost/Prova_Finale_Dantas/views/login/login.php";
        </script>';
    exit();
} else if (isset($_SESSION['COD_VISITATORE'])) {
    $cod_visitatore = $_SESSION['COD_VISITATORE'];

    var_dump($cod_visitatore);
    var_dump($id_mostra);
    var_dump($cod_operazione);

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



                <div class="main__container">
                    <div class="main__img--container">
                        <div class="main__img--card" id="card-2">
                            <?php $data = $pdo->query("SELECT v.cognome, v.nome, b.tipo_pagamento, b.quantita, b.data, b.fascia_oraria, b.cod_operazione, m.titolo, s.nome
                    FROM biglietti AS b
                    JOIN visitatori AS v ON v.cod_visitatore=b.cod_visitatore
            JOIN mostre AS m ON m.cod_mostra=b.cod_mostra
            JOIN sedi AS s ON s.cod_sede=m.cod_sede
                    WHERE b.COD_VISITATORE = '$cod_visitatore' AND b.COD_MOSTRA = '$id_mostra'")->fetchAll(); ?>

                            <?php foreach ($data as $row) : ?>
                                <h6 class="hero__heading hr2"> <span><?php echo $row['v.nome']; ?> <?php echo $row['v.COGNOME']; ?>,</span></h6>


                                <div class="label" id="titolo" name="TITOLO"><?php echo $row['m.TITOLO'] ?></div>



                                <div class="label" id="data" name="DATA"><?php echo $row['b.DATA'] ?></div>
                                <label> Fascia oraria scelta: </label>
                                <div class="label" id="fascia_oraria" name="FASCIA_ORARIA"><?php echo $row['b.FASCIA_ORARIA'] ?></div>
                                <br>
                                <label> Tipo di pagamento: </label>
                                <div class="label" id="tipo_pagamento" name="TIPO_PAGAMENTO"><?php echo $row['b.TIPO_PAGAMENTO'] ?></div>
                                <br>
                                <br>

                                <label> Quantità di biglietti prenotati: </label>
                                <div class="label" id="qta" name="QUANTITA"><?php echo $row['QUANTITA'] ?></div>


                            <?php endforeach; ?>


                        </div>
                    </div>
                </div>

                <div class="main__content">
                    <button type="submit" class="main__btn"><span> Conferma</span></button>
                </div>
            </div>
        </div>

    </form>
<?php include('../footer.php');
} ?>