<?php

// Appel des class utiles
include_once ("../Model/DAO.php");

// CONTROLE : MAJ d'un secteur
if (isset($_POST['submit'])) {
    if (isset($_POST['libelle'])) {
        $libelle = $_POST['libelle'];

        try {
            $dao->updateSecteur(intval($_POST['IDSecteur']),$libelle);
            $confirmation_msg = "CONFIRMATION : Réussite de la mise à jour !";
        } catch (PDOException $PDOException) {
            $erreur_msg = "ERREUR : Echec de la mise à jour !";
        }
    }
}

// CONTROLE : Suppression d'un secteur
if (isset($_POST['submitDelete'])){
    try{
        $dao->deleteSecteur(intval($_POST['IDSecteur']));
        $confirmation_msg = "CONFIRMATION : Le secteur a été suprimmé !";
    }
    catch (PDOException $exception){
        $erreur_msg = "ERREUR : Echec de la supression !";
    }
}

// Récupération de la liste des secteurs
$listeSecteurs = $dao->getSecteurs();

// Redirection vers l'affichage
include_once("../View/liste_secteurs.view.php");

?>