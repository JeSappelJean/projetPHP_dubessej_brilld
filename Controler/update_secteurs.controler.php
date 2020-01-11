<?php

include_once("../Model/DAO.php");
include_once("../Model/structure.php");

if(isset($_POST['submitUpdate'])){
    $secteur = $dao->getSecteurById($_POST['idSecteur']);
}

include_once("../View/update_secteur.view.php");