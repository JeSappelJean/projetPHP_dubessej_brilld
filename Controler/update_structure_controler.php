<?php

include_once("../Model/DAO.php");
include_once("../Model/structure.php");

if(isset($_POST['submitUpdate'])){
    $structure = $dao->getStructureById($_POST['idStructure']);
    $secteurs = $dao->getSecteurs();
    $idSecteur = $dao->getSecteursStructuresByStructureID($_POST['idStructure'])->ID_SECTEUR;
}


include_once("../View/update_structure.view.php");