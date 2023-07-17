<?php

namespace model;

class Sede {
    
    public $cod_sede;
    public $nome_sede; 
    public $indirizzo; 
    public $citta; 
    public $provincia;
    public $telefono;
    public $capienza;  
    

    public  static function arrayToMostra(array $class_array)
    {
        $sede = new Sede;
        foreach ($class_array as $class_attribute => $value_of_class_attribute) {
            
            $sede->$class_attribute = $value_of_class_attribute;
        }

        return $sede;
    }
}