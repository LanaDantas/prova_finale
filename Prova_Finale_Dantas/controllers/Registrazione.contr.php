<?php
session_start();

require "../config.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['NOME'];
    $cognome = $_POST['COGNOME'];
    $telefono = $_POST['TELEFONO'];
    $email = $_POST['EMAIL'];
    $login = $_POST['LOGIN'];
    $psw = $_POST['PSW'];


    $query = "INSERT INTO visitatori (NOME, COGNOME, TELEFONO, EMAIL, LOGIN, PSW) VALUES (:NOME, :COGNOME, :TELEFONO, :EMAIL, :LOGIN, :PSW)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':NOME', $nome);
    $stmt->bindParam(':COGNOME', $cognome);
    $stmt->bindParam(':TELEFONO', $telefono);
    $stmt->bindParam(':EMAIL', $email);
    $stmt->bindParam(':LOGIN', $login);
    $stmt->bindParam(':PSW', $psw);

    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $cod_visitatore = $row['COD_VISITATORE'];

        $_SESSION['COD_VISITATORE'] = $cod_visitatore;

        header('Location: http://localhost/Prova_Finale_Dantas/views/login/login.php?success=1');
        exit();
    } else {
        header('Location: http://localhost/Prova_Finale_Dantas/views/login/login.php?error=1');
        exit();
    }
}
