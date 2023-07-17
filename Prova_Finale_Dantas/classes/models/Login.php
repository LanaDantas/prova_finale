<?php

namespace model;

session_start();
use PDO;
use PDOException;

require "../config.php";

$username = $_POST['login'];
$password = $_POST['psw'];

class Login {

    public function login($username, $password) {
        
        try {
            $conn = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

            $query = "SELECT * FROM visitatori WHERE login=:login AND psw=:psw";
            $stm = $conn->prepare($query);
            $stm->bindValue(':login', $username, PDO::PARAM_STR);
            $stm->bindValue(':psw', $password, PDO::PARAM_STR);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            
            if (!empty($result) && $result[0]['login'] == $username && $result[0]['psw'] == $password) {

                $_SESSION['loggato'] = true;
                $_SESSION['cod_visitatore'] = $result[0]['cod_visitatore'];

                header("Location: ../view/mostre.php");
                exit();
            } else {
            }
        } catch (PDOException $e) {
            echo "Errore: " . $e->getMessage();
        }
    
    }
}


