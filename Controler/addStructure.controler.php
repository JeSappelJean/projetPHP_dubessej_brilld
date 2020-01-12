<?php

// Appel des class utiles
include_once("../Model/DAO.php");
include_once("../Model/structure.php");

// Récupération de tous les secteurs
$secteurs = $dao->getSecteurs();

// Si requete de création d'une structure, on initialise
if (isset($_POST['submit'])) {

    if (isset($_POST['libelle'])) {$libelle = $_POST['libelle'];}
    if (isset($_POST['rue'])) {$rue = $_POST['rue'];}
    if (isset($_POST['ville'])) {$ville = $_POST['ville'];}
    if (isset($_POST['cpostal'])) {$cpostal = $_POST['cpostal'];}
    if (isset($_POST['isAsso'])) {$isAsso = 1;} else {$isAsso = 0;}
    if (isset($_POST['nbMembre'])) {$nbMembre = (int)$_POST['nbMembre'];}
    if (isset($_POST['secteurs'])){$idSecteur = (int)$_POST['secteurs'] ;}
    if (isset($_POST['libelle']) && isset($_POST['rue']) && isset($_POST['ville']) && isset($_POST['cpostal'])  && isset($_POST['nbMembre'])) {

        try{
            $dao->insertStructure($libelle, $rue, $cpostal, $ville, $isAsso, $nbMembre);
            $confirmation_msg = "CONFIRMATION : La structure a bien été créée !";
        }
        catch (PDOException $PDOException){
            $erreur_msg = "ECHEC : La structure existe déjà !";
        }
    }

    // On ajoute aussi la liaison Secteurs et Structures
    if($idSecteur != -1){
        $structure = $dao->getStructureByLibelle($libelle);
        $dao->insertSecteursStructures($structure->ID,$idSecteur);
    }
}

// Redirection vers l'affichage
include_once("../View/addStructure.view.php");



