<?php

    class Structure{

        // Déclaration des attributs
        private $ID;
        private $NOM;
        private $RUE;
        private $CP;
        private $VILLE;
        private $ESTASSO;
        private $NB_DONATEURS;
        private $NB_ACTIONNAIRES;

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


