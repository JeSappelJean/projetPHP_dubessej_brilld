<?php

// Appel des class utiles
include_once("../Model/DAO.php");
include_once("../Model/structure.php");

// Initialisation des variables
if(isset($_POST['submitUpdate'])){
    $structure = $dao->getStructureById($_POST['IDStructure']);
    $secteurs = $dao->getSecteurs();
    $IDSecteur = $dao->getSecteursStructuresByStructureID($_POST['IDStructure'])->ID_SECTEUR;
}

// Redirection vers l'affichage
include_once("../View/updateStructure.view.php");