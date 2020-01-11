<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="../View/index.php">Projet PHP</a>
        <!-- Links -->
        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link" href="../Controler/liste_secteurs.controler.php">Secteurs</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../Controler/liste_structures.controler.php">Structures</a>
            </li>

            <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Créer</a>

                <div class="dropdown-menu">
                    <a href="../Controler/create_secteurs.controler.php" class="dropdown-item">Créer un secteur</a>
                    <a href="../Controler/create_structure.conrtoler.php" class="dropdown-item">Créer une structure</a>
                </div>
            </li>
        </ul>
    </nav>