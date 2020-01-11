<?php

// Appel des class utiles
include_once ("../Model/DAO.php");
include_once ("../Model/structure.php");


if (isset($_POST['submit'])) {
    if (isset($_POST['libelle'])) {
        $libelle = $_POST['libelle'];

        try{
            $dao->insertSecteur($libelle);
            $confirmation_msg = "CONFIRMATION : Le secteur a bien été créé !";
        }
        catch (PDOException $PDOException){
            $erreur_msg = "ECHEC : Le secteur existe déjà !";
        }
    }
}

// Redirection vers l'affichage
include_once("../View/addSecteur.view.php");