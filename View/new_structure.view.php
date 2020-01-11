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
        <form class="classic-form" method="post" action="../Controler/create_structure.conrtoler.php">
            <h2>Créer une structure</h2>
            <div class="champ">
                <label for="libelle">Nom de l'entrprise : </label>
                <input name="libelle" id="libelle" type="text">
            </div>

            <div class="champ">
                <label for="rue">Rue : </label>
                <input name="rue" id="rue" type="text">
            </div>
            <div class="champ">
                <label for="ville">Ville : </label>
                <input name="ville" id="ville" type="text">
            </div>
            <div class="champ">
                <label for="cpostal">Code postal : </label>
                <input name="cpostal" id="cpostal" type="text">
            </div>
            <div class="champ">
                <label id="isAsso" >Association ? : </label>
                <input name="isAsso" id="isAsso" type="checkbox">
            </div>
            <div class="champ">
                <label for="nbMembre">Nombre de </label>
                <input  name="nbMembre" id="nbMembre" type="number">
            </div>

            <div class="champs">
                <label for="secteur">Secteur</label>
                <select name="secteurs" id="pet-select">
                    <option value="-1">Choisir un secteur</option>
                    <?php foreach ($secteurs as $secteur){  ?>
                    <option value="<?php echo $secteur->ID ?>"><?php echo $secteur->LIBELLE?></option>
                    <?php }?>
                </select>
            </div>

            <input name="submit" type="submit">
        </form>
    </div>

</div>
</body>
<!-- Scripts Bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>