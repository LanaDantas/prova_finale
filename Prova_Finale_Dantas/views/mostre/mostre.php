<?php
require "../../config.php";
session_start();
$_SESSION['COD_VISITATORE'];
if (isset($_SESSION['COD_VISITATORE'])) {
    $cod_visitatore = $_SESSION['COD_VISITATORE'];
  }

$id_sede = $_GET['id_sede'];
$_SESSION['id_sede'] = $id_sede;
/* print_r($id_sede); */

?>

<?php require "../header.php"; ?>

<!-- Spettacoli Section -->
<form action="" method="post">
    <?php $data = $pdo->query("SELECT m.*, s.NOME
                                    FROM mostre as m
                                    INNER JOIN sedi as s
                                    ON m.COD_SEDE = s.COD_SEDE
                                    WHERE s.COD_SEDE = '$id_sede'")->fetchAll(); ?>

    <div class="services" id="services">
        <?php $result = $pdo->query("SELECT * FROM sedi WHERE COD_SEDE = '$id_sede'")->fetchAll(); ?>
        <?php foreach ($result as $row) : ?>
            <h1>Mostre del <?php echo $row['NOME']; ?></h1>
        <?php endforeach; ?>
        <div class="services__wrapper">
            <?php foreach ($data as $row) : ?>
                <div class="services__card">
                    <h2><?php echo $row['TITOLO']; ?></h2>
                    <p>In esibizione dal: <?php echo $row['DATA_INIZIO'] ?></p>
                    <p>al: <?php echo $row['DATA_FINE'] ?></p>
                    <br>
                    <br>
                    <p>Prezzo: <?php echo $row['PREZZO'] ?> €</p>
                    <div class="services__btn"><a href="../prenotazioni/prenotazioni.php?id_mostra=<?php echo $row['COD_MOSTRA'] ?>">Prenota biglietto</a></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</form>

<?php include('../footer.php'); ?>