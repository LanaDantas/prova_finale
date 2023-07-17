<?php
session_start();

require "../config.php";

$login = $_POST['LOGIN'];
$password = $_POST['PSW'];

$query = "SELECT COD_VISITATORE FROM visitatori WHERE LOGIN = :LOGIN AND PSW = :PSW";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':LOGIN', $login);
$stmt->bindParam(':PSW', $password);
$stmt->execute();

if ($stmt->rowCount() > 0) {
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$cod_visitatore = $row['COD_VISITATORE'];

	$_SESSION['COD_VISITATORE'] = $cod_visitatore;

	header('Location: http://localhost/Prova_Finale_Dantas/views/homepage/homepage.php');
	exit();
} else {
	header('Location: http://localhost/Prova_Finale_Dantas/views/login/login.php?error=1');
	exit();
}
