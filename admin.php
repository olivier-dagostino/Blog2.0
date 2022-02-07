<?php
session_start();

if ($_SESSION['droits'] != 1337) {

    header('Location: index.php');
} else {

    require('php/class/class_user.php');
    require('php/class/class_droits.php');

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&family=Indie+Flower&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="assets/css/header.css">
        <link rel="stylesheet" href="assets/css/admin.css">
        <link rel="stylesheet" href="assets/css/footer.css">
        <title>Admin</title>
    </head>

    <body>
        <header>

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

        </header>
        <main>

       

            <h1>Gestion des Utilisateurs</h1>

            <table>
                <thead>

                    <?php
                        
                        $info = new User();
                        $res1 = $info->getAllInfoForAllUsers();

                        echo '<tr>';
                        foreach ($res1 as $key => $value) {        

                            
                          

                        }
                        echo '</tr>';
                    ?>
                </thead>
                <tbody>
                    <tr>
                        <?php

                        foreach ($res1 as $key => $value) { // pour chaque valeur qui se trouve dans la $res1 (pour chaques étudiants) 
                            echo '<tr>'; //on echo une ligne

                            foreach ($value as $key1 => $value1) //Pour chaque info de l'étudiant on écho une case
                            {
                                echo "<td>$value1</td>";  // j'echo l'info
                            }
                            echo '</tr>';
                        }

                        ?>

                </tbody>
            </table>
        </main>
        <footer>

            <?php require 'php/include/footer.inc.php'; ?>

        </footer>
    </body>

    </html>
<?php } ?>