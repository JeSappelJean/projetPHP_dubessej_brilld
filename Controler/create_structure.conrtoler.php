<?php
    include_once ("../Model/DAO.php");
    include_once ("../Model/structure.php");

    $secteurs = $dao->getSecteurs();
    if (isset($_POST['submit'])) {

        if (isset($_POST['libelle'])) {$libelle = $_POST['libelle'];}
        if (isset($_POST['rue'])) {$rue = $_POST['rue'];}
        if (isset($_POST['ville'])) {$ville = $_POST['ville'];}
        if (isset($_POST['cpostal'])) {$cpostal = $_POST['cpostal'];}
        if (isset($_POST['isAsso'])) {$isAsso = 1;} else {$isAsso = 0;}
        if (isset($_POST['nbMembre'])) {$nbMembre = (int)$_POST['nbMembre'];}
        if (isset($_POST['secteurs'])){$idSecteur = (int)$_POST['secteurs'] ;}
        if (isset($_POST['libelle']) && isset($_POST['rue']) && isset($_POST['ville']) && isset($_POST['cpostal'])  && isset($_POST['nbMembre'])) {

            $dao->insertStructure($libelle, $rue, $cpostal, $ville, $isAsso, $nbMembre);
        }

        if($idSecteur != -1){
            $structure = $dao->getStructureByLibelle($libelle);
            $dao->insertSecteursStrutures($structure->ID,$idSecteur);
        }
    }

    include_once ("../View/new_structure.view.php");



