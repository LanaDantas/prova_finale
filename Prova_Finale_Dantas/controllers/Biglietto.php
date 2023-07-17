<?php
require "../config.php";
session_start();
$_SESSION['id_mostra'] =  $id_mostra;

//prima di ogni pagina verifico se utente è loggato
/* if (!isset($_SESSION['COD_VISITATORE'])) {
    header('Location: ../index.php');
    exit;
} else {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            $cod_visitatore = $_POST['COD_VISITATORE'];
            $fascia_oraria = $_POST['FASCIA_ORARIA'];
            $data = $_POST['DATA'];
            $tipo_pagamento = $_POST['TIPO_PAGAMENTO'];
            $quantita = $_POST['QUANTITA'];
            $cod_mostra = $_POST['COD_MOSTRA'];

            // Controllo se la data è compresa tra DATA_INIZIO e DATA_FINE della tabella mostre
            $query_data = "SELECT COUNT(*) FROM mostre WHERE '$data' BETWEEN DATA_INIZIO AND DATA_FINE AND COD_MOSTRA = :cod_mostra";
            $stmt_data = $pdo->prepare($query_data);
            $stmt_data->bindParam(':COD_MOSTRA', $cod_mostra);
            $stmt_data->execute();
            $count_data = $stmt_data->fetchColumn();

            if ($count_data == 0) {
                // La data non è valida per la mostra selezionata
                echo '<script>alert("La data selezionata non è valida per la mostra.");</script>';
                exit();
            }

            // Controllo se la quantità supera la capacità della sede
            $query_capacita = "SELECT sedi.CAPIENZA FROM sedi INNER JOIN mostre ON sedi.COD_SEDE = mostre.COD_SEDE WHERE mostre.COD_MOSTRA = :COD_MOSTRA";
            $stmt_capacita = $pdo->prepare($query_capacita);
            $stmt_capacita->bindParam(':COD_MOSTRA', $cod_mostra);
            $stmt_capacita->execute();
            $capacita = $stmt_capacita->fetchColumn();

            if ($quantita > $capacita) {
                // La quantità supera la capacità della sede
                echo '<script>alert("La quantità selezionata supera la capacità della sede.");</script>';
                exit();
            }
            // Inserimento dei dati nella tabella "BIGLIETTI"
            $query_inserimento = "INSERT INTO biglietti (COD_VISITATORE, FASCIA_ORARIA, DATA, TIPO_PAGAMENTO, QUANTITA, COD_MOSTRA) 
                        VALUES (:COD_VISITATORE, :FASCIA_ORARIA, :DATA, :TIPO_PAGAMENTO, :QUANTITA, :COD_MOSTRA)";
            $stmt_inserimento = $pdo->prepare($query_inserimento);
            $stmt_inserimento->bindParam(':COD_VISITATORE', $cod_visitatore);
            $stmt_inserimento->bindParam(':FASCIA_ORARIA', $fascia_oraria);
            $stmt_inserimento->bindParam(':DATA', $data);
            $stmt_inserimento->bindParam(':TIPO_PAGAMENTO', $tipo_pagamento);
            $stmt_inserimento->bindParam(':QUANTITA', $quantita);
            $stmt_inserimento->bindParam(':COD_MOSTRA', $cod_mostra);
            $stmt_inserimento->execute();

            echo '<script>alert("Inserimento effettuato con successo!");</script>';
        } catch (PDOException $e) {
            var_dump($e);
        }
    }
}
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $cod_visitatore = $_POST['COD_VISITATORE'];
        $fascia_oraria = $_POST['FASCIA_ORARIA'];
        $data = $_POST['DATA'];
        $tipo_pagamento = $_POST['TIPO_PAGAMENTO'];
        $quantita = $_POST['QUANTITA'];
        $cod_mostra = $_POST['COD_MOSTRA'];

        // Controllo se la quantità supera la capacità della sede
        $query_capacita = "SELECT sedi.CAPIENZA FROM sedi INNER JOIN mostre ON sedi.COD_SEDE = mostre.COD_SEDE WHERE mostre.COD_MOSTRA = :COD_MOSTRA";
        $stmt_capacita = $pdo->prepare($query_capacita);
        $stmt_capacita->bindParam(':COD_MOSTRA', $cod_mostra);
        $stmt_capacita->execute();
        $capacita = $stmt_capacita->fetchColumn();

        if ($quantita > $capacita) {
            // La quantità supera la capacità della sede
            echo '<script>alert("La quantità selezionata supera la capacità della sede.");</script>';
            echo '<script>window.location.href = "http://localhost/Prova_Finale_Dantas/views/homepage/homepage.php"; </script>';
            exit();
        }

        $query_inserimento = "INSERT INTO biglietti (COD_VISITATORE, FASCIA_ORARIA, DATA, TIPO_PAGAMENTO, QUANTITA, COD_MOSTRA) 
            VALUES (:COD_VISITATORE, :FASCIA_ORARIA, :DATA, :TIPO_PAGAMENTO, :QUANTITA, :COD_MOSTRA)";
        $stmt_inserimento = $pdo->prepare($query_inserimento);
        $stmt_inserimento->bindParam(':COD_VISITATORE', $cod_visitatore);
        $stmt_inserimento->bindParam(':FASCIA_ORARIA', $fascia_oraria);
        $stmt_inserimento->bindParam(':DATA', $data);
        $stmt_inserimento->bindParam(':TIPO_PAGAMENTO', $tipo_pagamento);
        $stmt_inserimento->bindParam(':QUANTITA', $quantita);
        $stmt_inserimento->bindParam(':COD_MOSTRA', $cod_mostra);
        $stmt_inserimento->execute();

        if ($stmt_inserimento->rowCount() > 0) {
            $row = $stmt_inserimento->fetch(PDO::FETCH_ASSOC);
            header('Location: http://localhost/Prova_Finale_Dantas/views/prenotazioni/prenotazioni.php?success=1');
            exit();
        } else {
            header('Location: http://localhost/Prova_Finale_Dantas/views/homepage/homepage.php');
            exit();
        }
            } catch (PDOException $e) {
        var_dump($e);
    }
}
