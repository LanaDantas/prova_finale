<?php

namespace model;

use PDO;
use PDOException;

require "../config.php";

class Mostra {
    
    public $cod_mostra;
    public $titolo; 
    public $data_inizio; 
    public $data_fine; 
    public $prezzo;
    public $cod_sede; 
    public $result;

    public  static function arrayToMostra(array $class_array)
    {
        $mostra = new Mostra;
        foreach ($class_array as $class_attribute => $value_of_class_attribute) {
            
            $mostra->$class_attribute = $value_of_class_attribute;
        }

        return $mostra;
    }

    public function listaMostre() {
        try {
            $query = "SELECT  m.cod_mostra, m.titolo, m.data_inizio, m.data_fine, m.prezzo, 
            
            s.nome_sede, s.indirizzo, s.citta, s.provincia, s.telefono FROM mostre AS m

            JOIN sedi AS s ON s.cod_sede=m.cod_sede";
            
            $conn = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
            $stm = $conn->prepare($query);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
                if(count($result) === 0) {
                    return false;
                }
                $this->result = $result; 
            

        } catch (PDOException $e) {
            echo "errore: " . $e->getMessage();
        }
    }

}