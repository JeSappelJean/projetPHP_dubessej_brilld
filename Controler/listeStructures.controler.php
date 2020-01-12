<?php

// Appel des class utiles
include_once ("../Model/DAO.php");
include_once ("../Model/structure.php");


// CONTROLE : MAJ d'une structure
if (isset($_POST['submit'])) {

    if (isset($_POST['IDStructure'])) {$id = $_POST['IDStructure'];}
    if (isset($_POST['libelle'])) {$libelle = $_POST['libelle'];}
    if (isset($_POST['rue'])) {$rue = $_POST['rue'];}
    if (isset($_POST['ville'])) {$ville = $_POST['ville'];}
    if (isset($_POST['cpostal'])) {$cpostal = $_POST['cpostal'];}
    if (isset($_POST['isAsso'])) {$isAsso = 1;} else {$isAsso = 0;}
    if (isset($_POST['nbMembre'])) {$nbMembre = (int)$_POST['nbMembre'];}
    if (isset($_POST['secteurs'])){$IDSecteur = (int)$_POST['secteurs'] ;}

    if (isset($_POST['libelle']) && isset($_POST['rue']) && isset($_POST['ville']) && isset($_POST['cpostal'])  && isset($_POST['nbMembre'])) {
        try{
            $dao->updateStructure($id, $libelle, $rue, $cpostal, $ville, $isAsso, $nbMembre);
            $confirmation_msg = "CONFIRMATION : La structure a été mise à jour !";
        }
        catch (PDOException $exception){
            $erreur_msg = "ERREUR : Echec de la mise à jour !";
        }
    }

    if($IDSecteur != -1){
        $secteurStructure = $dao->getSecteursStructuresByStructureID($id);

        if($secteurStructure->ID != null){
            $dao->updateSecteurStructureByStructureID($id,$IDSecteur);
        }else{
            $dao->insertSecteursStructures($id,$IDSecteur);
        }
    }
}


// CONTROLE : Suppression d'une structure
if (isset($_POST['submitDelete'])){
    try{
        $dao->deleteStructure(intval($_POST['IDStructure']));
        $confirmation_msg = "CONFIRMATION : La structure a bien été supprimée";
    }
    catch (PDOException $exception){
        $erreur_msg = "ERREUR : Echec de la supression !";
    }
}


// Récupération de la liste des structures
$listeStructures = $dao->getStructures();

// Création d'une variable pour l'affichage
$listeAffichage = [];

foreach ($listeStructures as $structure){

    // Création d'une structure avec son secteur pour affichage
    $structureAffichage = [];

    // Récupération du secteur
    $secteurID = $dao->getSecteursStructuresByStructureID($structure->ID);
    $secteur  = $dao->getSecteurById($secteurID->ID_SECTEUR);

    // Remplissage de la structure et de son secteur
    array_push($structureAffichage,$structure);
    array_push($structureAffichage,$secteur);

    // Ajout dans la liste d'affichage des structures et des secteurs correspondant
    array_push($listeAffichage,$structureAffichage);
}

// Redirection vers l'affichage
include_once("../View/listeStructure.view.php");

?>