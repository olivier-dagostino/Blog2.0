<?php
session_start();
if (!isset($_SESSION['id'])) {

    header('Location: index.php');

} else {

    require('php/include/autoloader.inc.php');
    
?>
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
    <link rel="stylesheet" href="assets/css/delete.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    
    <title>Delete</title>
</head>

<body>

    <header>

        <?php include('php/include/header.inc.php') ?>

    </header>


    <main>
        <div class="sup">

            <h1>Suppression du Compte</h1>

            <p>
                Êtes vous sûr se Vouloir supprimer Votre compte ?
            </p>    

            <form method="POST" action="">

                <?php

                    

                    if ($_POST['delete']) {

                        $info = new User();
                        $res1 = $info->deleteUser($_SESSION['id']);
                        echo 'Votre Compte à bien été supprimé';
                        header('Refresh:3 ; url: index.php');
                    }

                ?>

                <input type="submit" name="delete" value="Supprimer mon Compte">
            </form>
        </div>
    </main>


    <footer>

        <?php include('php/include/footer.inc.php') ?>

    </footer>

</body>

</html>
<?php } ?>