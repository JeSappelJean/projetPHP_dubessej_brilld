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

            <h1>Structures</h1>

            <!-- Filtres -->
            <div style="margin-bottom:25px;">
                <form action="../Controler/liste_structures.controler.php" method="post">
                    <div>
                        <div>
                            <label for="searchEntreprise">Entreprise</label>
                            <input type="checkbox" id="searchEntreprise" name="searchEntreprise">
                        </div>

                        <div>
                            <label for="searchAsso">Association</label>
                            <input type="checkbox" id="searchAsso" name="searchAsso">
                        </div>
                    </div>


                    <input id="submitFiltre" type="submit" class="btn btn-secondary" name="submitFiltre" value="Appliquer">
                </form>
            </div>

            <!-- Liste des structures -->
            <ul class="list-group">
            <?php foreach ($listeAffichage as $elem) { ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">

                    <div>
                        <i class="fas fa-user"></i>
                        <?php echo $elem[0]->NOM ?>
                    </div>

                    <div>
                        <i class="fas fa-archway"></i>
                        <?php if($elem[1]->LIBELLE != null)
                        { echo $elem[1]->LIBELLE ;
                        }  else {
                            echo '<a class="btn btn-secondary" href="new_secteur.view.php">Créer un secteur.</a>';
                        }  ?>
                    </div>

                    <div>
                        <i class="fas fa-home"></i>
                        <?php echo $elem[0]->RUE.' '.$elem[0]->CP.' '.$elem[0]->VILLE ?>
                    </div>

                    <div>
                        <i class="fas fa-bookmark"></i>
                        <?php if ($elem[0]->ESTASSO) {
                            echo 'Association';
                        } else {
                            echo 'Entreprise';
                        } ?>
                    </div>

                    <div>
                        <i class="fas fa-list-ol"></i>
                        <?php if ($elem[0]->ESTASSO) {
                            echo 'Nombre de donateurs : '.$elem[0]->NB_DONATEURS;
                        } else {
                            echo 'Nombre d\'actionnaires : '.$elem[0]->NB_ACTIONNAIRES;
                        } ?>
                    </div>

                    <form action="../Controler/update_structure_controler.php" method="post">
                        <input type="number" name="idStructure" hidden="hidden" value="<?php echo $elem[0]->ID ; ?>">
                        <input class="btn btn-secondary" type="submit" name="submitUpdate" value="Modifier">
                    </form>

                    <form action="../Controler/liste_structures.controler.php" method="post">
                        <input type="number" name="idStructure" hidden="hidden" value="<?php echo $elem[0]->ID ; ?>">
                        <input class="btn btn-secondary" type="submit" name="submitDelete" value="Supprimer">
                    </form>
                </li>
            <?php  } ?>
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