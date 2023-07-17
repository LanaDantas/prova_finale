<?php

namespace model;

use PDO;
use PDOException;

require "../config.php";

class Biglietto
{

    public $cod_operazione;
    public $cod_visitatore;
    public $fascia_oraria;
    public $data;
    public $tipo_pagamento;
    public $quantita;
    public $cod_mostra;
    public $result;

    public  static function arrayToBiglietto(array $class_array)
    {
        $biglietto = new Biglietto;
        foreach ($class_array as $class_attribute => $value_of_class_attribute) {

            $biglietto->$class_attribute = $value_of_class_attribute;
        }

        return $biglietto;
    }

    public function riepilogo()
    {

        $cod_operazione = $_GET['cod_operazione'];

        try {
            $query = " SELECT v.cognome, v.nome, b.tipo_pagamento, b.quantita, b.data, b.fascia_oraria, 
            
            b.cod_operazione, m.titolo, s.nome_sede FROM biglietti AS b

            JOIN visitatori AS v ON v.cod_visitatore=b.cod_visitatore
            
            JOIN mostre AS m ON m.cod_mostra=b.cod_mostra
            
            JOIN sedi AS s ON s.cod_sede=m.cod_sede
        
            WHERE b.cod_operazione IN ($cod_operazione)";

            $conn = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
            $stm = $conn->prepare($query);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            if (count($result) === 0) {
                return false;
            }
            $this->result = $result;
        } catch (PDOException $e) {
            echo "errore: " . $e->getMessage();
        }
    }

    function listaPrenotazioni()
    {
    }
}
