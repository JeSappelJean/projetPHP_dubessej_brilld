<?php

// Appel des class utiles
include_once("../Model/DAO.php");
include_once("../Model/structure.php");

// Récupération du secteur via son ID si une requête Update a été effectuée
if(isset($_POST['submitUpdate'])){
    $secteur = $dao->getSecteurById($_POST['IDSecteur']);
}

// Redirection vers l'affichage
include_once("../View/updateSecteur.view.php");