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
        $req = "SELECT * FROM secteur" ;
        $statement = $this->pdo->query($req);
        $result = $statement->fetchAll(PDO::FETCH_CLASS,"Secteur");

        return $result;
    }


    // FONCTION : MAJ d'un secteur
    function updateSecteur($id, $libelle){
        $req = "UPDATE secteur SET libelle = '$libelle' WHERE id= '$id'";
        $this->pdo->exec($req);
    }


    // FONCTION : Récupération d'un secteur par son ID
    public function getSecteurById($id) : Secteur{
        $req = "SELECT * FROM secteur WHERE id = '$id'";
        $statement = $this->pdo->query($req);
        $result = $statement->fetchAll(PDO::FETCH_CLASS,"Secteur");

        return $result[0];
    }


    // FONCTION : Suppression d'un secteur
    function deleteSecteur(int $id) : string {
        try{
            $req1 = "DELETE FROM secteurs_structures WHERE id_secteur = $id";
            $this->pdo->exec($req1);

            $req2 = "DELETE FROM secteur WHERE id=$id";
            $this->pdo->exec($req2);

            return "CONFIRMATION : Le secteur a été suprimmé !";
        }
        catch (PDOException $exception){
            return "Code error : " + $exception->getMessage();
        }
    }

    // FONCTION : Insertion d'un secteur
    function insertSecteur( string $libelle){
        $req = "INSERT INTO secteur(libelle) VALUES ('$libelle')";
        $this->pdo->exec($req);
    }
    /* ################# FIN : SECTEURS #################*/



    /* ################# STRUCTURES #################*/
    // FONCTION : Récupération de toute les structures
    function getStructures() : array{
        $req = "SELECT * FROM structure" ;
        $statement = $this->pdo->query($req);
        $result = $statement->fetchAll(PDO::FETCH_CLASS,"Structure");

        return $result;
    }


    // FONCTION : MAJ d'une structure
    function updateStructure($id,$nom,$rue,$cp,$ville,$estasso,$nb){
        if($estasso == 1){
            $req = "UPDATE structure SET nom='$nom' , rue='$rue',cp='$cp', ville='$ville' , estasso='$estasso' , nb_donnateurs='$nb' WHERE id='$id' ";
        }
        else{
            $req = "UPDATE structure SET nom='$nom' , rue='$rue',cp='$cp', ville='$ville' , estasso='$estasso' , nb_actionnaires='$nb' WHERE id='$id' ";
        }

        $this->pdo->exec($req);;
    }


    // FONCTION : Récupération d'une structure par son id
    function getStructureById($id) : Structure{
        $req = "SELECT * FROM structure WHERE id = '$id'";

        $statement = $this->pdo->query($req);
        $result = $statement->fetchAll(PDO::FETCH_CLASS,'Structure');
        return $result[0];
    }


    // FONCTION : Insertion d'une structure
    function insertStructure($nom,$rue,$cp,$ville,$estasso,$nb){
        if($estasso == 1){
            $req = "INSERT INTO structure(nom,rue,cp,ville,estasso,nb_donateurs) VALUES ('$nom','$rue','$cp','$ville','$estasso','$nb')";
        }
        else{
            $req = "INSERT INTO structure(nom,rue,cp,ville,estasso,nb_actionnaires) VALUES ('$nom','$rue','$cp','$ville','$estasso','$nb')";
        }
        $this->pdo->exec($req);

    }


    // FONCTION : Récupération d'une structure par son libelle
    function getStructureByLibelle($libelle) : Structure{
        $req = "SELECT * FROM structure WHERE nom = '$libelle'";

        $statement = $this->pdo->query($req);
        $result = $statement->fetchAll(PDO::FETCH_CLASS,'Structure');
        return $result[0];
    }


    // FONCTION : Suppression d'une structure
    function deleteStructure(int $id) : string {
        try{
            $req1 = "DELETE FROM secteurs_structures WHERE id_structure = $id";
            $this->pdo->exec($req1);

            $req2 = "DELETE FROM structure WHERE id=$id";
            $this->pdo->exec($req2);

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
        $req = "INSERT INTO secteurs_structures(id_structure,id_secteur) VALUES ('$id_structure','$id_secteurs')";
        $this->pdo->exec($req);
    }


    // FONCTION : Récupération des infos SecteursStructures via l'id d'une structure
    function getSecteursStructuresByStructureID($id) : Secteurs_structures{

        $req = "SELECT * FROM secteurs_structures WHERE id_structure = '$id'";
        $statement =$this->pdo->query($req);
        $result =$statement->fetchAll(PDO::FETCH_CLASS,'Secteurs_structures');

        return $result[0];
    }

    // FONCTION : MAJ des infos SecteursStructures via l'id d'une structure
    function updateSecteurStructureByStructureID($idStructure,$idSecteur){
        $req = "UPDATE secteurs_structures SET id_secteur='$idSecteur' where id_structure='$idStructure'  ";
        $this->pdo->exec($req);
    }
    /* ################# FIN : SERVEURSSTRUCTURES #################*/
}

?>