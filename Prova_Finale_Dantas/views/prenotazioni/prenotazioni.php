<?php
require "../../config.php";
session_start();
$_SESSION['cod_visitatore'];

$id_mostra = $_GET['id_mostra'];
$_SESSION['id_mostra'] =  $id_mostra;

$cod_visitatore = $_SESSION['COD_VISITATORE'];

/* var_dump($cod_visitatore);
var_dump($id_mostra); */


if (!isset($_SESSION['COD_VISITATORE'])) {
    echo '<script>alert("Fai prima il login!");
            window.location.href = "http://localhost/Prova_Finale_Dantas/views/login/login.php";
        </script>';
    exit();
} else if (isset($_SESSION['COD_VISITATORE'])) {
    $cod_visitatore = $_SESSION['COD_VISITATORE'];

?>
    <?php require "../header.php"; ?>

    <form action="../../controllers/Biglietto.php" method="post">

        <div class="riepilogo_log">
            <!-- Hero Section -->
            <div class="hero__container">
                <p class="hero__description">RIEPILOGO DELLE PRENOTAZIONI</p>

                <?php
                if (isset($_GET['success'])) {
                    $success = $_GET['success'];
                    if ($success == 1) {
                        echo '<div class="success_biglietto">Prenotazione effetuata con sucesso!</div>';
                    }
                }
                ?>

                <?php $data = $pdo->query("SELECT * FROM visitatori WHERE COD_VISITATORE = '$cod_visitatore'")->fetchAll(); ?>
                <?php foreach ($data as $row) : ?>
                    <h1 class="hero__heading hr2"> Benvenuto/a <span><?php echo $row['NOME']; ?>,</span></h1>
                <?php endforeach; ?>
                <div class="main__container">
                    <div class="main__img--container">
                        <div class="main__img--card" id="card-2">

                            <?php $data = $pdo->query("SELECT * FROM mostre WHERE COD_MOSTRA = '$id_mostra'")->fetchAll(); ?>
                            <?php foreach ($data as $row) : ?>
                                <p class="hero__description hero2"> Prenotazione della mostra:<br> <span><?php echo $row['TITOLO']; ?></p>
                            <?php endforeach; ?>

                            <?php $data = $pdo->query("SELECT * FROM visitatori WHERE COD_VISITATORE = '$cod_visitatore'")->fetchAll(); ?>
                            <?php foreach ($data as $row) : ?>
                                <input type="hidden" name="COD_VISITATORE" value="<?php echo $row['COD_VISITATORE'] ?>">
                            <?php endforeach; ?>

                            <label for="data">Scegli una data</label>
                            <input type="date" name="DATA" id="data">

                            <select id="fascia_oraria" name="FASCIA_ORARIA" data-selected="">
                                <option value="" selected="selected" disabled="disabled">Scegli una fascia oraria</option>
                                <option value="1">10.00 - 12.00</option>
                                <option value="2">12.00 - 14.00</option>
                                <option value="3">14.00 - 16.00</option>
                                <option value="4">16.00 - 18.00</option>
                                <option value="5">18.00 - 20.00</option>
                            </select>

                            <select id="selectbox" data-selected="" name="TIPO_PAGAMENTO">
                                <option value="" selected="selected" disabled="disabled">Scegli metodo di pagamento</option>
                                <option value="CARTA">Carta</option>
                                <option value="BONIFICO">Bonifico</option>
                                <option value="PAYPAL">PayPal</option>
                            </select>


                            <label for="QUANTITA">N° Biglietti</label>
                            <input type="number" name="QUANTITA" id="QUANTITA">

                            <?php $data = $pdo->query("SELECT * FROM mostre WHERE COD_MOSTRA = '$id_mostra'")->fetchAll(); ?>
                            <?php foreach ($data as $row) : ?>
                                <input type="hidden" name="COD_MOSTRA" value="<?php echo $row['COD_MOSTRA'] ?>">
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