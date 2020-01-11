<?php
    include_once ("../Model/DAO.php");
    include_once ("../Model/structure.php");



if (isset($_POST['submit'])) {
    if (isset($_POST['idStructure'])) {$id = $_POST['idStructure'];}
    if (isset($_POST['libelle'])) {$libelle = $_POST['libelle'];}
    if (isset($_POST['rue'])) {$rue = $_POST['rue'];}
    if (isset($_POST['ville'])) {$ville = $_POST['ville'];}
    if (isset($_POST['cpostal'])) {$cpostal = $_POST['cpostal'];}
    if (isset($_POST['isAsso'])) {$isAsso = 1;} else {$isAsso = 0;}
    if (isset($_POST['nbMembre'])) {$nbMembre = (int)$_POST['nbMembre'];}
    if (isset($_POST['secteurs'])){$idSecteur = (int)$_POST['secteurs'] ;}
    if (isset($_POST['libelle']) && isset($_POST['rue']) && isset($_POST['ville']) && isset($_POST['cpostal'])  && isset($_POST['nbMembre'])) {

        try{
            $dao->updateStructure($id, $libelle, $rue, $cpostal, $ville, $isAsso, $nbMembre);
            $ok_message = "Votre structure à bien mise à jour";
        }
        catch (PDOException $exception){

            $error_message = "Erreur lors de la mise à jour !";
        }
    }

    if($idSecteur != -1){
        $secteurStructure = $dao->getSecteursStructuresByStructureID($id);
        if($secteurStructure->ID != null){
            $dao->updateSecteurStructureByStructureID($id,$idSecteur);
        }else{
            $dao->insertSecteursStrutures($id,$idSecteur);
        }

    }
}

if (isset($_POST['submitDelete'])){
    try{
        $dao->deleteStructure(intval($_POST['idStructure']));
        $ok_message = "Votre structure à bien été suprimmé";
    }
    catch (PDOException $exception){

        $error_message = "Erreur lors de la supression !";
    }
}

if (isset($_POST['submitFiltre'])) {
    if (isset($_POST['searchAsso']) && isset($_POST['searchEntreprise'])) {
        $listStructures = $dao->getStructures();


    } elseif (isset($_POST['searchEntreprise'])) {
        $listStructures = $dao->getStructureByType(0);

    } elseif (isset($_POST['searchAsso'])) {
        $listStructures = $dao->getStructureByType(1);

    }
} else {
    $listStructures = $dao->getStructures();
}
$listeAffichage = [];
foreach ($listStructures as $structure){
    $element = [];
    $secteurID = $dao->getSecteursStructuresByStructureID($structure->ID);
    $secteur  = $dao->getSecteurById($secteurID->ID_SECTEUR);
    array_push($element,$structure);
    array_push($element,$secteur);
    array_push($listeAffichage,$element);
}
    include_once("../View/liste_structure.view.php");