<?php 
    session_start();
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
    <link rel="stylesheet" href="assets/css/inscription.css">
    <link rel="stylesheet" href="assets/css/footer.css">

    <title>Inscription</title>
</head>

<body>

    <header>

        <?php include('php/include/header.inc.php'); ?>

    </header>

    <main>

        <?php 

            if (isset($_POST['submit'])) {

                if (empty($_POST['login']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['confirmer'])) {

                    echo "<p class='error1'>Veuillez remplir tout les champs!</p>";

                } elseif ($_POST['password'] != $_POST['confirmer']) {

                    echo "<p>Verifiez votre mot de passe</p> ";

                } else {

                    $register = new User();
                    $register->register($_POST['login'], $_POST['password'], $_POST['email']);
                    header('Refresh:3, url=connexion.php');

                }
            }
        ?>

        <div class="first-I">

            <div class="form-inscription">

                <h2>Formulaire d'Inscription</h2>

                <form id="form-inscription" action="#" method="post">

                    <div class="form-inscription-1">

                        <label for="login">Login</label>
                        <input type="text" name="login"  required>

                        <label for="email">Email</label>
                        <input type="email" name="email" required>

                    </div>

                    <div class="form-inscription-3">

                        <label for="password">Mot de Passe</label>
                        <input type="password" name="password" required><br>

                        <label for="confirmer">Mot de Passe</label>
                        <input type="password" name="confirmer"required>
                        
                    </div>

                    <div class="form-inscription-4">

                        <input type="submit" name="submit" class="submit">

                    </div>
                
                </form>

            </div>

        </div>

    </main>

    <footer>

        <?php require 'php/include/footer.inc.php'; ?>

    </footer>
    
</body>

</html>