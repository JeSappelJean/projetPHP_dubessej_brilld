<!doctype html>

<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Projet Gestion des Secteurs et Structures</title>
    </head>

    <body>
        <!-- Ajout du menu de navigation -->
        <?php include 'menu.php'; ?>

        <!-- Contenu de la page -->
        <div style="padding:50px;">
            <form method="post" action="../Controler/create_structure.conrtoler.php">

                <h1>Créer une structure</h1>

                <!-- Affichage saisie du nom de la structure -->
                <div>
                    <label for="libelle"><b>Nom : </b></label>
                    <input name="libelle" id="libelle" type="text">
                </div>

                <!-- Affichage saisie de la rue de la structure -->
                <div>
                    <label for="rue"><b>Rue : </b></label>
                    <input name="rue" id="rue" type="text">
                </div>

                <!-- Affichage saisie de la ville de la structure -->
                <div>
                    <label for="ville"><b>Ville : </b></label>
                    <input name="ville" id="ville" type="text">
                </div>

                <!-- Affichage saisie du CP de structure -->
                <div>
                    <label for="cpostal"><b>Code Postal : </b></label>
                    <input name="cpostal" id="cpostal" type="text">
                </div>

                <!-- Affichage saisie du type de structure -->
                <div>
                    <label id="isAsso" ><b>Association : </b></label>
                    <input name="isAsso" id="isAsso" type="checkbox">
                </div>

                <!-- Affichage saisie du nombre de donateurs/actionnaires -->
                <div>
                    <label for="nbMembre"><b>Nombre de partenaires/donateurs : </b></label>
                    <input  name="nbMembre" id="nbMembre" type="number">
                </div>

                <!-- Affichage saisie du secteur -->
                <div>
                    <label for="secteur"><b>Secteur : </b></label>

                    <select name="secteurs">
                        <option value="-1">Choisir un secteur</option>
                        <?php foreach ($secteurs as $secteur){  ?>
                        <option value="<?php echo $secteur->ID ?>"><?php echo $secteur->LIBELLE?></option>
                        <?php }?>
                    </select>
                </div>

                <input class="btn btn-secondary" name="submit" type="submit">

                <!-- Affichage des messages d'intéractions -->
                <?php
                if (isset($erreur_msg)) {
                    echo '<div>'.$erreur_msg.'</div>';
                } else if (isset($confirmation_msg)) {
                    echo '<div>'.$confirmation_msg.'</div>';
                }
                ?>

            </form>
        </div>

    </body>

    <!-- Scripts Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>