<?php
require "../config.php";
session_start();


$cod_visitatore = $_SESSION['COD_VISITATORE'];

$id_mostra = $_SESSION['id_mostra'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $cod_visitatore = $_POST['COD_VISITATORE'];
    $fascia_oraria = $_POST['FASCIA_ORARIA'];
    $data = $_POST['DATA'];
    $tipo_pagamento = $_POST['TIPO_PAGAMENTO'];
    $quantita = $_POST['QUANTITA'];
    $cod_mostra = $_POST['COD_MOSTRA'];

    try {
        $query_mostra = "SELECT DATA_INIZIO, DATA_FINE FROM mostre WHERE COD_MOSTRA = :cod_mostra";
        $stmt_mostra = $pdo->prepare($query_mostra);
        $stmt_mostra->bindParam(':cod_mostra', $cod_mostra);
        $stmt_mostra->execute();
        $row_mostra = $stmt_mostra->fetch(PDO::FETCH_ASSOC);
        $data_inizio = $row_mostra['DATA_INIZIO'];
        $data_fine = $row_mostra['DATA_FINE'];

        if ($data < $data_inizio || $data > $data_fine) {
            echo '<script>alert("La data selezionata non è valida per la mostra.");</script>';
            echo '<script>window.location.href = "http://localhost/Prova_Finale_Dantas/views/homepage/homepage.php"; </script>';
        } else {

            $query_capacita = "SELECT sedi.CAPIENZA FROM sedi INNER JOIN mostre ON sedi.COD_SEDE = mostre.COD_SEDE WHERE mostre.COD_MOSTRA = :COD_MOSTRA";
            $stmt_capacita = $pdo->prepare($query_capacita);
            $stmt_capacita->bindParam(':COD_MOSTRA', $cod_mostra);
            $stmt_capacita->execute();
            $capacita = $stmt_capacita->fetchColumn();

            if ($quantita > $capacita) {
                echo '<script>alert("La quantità selezionata supera la capacità della sede.");</script>';
                echo '<script>window.location.href = "http://localhost/Prova_Finale_Dantas/views/homepage/homepage.php"; </script>';
                exit();
            } else {
                $query_insert = "INSERT INTO biglietti (COD_VISITATORE, FASCIA_ORARIA, DATA, TIPO_PAGAMENTO, QUANTITA, COD_MOSTRA) VALUES (:COD_VISITATORE, :FASCIA_ORARIA, :DATA, :TIPO_PAGAMENTO, :QUANTITA, :COD_MOSTRA)";
                $stmt_insert = $pdo->prepare($query_insert);
                $stmt_insert->bindParam(':COD_VISITATORE', $cod_visitatore);
                $stmt_insert->bindParam(':FASCIA_ORARIA', $fascia_oraria);
                $stmt_insert->bindParam(':DATA', $data);
                $stmt_insert->bindParam(':TIPO_PAGAMENTO', $tipo_pagamento);
                $stmt_insert->bindParam(':QUANTITA', $quantita);
                $stmt_insert->bindParam(':COD_MOSTRA', $cod_mostra);
                $stmt_insert->execute();

                // // Esegui l'aggiornamento della colonna CAPIENZA nella tabella "sedi"
                // $query_update = "UPDATE sedi SET CAPIENZA = CAPIENZA - :QUANTITA WHERE COD_SEDE = (SELECT COD_SEDE FROM mostre WHERE COD_MOSTRA = :cod_mostra) AND CAPIENZA >= :quantita";
                // $stmt_update = $pdo->prepare($query_update);
                // $stmt_update->bindParam(':QUANTITA', $quantita);
                // $stmt_update->bindParam(':COD_MOSTRA', $cod_mostra);
                // $stmt_update->execute();

                if ($stmt_insert->rowCount() > 0) {
                    $row = $stmt_insert->fetch(PDO::FETCH_ASSOC);
                    header('Location: http://localhost/Prova_Finale_Dantas/views/riepilogo/riepilogo.php?success=1');
                    exit();
                } else {
                    header('Location: http://localhost/Prova_Finale_Dantas/views/homepage/homepage.php');
                    exit();
                }
            }
        }
    } catch (PDOException $e) {
        echo "Errore: " . $e->getMessage();
        var_dump($e);
    }

    if (isset($_SESSION['COD_OPERAZIONE'])) {
        $cod_operazione = $_SESSION['COD_OPERAZIONE'];
      }
$_SESSION['COD_OPERAZIONE'] = $cod_operazione;

}
