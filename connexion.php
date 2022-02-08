<?php

    if (!isset($_SESSION['id'])) {
        
        header ('Location: index.php');

    } else {
        
        require ('php/class/class_user.php');
        session_start()

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
    <link rel="stylesheet" href="assets/css/connexion.css">
    <link rel="stylesheet" href="assets/css/footer.css">

    <title>Connexion</title> 
</head>

<body>

    <header>

        <?php include('php/include/header.inc.php'); ?>

    </header>


    <main>

    <?php

        if (isset($_POST['submit'])) {

            if (empty($_POST['login']) || empty($_POST['password'])) {

                echo "<p> Veuillez remplir tout les champs</p>";

            } else {

                $connect = new User();
                $connect->connect($_POST['login'], $_POST['password']);
            }
        }
    ?>

        <div class="form-connexion">

            <form action="#" id="form-connexion"  method="post">

                <label for="login">Login</label>
                <input type="text" name="login" required>

                <label for="password">Mot de Passe</label>
                <input type="password" name="password" requried>

                <input type="submit" value="Envoyer" name="submit">

            </form>

        </div>

    </main>


    <footer>

        <?php include('php/include/footer.inc.php'); ?>

    </footer>

</body>

</html>

<?php } ?>