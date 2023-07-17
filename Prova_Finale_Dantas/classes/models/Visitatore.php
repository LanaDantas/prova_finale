<?php

namespace model;

class Visitatore {
    
    public $cod_visitatore;
    public $cognome; 
    public $nome; 
    public $telefono; 
    public $email;
    public $login; 
    public $psw;  

    public  static function arrayToUser(array $class_array)
    {
        $visitatore = new Visitatore;
        foreach ($class_array as $class_attribute => $value_of_class_attribute) {
            
            $visitatore->$class_attribute = $value_of_class_attribute;
        }

        return $visitatore;
    }
}