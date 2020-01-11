<?php

    class Secteurs_structures{

        // Déclaration des attributs
        private $ID;
        private $ID_STRUCTURE;
        private $ID_SECTEUR;

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



