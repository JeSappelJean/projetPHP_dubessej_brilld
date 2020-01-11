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

            <form method="post" action="../Controler/create_secteurs.controler.php">

                <h1>Créer un secteur</h1>

                <div>
                    <label for="libelle">Nom : </label>
                    <input  name="libelle" id="libelle" type="text">
                </div>

                <input name="submit" class="btn btn-secondary" type="submit" required>

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