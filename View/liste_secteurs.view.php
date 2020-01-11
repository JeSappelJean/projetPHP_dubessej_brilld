<!doctype html>

<html lang="fr">
    <head>
        <link rel="stylesheet" href="../View/style.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Projet Gestion des Secteurs et Structures</title>
    </head>

    <body>

        <!-- Ajout du menu de navigation -->
        <?php include 'menu.php'; ?>


        <div class="moove-right">
            <div class="content">
                <h1>Secteurs</h1>
                <ul class="listItem">
                    <?php
                    foreach ($listeSecteurs as $secteur) { ?>
                        <li class="item">
                            <div class="secteurs">
                                <?php if($secteur->LIBELLE != null){ echo $secteur->LIBELLE ;}   ?>
                            </div>

                            <form action="../Controler/update_secteurs.controler.php" method="post">
                                <input type="number" name="idSecteur" hidden="hidden" value="<?php echo $secteur->ID ; ?>">
                                <input class="update" type="submit" name="submitUpdate" value="Modifier">
                            </form>
                            <form action="../Controler/liste_secteurs.controler.php" method="post">
                                <input type="number" name="idSecteur" hidden="hidden" value="<?php echo $secteur->ID ; ?>">
                                <input class="delete" type="submit" name="submitDelete" value="Supprimer">
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
        </div>

    </body>

    <!-- Scripts Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>