<?php
include_once ("../Model/DAO.php");
include_once ("../Model/structure.php");
if (isset($_POST['submit'])) {

    if (isset($_POST['libelle'])) {$libelle = $_POST['libelle'];}


    if (isset($_POST['libelle'])) {
        try{
            $dao->insertSecteur($libelle);
            $ok_message = "Votre secteur à bien été crée";
        }
        catch (PDOException $PDOException){
            $error_message = "Ce secteur existe déjà !";
        }

    }
}

include_once ("../View/new_secteur.view.php");