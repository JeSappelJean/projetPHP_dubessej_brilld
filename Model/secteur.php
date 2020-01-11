<?php

class Secteur{

    // Déclaration des attributs
    private $ID;
    private $LIBELLE;

    public function __construct(array $tab = NULL){
        if($tab != NULL){
            foreach ($tab as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    function __get(string $property){
        return $this->$property;
    }
}

?>


