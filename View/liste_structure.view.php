<!doctype html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="../View/style.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Projet Gestion des Secteurs et Structures</title>
</head>
<body>

    <!-- Ajout du menu de navigation -->
    <?php include 'menu.php'; ?>


<div class="moove-right">
    <div class="content">
        <div class="search">
            <form>
                <input id="textSearch" type="text" placeholder="Votre recherche ?"><input id="submitSearch" type="submit">
            </form>
        </div>
        <div class="filtres">
            <form action="../Controler/liste_structures.controler.php" method="post">
                <label for="searchEntreprise">Entreprise</label>
                <input type="checkbox" id="searchEntreprise" name="searchEntreprise">
                <label for="searchAsso">Association</label>
                <input type="checkbox" id="searchAsso" name="searchAsso">
                <input id="submitFiltre" type="submit" name="submitFiltre" value="Appliquer les filtres">
            </form>
        </div>
            <ul class="listItem">
        <?php
        foreach ($listeAffichage as $elem) { ?>
            <li class="item">
                <div class="nom">
                    <?php echo $elem[0]->NOM ?>
                </div>
                <div class="secteurs">
                    <?php if($elem[1]->LIBELLE != null)
                    { echo $elem[1]->LIBELLE ;
                    }  else {
                        echo '<a href="new_secteur.view.php">Créer un secteur.</a>';
                    }  ?>
                </div>
                <div class="adresse">
                    <?php echo $elem[0]->RUE.' '.$elem[0]->CP.' '.$elem[0]->VILLE ?>
                </div>
                <div class="type">
                    <?php if ($elem[0]->ESTASSO) {
                        echo 'Association';
                    } else {
                        echo 'Entreprise';
                    } ?>
                </div>
                <div class="nbOf">
                    <?php if ($elem[0]->ESTASSO) {
                        echo 'Nombre de donateurs : '.$elem[0]->NB_DONATEURS;
                    } else {
                        echo 'Nombre d\'actionnaires : '.$elem[0]->NB_ACTIONNAIRES;
                    } ?>
                </div>
                <form action="../Controler/update_structure_controler.php" method="post">
                    <input type="number" name="idStructure" hidden="hidden" value="<?php echo $elem[0]->ID ; ?>">
                    <input class="update" type="submit" name="submitUpdate" value="Modifier">
                </form>
                <form action="../Controler/liste_structures.controler.php" method="post">
                    <input type="number" name="idStructure" hidden="hidden" value="<?php echo $elem[0]->ID ; ?>">
                    <input class="delete" type="submit" name="submitDelete" value="Supprimer">
                </form>

            </li>
        <?php  } ?>
    </div>

</div>
<?php
if(isset($error_message)){
    echo "<script> alert( \"$error_message \" )</script>";
}
if(isset($ok_message)){
    echo "<script> alert(\" $ok_message \")</script>";

}
?>
    </body>

    <!-- Scripts Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>