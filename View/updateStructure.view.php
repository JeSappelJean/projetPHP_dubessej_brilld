<!doctype html>

<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="../Utils/fontawesome-free-5.12.0-web/css/all.css" rel="stylesheet">
        <title>Projet Gestion des Secteurs et Structures</title>
    </head>

    <body>
        <!-- Ajout du menu de navigation -->
        <?php include 'menu.php'; ?>

        <!-- Contenu de la page -->
        <div style="padding:50px;">

            <h1>Modifier votre structure</h1>

            <form method="post" action="../Controler/listeStructures.controler.php">

                <input type="text" hidden="hidden" name="IDStructure" value="<?php echo $_POST['IDStructure'];?>">

                <!-- Affichage du nom de la structure -->
                <div>
                    <label for="libelle"><b>Nom : </b></label>
                    <input name="libelle" id="libelle" type="text" value="<?php if(isset($structure)){echo $structure->NOM ;} ?>">
                </div>

                <!-- Affichage de la rue de la structure-->
                <div>
                    <label for="rue"><b>Rue : </b></label>
                    <input name="rue" id="rue" type="text" value="<?php if(isset($structure)){echo $structure->RUE ;} ?>">
                </div>

                <!-- Affichage de la ville de la structure -->
                <div>
                    <label for="ville"><b>Ville : </b></label>
                    <input name="ville" id="ville" type="text" value="<?php if(isset($structure)){echo $structure->VILLE ;} ?>">
                </div>

                <!-- Affichage du CP de la structure -->
                <div>
                    <label for="cpostal"><b>Code Postal : </b></label>
                    <input name="cpostal" id="cpostal" type="text" value="<?php if(isset($structure)){echo $structure->CP ;} ?>">
                </div>

                <!-- Affichage du type de la structure -->
                <div>
                    <label id="isAsso"><b>Association : </b></label>
                    <input name="isAsso" id="isAsso" type="checkbox" <?php if(isset($structure)){if($structure->ESTASSO == 1) {echo 'checked';}} ?>>
                </div>

                <!-- Affichage du nombre de partenaires/donateurs de la structure -->
                <div>
                    <label for="nbMembre"><b>Nombre de partenaires/donateurs :</b></label>
                    <input  name="nbMembre" id="nbMembre" type="number" value="<?php if(isset($structure)){if($structure->ESTASSO == 1) {echo $structure->NB_DONATEURS;}else {echo $structure->NB_ACTIONNAIRES;}} ?>">
                </div>

                <!-- Affichage du secteur de la structure -->
                <div>
                    <label for="secteur"><b>Secteur :</b></label>
                    <select name="secteurs">
                        <option value="-1">Choisir un secteur</option>

                        <?php foreach ($secteurs as $secteur){  ?>
                            <option value="<?php echo $secteur->ID ?>" <?php if($IDSecteur == $secteur->ID){echo 'selected="selected"';}?>><?php echo $secteur->LIBELLE?></option>
                        <?php }?>
                    </select>
                </div>

                <input class="btn btn-secondary" name="submit" type="submit">

            </form>
        </div>

    </body>

    <!-- Scripts Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>