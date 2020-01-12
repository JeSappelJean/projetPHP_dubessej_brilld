<?php

//Appel des class utiles
require_once ("secteur.php");
require_once ("structure.php");
require_once ("secteurs_structures.php");

$dao = new DAO();

class DAO{

    // Déclaration des attributs
    private $pdo;

    // Constructeur
    public function __construct()
    {
        try{
            $database_name = "structures_lpg_1920";
            $server = "localhost";
            $user = "root";
            $pass = "";
            $this->pdo = new PDO("mysql:host=$server;dbname=$database_name", $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $exception){
            die("Erreur de connexion:".$exception->getMessage());
        }
    }



    /* ################# SECTEURS #################*/
    // FONCTION : Récupération de tous les secteurs
    public function getSecteurs() : array{

        $requete = "SELECT * FROM secteur" ;
        $std = ($this->pdo)->query($requete);
        $resultat = $std->fetchAll(PDO::FETCH_CLASS,"Secteur");

        return $resultat;
    }


    // FONCTION : MAJ d'un secteur
    function updateSecteur($id,$libelle){
        $requete = "UPDATE secteur SET libelle = '$libelle' WHERE id= '$id'";
        ($this->pdo)->exec($requete);;
    }


    // FONCTION : Récupération d'un secteur par son ID
    public function getSecteurById($id) : Secteur{
        $requete = "SELECT * FROM secteur WHERE id = '$id'";
        $std = ($this->pdo)->query($requete);
        $resultat = $std->fetchAll(PDO::FETCH_CLASS,"Secteur");

        return $resultat[0];
    }


    // FONCTION : Suppression d'un secteur
    function deleteSecteur(int $id) : string {
        try{
            $requete_1 = "DELETE FROM secteurs_structures WHERE id_secteur = $id";
            ($this->pdo)->exec($requete_1);

            $requete_2 = "DELETE FROM secteur WHERE id=$id";
            ($this->pdo)->exec($requete_2);

            return "CONFIRMATION : Le secteur a été suprimmé !";
        }
        catch (PDOException $exception){
            return "Code error : " + $exception->getMessage();
        }
    }

    // FONCTION : Insertion d'un secteur
    function insertSecteur( string $libelle){
        $req = "INSERT INTO secteur(libelle) VALUES ('$libelle')";
        ($this->pdo)->exec($req);
    }
    /* ################# FIN : SECTEURS #################*/



    /* ################# STRUCTURES #################*/
    // FONCTION : Récupération de toute les structures
    function getStructures() : array{

        $requete = "SELECT * FROM structure" ;
        $std = ($this->pdo)->query($requete);
        $resultat = $std->fetchAll(PDO::FETCH_CLASS,"Structure");

        return $resultat;
    }


    // FONCTION : MAJ d'une structure
    function updateStructure($id,$nom,$rue,$cp,$ville,$estasso,$nb){

        if($estasso == 1){
            $requete = "UPDATE Structure SET nom='$nom' , rue='$rue',cp='$cp', ville='$ville' , estasso='$estasso' , nb_donnateurs='$nb' WHERE id='$id' ";
        }
        else{
            $requete = "UPDATE Structure SET nom='$nom' , rue='$rue',cp='$cp', ville='$ville' , estasso='$estasso' , nb_actionnaires='$nb' WHERE id='$id' ";
        }

        ($this->pdo)->exec($requete);;
    }


    // FONCTION : Récupération d'une structure par son id
    function getStructureById($id) : Structure{

        $requete = "SELECT * FROM structure WHERE id = '$id'";

        $std =($this->pdo)->query($requete);
        $resultat =$std->fetchAll(PDO::FETCH_CLASS,'Structure');
        return $resultat[0];
    }


    // FONCTION : Insertion d'une structure
    function insertStructure($nom,$rue,$cp,$ville,$estasso,$nb){
        if($estasso == 1){
            $requete = "INSERT INTO Structure(nom,rue,cp,ville,estasso,nb_donateurs) VALUES ('$nom','$rue','$cp','$ville','$estasso','$nb')";
        }
        else{
            $requete = "INSERT INTO Structure(nom,rue,cp,ville,estasso,nb_actionnaires) VALUES ('$nom','$rue','$cp','$ville','$estasso','$nb')";
        }
        ($this->pdo)->exec($requete);;

    }


    // FONCTION : Récupération d'une structure par son libelle
    function getStructureByLibelle($libelle) : Structure{

        $requete = "SELECT * FROM structure WHERE nom = '$libelle'";

        $std =($this->pdo)->query($requete);
        $resultat =$std->fetchAll(PDO::FETCH_CLASS,'Structure');
        return $resultat[0];
    }


    // FONCTION : Suppression d'une structure
    function deleteStructure(int $id) : string {
        try{
            $requete_1 = "DELETE FROM secteurs_structures WHERE id_structure = $id";
            ($this->pdo)->exec($requete_1);

            $requete_2 = "DELETE FROM structure WHERE id=$id";
            ($this->pdo)->exec($requete_2);

            return "CONFIRMATION :  La structure a été supprimée";
        }
        catch (PDOException $exception){
            return "Code error : " + $exception->getMessage();
        }
    }
    /* ################# FIN : STRUCTURES #################*/



    /* ################# SERVEURSSTRUCTURES #################*/
    // FONCTION : Insertion dans SecteursStructures
    function insertSecteursStructures($id_structure,$id_secteurs){
        $requete = "INSERT INTO secteurs_structures(id_structure,id_secteur) VALUES ('$id_structure','$id_secteurs')";
        ($this->pdo)->exec($requete);
    }


    // FONCTION : Récupération des infos SecteursStructures via l'id d'une structure
    function getSecteursStructuresByStructureID($id) : Secteurs_structures{

        $requete = "SELECT * FROM secteurs_structures WHERE id_structure = '$id'";
        $std =($this->pdo)->query($requete);
        $resultat =$std->fetchAll(PDO::FETCH_CLASS,'Secteurs_structures');

        return $resultat[0];
    }

    // FONCTION : MAJ des infos SecteursStructures via l'id d'une structure
    function updateSecteurStructureByStructureID($idStructure,$idSecteur){
        $requete = "UPDATE secteurs_structures SET id_secteur='$idSecteur' where id_structure='$idStructure'  ";
        ($this->pdo)->exec($requete);;
    }
    /* ################# FIN : SERVEURSSTRUCTURES #################*/
}

?>