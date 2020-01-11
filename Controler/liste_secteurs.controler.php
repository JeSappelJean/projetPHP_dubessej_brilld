<?php
include_once ("../Model/DAO.php");
include_once ("../Model/DAO.php");

if (isset($_POST['submit'])) {
    if (isset($_POST['libelle'])) {
        $libelle = $_POST['libelle'];
    }
    if (isset($_POST['libelle'])) {
        try {
            $dao->updateSecteur(intval($_POST['idSecteur']),$libelle);
            $ok_message = "Votre secteur à bien été mis à jour";
        } catch (PDOException $PDOException) {
            $error_message = "Erreur lors de la mise à jour !";
        }
    }
}

if (isset($_POST['submitDelete'])){
    try{
        $dao->deleteSecteur(intval($_POST['idSecteur']));
        $ok_message = "Votre secteur à bien été suprimmé";
    }
    catch (PDOException $exception){

        $error_message = "Erreur lors de la supression !";
    }
}

$listeSecteurs = $dao->getSecteurs();

include_once("../View/liste_secteurs.view.php");