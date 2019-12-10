<!DOCTYPE html>
<html>
<head>
    <title>Structures - PDO</title>
    <meta charset="UTF-8">
</head>
<body>
<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "structures_lpg_1920";

try {
    // connexion à l'aide d'une chaîne de connexion
    $conn = new PDO("mysql:host=$server;dbname=$db", $user, $pass);
    // Configure le mode d'erreur de PDO à exception (mode non par défaut)
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prépare la requête et bind les paramètres
    $stmt = $conn->prepare("insert into secteur(id, libelle) values (:id, :libelle)");
    //var_dump($stmt);
    $res=$stmt->execute([":id" => NULL, ":libelle" => "secteur".rand()]);
    var_dump($res);
    var_dump($stmt);

    echo $stmt->rowCount()." nouveau(x) secteur(s) d'activité(s) créé(s)";

    $stmt = $conn->prepare("select * from structure where ville=:v and id>:i");
    // On laisse PDO déterminer le type du paramètre si le 3ème argument n'est pas précisé
    // On associe la valeur du paramètre à une valeur
    $stmt->bindValue("v","Paris", PDO::PARAM_STR);
    $id=0;
    // On associe la valeur du paramètre à celle d'une variable
    // qui est relue à chaque execute
    $stmt->bindParam(":i",$id, PDO::PARAM_INT);

    $res = $stmt->execute();
    //var_dump($res);

    if ($res) {
        $lines = $stmt->fetchAll(PDO::FETCH_BOTH);
        var_dump($lines);
    }

    $id=1;

    $res = $stmt->execute();
    //var_dump($res);

    if ($res) {
        $lines = $stmt->fetchAll(PDO::FETCH_OBJ);
        var_dump($lines);
    }

    $res = $stmt->execute();

    while ($line=$stmt->fetch(PDO::FETCH_ASSOC)) {
        var_dump($line);
        echo $line["ID"]." ".$line["NOM"]."<br/>";
    }
    //var_dump($line);
}
catch(PDOException $e)
{
    echo "Error ".$e->getCode()." : ".$e->getMessage()."<br/>".$e->getTraceAsString();
}
// fermeture de la connexion
$conn = null;
?>
</body>
</html>