<!DOCTYPE html>

    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&family=Indie+Flower&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="assets/css/header.css">
        <link rel="stylesheet" href="assets/css/<?= $css ?>.css">
        <link rel="stylesheet" href="assets/css/footer.css">

        <title><?= $title ?></title>

    </head>

    <body>

        <header>

            <?php

            require('php/include/autoloader.inc.php');

            if (isset($_SESSION['droits'])) { /*utilisateurs*/

                switch ($_SESSION['droits']) {

                    case '1':

                        echo '

                            <nav>

                                <label for="menu-mobile" class="menu-mobile">Menu</label>
                                <input type="checkbox" id="menu-mobile" role="button">
                                <ul>
                                    <li class="menu-home"><a href="index.php">Accueil</a></li>
                                    <li class="menu-log"><a href="deconnexion.php">Déconnexion</a></li>
                                    <li class="menu-cat"><a href="#">Catégories</a>
                                        <ul class="submenu">
                                            <li><a href="#">Histoire de la ville </a></li>
                                            <li><a href="#">Berceau du Cinéma</a></li>
                                            <li><a href="#">Le Chantier Naval</a></li>
                                            <li><a href="#">Le Parc National des Calanques</a></li>
                                        </ul>  
                                    </li>
                                    <li class="menu-edit"><a href="#">Profil</a>
                                        <ul class="submenu">
                                            <li><a href="profil.php">Modifier Mon Profil</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-contact"><a href="#">Contact</a></li>
                                    
                                </ul>
                            </nav>
                        ';
                        break;


                    case '42':

                        echo '

                            <nav>
                                <label for="menu-mobile" class="menu-mobile">Menu</label>
                                <input type="checkbox" id="menu-mobile" role="button">
                                <ul>
                                    <li class="menu-home"><a href="index.php">Accueil</a></li>
                                    <li class="menu-log"><a href="deconnexion.php">Déconnexion</a></li>
                                    <li class="menu-cat"><a href="categories.php">Catégories</a>
                                        <ul class="submenu">
                                            <li><a href="#">Histoire de la ville </a></li>
                                            <li><a href="#">Berceau du Cinéma</a></li>
                                            <li><a href="#">Le Chantier Naval</a></li>
                                            <li><a href="#">Le Parc National des Calanques</a></li>
                                        </ul>  
                                    </li>
                                    <li class="menu-edit"><a href="#">Edition</a>
                                        <ul class="submenu">
                                            <li><a href="profil.php">Modifier Mon Profil</a></li>
                                            <li><a href="./edition_articles.php">Edition d\'un article</a></li>
                                            <li><a href="#">Mes articles</a></li> 
                                        </ul>
                                    </li>
                                    <li class="menu-contact"><a href="contact.php">Contact</a></li>
                                </ul>
                            </nav>
                        ';
                        break;


                    case '1337':

                        echo '

                            <nav>
                                <label for="menu-mobile" class="menu-mobile">Menu</label>
                                <input type="checkbox" id="menu-mobile" role="button">
                                <ul>
                                    <li class="menu-home"><a href="index.php">Accueil</a></li>
                                    <li class="menu-log"><a href="deconnexion.php">Déconnexion</a></li>
                                    <li class="menu-cat"><a href="#">Catégories</a>
                                        <ul class="submenu">
                                            <li><a href="#">Histoire de la ville </a></li>
                                            <li><a href="#">Berceau du Cinéma</a></li>
                                            <li><a href="#">Le Chantier Naval</a></li>
                                            <li><a href="#">Le Parc National des Calanques</a></li>
                                        </ul>  
                                    </li>
                                    <li class="menu-edit"><a href="#">Profil</a>
                                        <ul class="submenu">
                                            <li><a href="profil.php">Modifier Mon Profil</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-edit"><a href="#">Edition</a>
                                        <ul class="submenu">
                                            <li><a href="#">Gestion des Articles</a></li> /*Ajout, modification, suppression d\'articles*/
                                            <li><a href="#">Gestion des Catégories</a></li> /*Ajout, modification, suppression de catégories*/ 
                                        </ul>
                                    </li>
                                    <li class="menu-admin"><a href="#">Admin</a>
                                        <ul class="submenu">
                                            <li><a href="admin.php">Gestion des utilisateurs</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-contact"><a href="contact.php">Contact</a></li>
                                </ul>
                            </nav>
                        ';
                        break;
                    
                }

            } else {

                echo '

                    <nav>
                        <label for="menu-mobile" class="menu-mobile">Menu</label>
                        <input type="checkbox" id="menu-mobile" role="button">
                        <ul>
                            <li class="menu-home"><a href="index.php">Accueil</a></li>
                            <li class="menu-log"><a href="connexion.php">Connexion</a></li>
                            <li class="menu-sign"><a href="inscription.php">Inscription</a></li>
                            <li class="menu-cat"><a href="categories.php">Catégories</a>
                                <ul class="submenu">
                                    <li><a href="#">Histoire de la ville </a></li>
                                    <li><a href="#">Berceau du Cinéma</a></li>
                                    <li><a href="#">Le Chantier Naval</a></li>
                                    <li><a href="#">Le Parc National des Calanques</a></li>
                                </ul>  
                            </li>
                            <li class="menu-contact"><a href="#">Contact</a></li>
                        </ul>
                    </nav>
                ';
                }

            ?>

            </header>