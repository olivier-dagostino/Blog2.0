<?php
    require('php/class/class_article.php');
    require('php/class/class_categorie.php');
    require('php/class/class_commentaire.php');
    require('php/class/class_user.php')
    
?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&family=Indie+Flower&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/article.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <title>Article</title>
</head>

<body>
    <header>
        <?php
            require "php/include/header.inc.php";
        ?>
    </header>
    <main>
        <?php
            $art = new Article();
            $text = $art->getarticlebyid($_GET['id']);
            $date2 = strtotime($text['date']);

            $article = explode('/', $text['article']);
            $comm = new Commentaire();
            $com = $comm->getComAndUserById($_GET['id']);
            $id = $_GET['id'];

            if (isset($_POST['submit'])) {

                if (empty($_POST['titre']) || empty($_POST['corp'])) {

                    echo "<p>Veuillez remplir tout les champs</p>";
                } else {

                    $corp = $_POST['titre'] . '/' . $_POST['corp'];
                    $comm->insertcom($corp, $_GET['id'], $_SESSION['id']);
                    echo "<p>Votre commentaire est bien enregistré</p>";
                    header("Refresh:2, URL=article.php?id=$id");
                }
            }
        ?>
        <div class="container">

            <div class="card">

                <div class="cardarticle">

                    <div class="corp">

                        <h1 class="titre"><?php echo $article[0]; ?></h1>
                        <p class="article"><?php echo $article[1]; ?></p>

                    </div>

                    <div class="infos">

                        <p>Ecrit par <?php echo $text['login']; ?></p>

                        <img src="#" alt="">

                        <p>Le <?php echo date('d/m/Y', $date2); ?> </p>

                        <?php
                            if (isset($_SESSION['id'])) {

                                echo "<a href='#1' class='com'>Laissez un commentaire</a>";
                            }
                        ?>

                    </div>
                </div>

                <div class="cardcom">

                    <?php
                        for ($i = 0; isset($com[$i]); $i++) {

                            $commentaire = explode('/', $com[$i]['commentaire']);
                            echo "<div class='box4'>";
                            echo "<div class='infos2'>";
                            echo "<p>Titre: $commentaire[0]</p>";
                            if ($com[$i]['active'] == 0) {

                                echo '<p>Ecrit par ' . $com[$i]['login'] . '</p>';
                                $date = strtotime($com[$i]['date']);
                                echo '<p> le ' . date('d/m/Y', $date) . '</p>';

                            } else {

                                $date = strtotime($com[$i]['date']);
                                echo '<p>Ecrit par Utilisateur</p>';
                                echo '<p> le ' . date('d/m/Y', $date) . '</p>';
                            }

                            echo "</div>";
                            echo "<p class='commentaire'>$commentaire[1]</p>";
                            echo "</div>";
                        }

                    ?>

                </div>
            </div>
        </div>
        
        <?php
            if (isset($_SESSION['id'])) :
        ?>
            <form action="#" method="post" class="insertcom">

                <div class="box3" id="1">
                    <p class="leavecom">Laissez un commentaire</p>
                    <label for="titre">Titre du commentaire</label>
                    <input type="text" name="titre" placeholder="votre titre">
                    <label for="corp">Votre commentaire</label>
                    <textarea id="corp" name="corp" placeholder="Votre article" rows="15" cols="33"></textarea>
                    <input type="submit" name="submit" value="Envoyer">
                </div>
                <img src="#" alt="logo" class="newlogo">
            </form>
        <?php
            endif;
        ?>
    </main>
    <footer>
        <?php
            require('php/include/footer.inc.php');
        ?>
    </footer>
</body>

</html>